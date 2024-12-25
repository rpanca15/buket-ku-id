<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use Carbon\Carbon;
use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\FacadesDB;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    public function index()
    {
        $databaseBackups = Backup::where('type', Backup::TYPE_DATABASE)->latest()->get();
        return view('admin.backup.index', [
            'databaseBackups' => $databaseBackups,
            'RESTORE_STATUS_PENDING' => Backup::RESTORE_STATUS_PENDING
        ]);
    }

    public function backupDatabase()
    {
        try {
            $filename = 'backup-' . Carbon::now()->format('Y-m-d-H-i-s') . '.sql';
            $path = 'backup/database/' . $filename;
            $fullPath = storage_path('app/' . $path);

            // Create backup record
            $backup = Backup::create([
                'name' => $filename,
                'type' => Backup::TYPE_DATABASE,
                'file_path' => $path,
                'size' => 0,
                'status' => Backup::STATUS_PENDING
            ]);
            // Simple mysqldump command without password for root
            $command = sprintf(
                'mysqldump -u%s %s > "%s"',
                env('DB_USERNAME'),
                env('DB_DATABASE'),
                $fullPath
            );

            system($command, $returnCode);

            if ($returnCode === 0 && file_exists($fullPath)) {
                $size = filesize($fullPath);
                $backup->update([
                    'size' => $size,
                    'status' => Backup::STATUS_COMPLETED
                ]);
                return back()->with('success', 'Backup completed successfully.');
            } else {
                $backup->update(['status' => Backup::STATUS_FAILED]);
                return back()->with('error', 'Backup failed to create file.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Database backup failed: ' . $e->getMessage());
        }
    }

    public function checkRestoreStatus()
    {
        $isRestoring = Backup::where('restore_status', Backup::RESTORE_STATUS_PENDING)
            ->whereNotNull('size')
            ->where('size', '!=', '0 B')
            ->exists();
        return response()->json(['isRestoring' => $isRestoring]);
    }

    public function restoreDatabase(Backup $backup)
    {
        try {
            if ($backup->isRestoring()) {
                return back()->with('error', 'Restore already in progress');
            }

            $filePath = storage_path('app/' . $backup->file_path);
            if (!file_exists($filePath)) {
                return back()->with('error', 'Backup file not found');
            }

            // Save original values
            $originalSize = $backup->size;
            $originalStatus = $backup->status;

            // Use DB query to update only restore_status
            DB::table('backups')
                ->where('id', $backup->id)
                ->update([
                    'restore_status' => Backup::RESTORE_STATUS_PENDING,
                    // Force these values to prevent any changes
                    'size' => $originalSize,
                    'status' => $originalStatus
                ]);

            $command = sprintf(
                'mysql -u%s %s < "%s"',
                env('DB_USERNAME'),
                env('DB_DATABASE'),
                $filePath
            );

            system($command, $returnCode);

            // Update only restore_status while preserving original values
            DB::table('backups')
                ->where('id', $backup->id)
                ->update([
                    'restore_status' => $returnCode === 0 ?
                        Backup::RESTORE_STATUS_COMPLETED :
                        Backup::RESTORE_STATUS_FAILED,
                    // Force these values again
                    'size' => $originalSize,
                    'status' => $originalStatus
                ]);

            return back()->with(
                $returnCode === 0 ? 'success' : 'error',
                $returnCode === 0 ? 'Database restored successfully.' : 'Database restore failed.'
            );
        } catch (\Exception $e) {
            // Restore original values on error
            DB::table('backups')
                ->where('id', $backup->id)
                ->update([
                    'restore_status' => Backup::RESTORE_STATUS_FAILED,
                    'size' => $originalSize,
                    'status' => $originalStatus
                ]);
            return back()->with('error', 'Database restore failed: ' . $e->getMessage());
        }
    }

    public function uploadAndRestore(Request $request)
    {
        try {
            $request->validate([
                'sql_file' => [
                    'required',
                    'file',
                    'max:10240', // 10MB max
                    function ($attribute, $value, $fail) {
                        if (strtolower($value->getClientOriginalExtension()) !== 'sql') {
                            $fail('The file must be a SQL file.');
                        }
                    }
                ]
            ]);

            $file = $request->file('sql_file');
            $filename = 'temp-restore-' . Carbon::now()->format('Y-m-d-H-i-s') . '.sql';
            $path = 'backup/database/' . $filename;

            // Store file
            Storage::putFileAs('backup/database', $file, $filename);
            $filePath = storage_path('app/' . $path);
            // $fullPath = ;

            // Create backup record
            $backup = Backup::create([
                'name' => $filename,
                'type' => Backup::TYPE_DATABASE,
                'file_path' => $path,
                'size' => filesize($filePath),
                'status' => Backup::STATUS_PENDING,
                'restore_status' => Backup::RESTORE_STATUS_PENDING
            ]);

            // Execute restore command
            $command = sprintf(
                'mysql -u%s %s < "%s"',
                env('DB_USERNAME'),
                env('DB_DATABASE'),
                $filePath
            );

            system($command, $returnCode);

            if ($returnCode === 0) {
                $backup->update([
                    'status' => Backup::STATUS_COMPLETED,
                    'restore_status' => Backup::RESTORE_STATUS_COMPLETED
                ]);
                Storage::delete($path);
                return back()->with('success', 'Database restored successfully from uploaded file.');
            } else {
                // $errorMessage = implode("\n", $returnCode);
                // \Log::error('Upload restore failed: ' . $errorMessage);

                $backup->update([
                    'status' => Backup::STATUS_FAILED,
                    'restore_status' => Backup::RESTORE_STATUS_FAILED
                ]);
                Storage::delete($path);
                return back()->with('error', 'Database restore failed from uploaded file.');
            }
        } catch (\Exception $e) {
            // \Log::error('Upload restore exception: ' . $e->getMessage());
            if (isset($backup)) {
                $backup->update([
                    'status' => Backup::STATUS_FAILED,
                    'restore_status' => Backup::RESTORE_STATUS_FAILED
                ]);
                Storage::delete($path ?? '');
            }
            return back()->with('error', 'Failed to restore database: ' . $e->getMessage());
        }
    }

    public function downloadBackup(Backup $backup)
    {
        return response()->download(storage_path('app/' . $backup->file_path));
    }

    public function deleteBackup(Backup $backup)
    {
        try {
            Storage::delete($backup->file_path);
            $backup->delete();
            return back()->with('success', 'Backup deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete backup');
        }
    }

    public function backupProject()
    {
        try {
            $filename = 'project-backup-' . Carbon::now()->format('Y-m-d-H-i-s') . '.zip';
            $zip = new ZipArchive();
            $zip->open(storage_path('app/backup/project/' . $filename), ZipArchive::CREATE | ZipArchive::OVERWRITE);

            $projectDirs = ['app', 'config', 'database', 'public', 'resources', 'routes'];

            foreach ($projectDirs as $dir) {
                $this->addToZip($zip, base_path($dir), $dir);
            }

            // Add important files in root directory
            $rootFiles = ['.env.example', 'composer.json', 'package.json'];
            foreach ($rootFiles as $file) {
                if (file_exists(base_path($file))) {
                    $zip->addFile(base_path($file), $file);
                }
            }

            $zip->close();

            return response()->download(
                storage_path('app/backup/project/' . $filename)
            )->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return back()->with('error', 'Project backup failed: ' . $e->getMessage());
        }
    }

    private function addToZip($zip, $path, $relativePath)
    {
        if (is_dir($path)) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($path),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen(base_path()) + 1);

                    // Skip unwanted files
                    if (
                        strpos($relativePath, 'vendor/') === false &&
                        strpos($relativePath, 'node_modules/') === false
                    ) {
                        $zip->addFile($filePath, $relativePath);
                    }
                }
            }
        }
    }

    public static function formatSize($size)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }
}
