@extends('layouts.admin')

@section('title', 'Backup & Restore')

@push('styles')
<style>
    .backup-card {
        transition: all 0.3s ease;
    }

    .backup-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
</style>
@endpush

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Backup Management</h2>
        <div class="flex space-x-3">
            <form action="{{ route('backup.database') }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-database mr-2"></i> Backup Database
                </button>
            </form>
            <!-- <form action="{{ route('backup.project') }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-file-archive mr-2"></i> Backup Project
                </button>
            </form> -->
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded" role="alert">
        <p class="font-bold">Success</p>
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded" role="alert">
        <p class="font-bold">Error</p>
        <p>{{ session('error') }}</p>
    </div>
    @endif

    <!-- Add this section for SQL file upload -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h3 class="text-xl font-semibold mb-4">Upload SQL File</h3>
        <form action="{{ route('backup.upload-restore') }}" method="POST" enctype="multipart/form-data" class="flex items-start space-x-4">
            @csrf
            <div class="flex-1">
                <input type="file" name="sql_file" accept=".sql" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Max file size: 10MB</p>
            </div>
            <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-3 rounded-lg flex items-center">
                <i class="fas fa-upload mr-2"></i> Upload & Restore
            </button>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-semibold mb-4">Backup History</h3>
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @forelse($databaseBackups as $backup)
            <div class="backup-card bg-white border rounded-lg p-4 relative">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h4 class="font-semibold text-lg">{{ $backup->name }}</h4>
                        <p class="text-gray-600 text-sm">Size: {{ \App\Http\Controllers\Admin\BackupController::formatSize($backup->size) }}</p>
                    </div>
                    <span class="px-2 py-1 rounded-full text-xs 
                            @if($backup->status === 'completed') bg-green-100 text-green-800
                            @elseif($backup->status === 'failed') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                        {{ ucfirst($backup->status) }}
                    </span>
                </div>

                <div class="text-gray-600 text-sm mb-4">
                    <p>Created: {{ $backup->created_at->format('M d, Y H:i:s') }}</p>
                    @if($backup->restore_status)
                    <p class="mt-1">
                        Restore Status:
                        <span class="@if($backup->restore_status === 'restored') text-green-600
                                           @elseif($backup->restore_status === 'restore_failed') text-red-600
                                           @else text-yellow-600 @endif">
                            {{ ucfirst($backup->restore_status) }}
                        </span>
                    </p>
                    @endif
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('backup.download', $backup) }}"
                        class="bg-blue-100 text-center text-blue-600 px-3 py-1 rounded-md text-sm hover:bg-blue-200 transition-colors">
                        <i class="fas fa-download mr-1"></i> Download
                    </a>

                    <form action="{{ route('backup.restore', $backup) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            @if($backup->isRestoring()) disabled @endif
                            class="bg-green-100 text-green-600 px-3 py-1 rounded-md text-sm hover:bg-green-200 transition-colors @if($backup->isRestoring()) opacity-50 cursor-not-allowed @endif">
                            <i class="fas fa-undo mr-1"></i> Restore
                        </button>
                    </form>

                    <form action="{{ route('backup.delete', $backup) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this backup?')"
                            class="bg-red-100 text-red-600 px-3 py-1 rounded-md text-sm hover:bg-red-200 transition-colors">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-8 text-gray-500">
                <i class="fas fa-database text-4xl mb-3"></i>
                <p>No backups found. Create your first backup using the buttons above.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Fungsi untuk mengecek status restore
    function checkRestoreStatus() {
        fetch('{{ route("backup.check-restore") }}')
            .then(response => response.json())
            .then(data => {
                if (data.isRestoring) {
                    setTimeout(checkRestoreStatus, 5000); // Check again in 5 seconds
                } else {
                    window.location.reload(); // Reload when restore is complete
                }
            });
    }

    // Start checking if there's any backup being restored
    document.addEventListener('DOMContentLoaded', function() {
        @if($databaseBackups->contains('restore_status', $RESTORE_STATUS_PENDING))
            checkRestoreStatus();
        @endif
    });
</script>
@endpush
@endsection