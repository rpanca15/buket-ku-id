<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /**
     * Tampilkan form "Forgot Password".
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function showResetPasswordForm($email, $token)
    {
        $resetData = DB::table('password_reset_tokens')->where('email', $email)->first();

        if (!$resetData || !Hash::check($token, $resetData->token)) {
            Cache::put('error', 'Token tidak valid atau sudah kadaluarsa!', now()->addSeconds(5));
            return redirect()->route('forgot.password.form'); 
        }

        return view('auth.reset-password', compact('email', 'token'));
    }

    /**
     * Kirim token reset password ke email pengguna.
     */
    public function sendResetToken(Request $request)
    {
        // Log::info('Received password reset request', [
        //     'request_data' => $request->all()
        // ]);

        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
            ]);

            if ($validator->fails()) {
                // Log::warning('Validation failed', [
                //     'errors' => $validator->errors()->toArray()
                // ]);
                return response()->json([
                    'message' => 'Email tidak valid atau tidak ditemukan.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $email = $request->input('email');
            // Log::info('Processing reset for email', ['email' => $email]);

            $existingToken = DB::table('password_reset_tokens')
                ->where('email', $email)
                ->first();

            if ($existingToken && Carbon::parse($existingToken->created_at)->addSeconds(30)->isFuture()) {
                // Log::info('Existing token still valid', ['email' => $email]);
                return response()->json([
                    'message' => 'Token telah dikirim, harap tunggu 30 detik sebelum mengirim ulang.',
                ], 429);
            }

            $token = bin2hex(random_bytes(16));

            DB::beginTransaction();
            try {
                DB::table('password_reset_tokens')->updateOrInsert(
                    ['email' => $email],
                    [
                        'token' => Hash::make($token),
                        'created_at' => Carbon::now(),
                    ]
                );

                Mail::to($email)->send(new ResetPasswordMail($email, $token));

                DB::commit();
                // Log::info('Reset password email sent successfully', ['email' => $email]);

                return response()->json([
                    'message' => 'Token reset password berhasil dikirim ke email Anda.',
                    'status' => 'success'
                ], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                // Log::error('Error in reset password process', [
                //     'email' => $email,
                //     'error' => $e->getMessage(),
                //     'trace' => $e->getTraceAsString()
                // ]);

                return response()->json([
                    'message' => 'Gagal mengirim email reset password. ' . $e->getMessage(),
                    'status' => 'error'
                ], 500);
            }
        } catch (\Exception $e) {
            // Log::error('Unexpected error in reset password', [
            //     'error' => $e->getMessage(),
            //     'trace' => $e->getTraceAsString()
            // ]);

            return response()->json([
                'message' => 'Terjadi kesalahan dalam proses reset password. ' . $e->getMessage(),
                'status' => 'error'
            ], 500);
        }
    }

    /**
     * Reset password pengguna.
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $resetData = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (!$resetData || !Hash::check($request->token, $resetData->token)) {
            Cache::put('error', 'Token tidak valid, atau sudah kadaluarsa!', now()->addSeconds(5));
            return redirect()->back();
        }

        try {
            DB::table('users')->where('email', $request->email)->update([
                'password' => Hash::make($request->password),
            ]);

            DB::table('password_reset_tokens')->where('email', $request->email)->delete();

            Cache::put('success', 'Password berhasil diperbarui! Silakan login!', now()->addSeconds(5));
            return redirect()->route('login');
        } catch (\Exception $e) {
            // Log::error("Error resetting password", ['email' => $request->email, 'error' => $e->getMessage()]);
            Cache::put('error', 'Terjadi kesalahan saat mereset password!', now()->addSeconds(5));
            return redirect()->back();
        }
    }
}
