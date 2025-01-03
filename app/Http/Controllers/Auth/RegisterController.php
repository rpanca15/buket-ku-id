<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;

class RegisterController extends Controller
{
    /**
     * Menampilkan form register.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Generate random numeric verification code
     */
    private function generateNumericCode($length = 6)
    {
        return str_pad(random_int(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
    }

    /**
     * Melakukan proses registrasi pengguna baru.
     */
    public function register(Request $request)
    {
        // Validasi input registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8) // Minimal 8 karakter
                    ->letters() // Harus mengandung huruf
                    ->mixedCase() // Harus ada kombinasi huruf besar dan kecil
                    ->numbers() // Harus mengandung angka
                    ->symbols() // Harus mengandung simbol
            ],
            'no_telepon' => 'required|string|max:15|unique:users',
            'g-recaptcha-response' => new Captcha(),
        ]);


        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon, // Menyimpan nomor telepon
            'role' => 'user',
            'verification_code' => $this->generateNumericCode(),
            'verification_code_expires_at' => now()->addHours(1),
        ]);

        // Send verification email
        Mail::to($user->email)->send(new VerificationCodeMail($user, $user->verification_code));

        return redirect()->route('verification.notice', ['email' => $user->email])
            ->with('success', 'Registrasi berhasil! Silakan periksa email Anda untuk kode verifikasi.');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required|string'
        ]);

        $user = User::where('email', $request->email)
            ->where('verification_code', $request->verification_code)
            ->where('verification_code_expires_at', '>', now())
            ->first();

        if (!$user) {
            return back()->with('error', 'Kode verifikasi tidak valid atau sudah kadaluarsa.');
        }

        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->verification_code_expires_at = null;
        $user->save();

        Cache::put('success', 'Email berhasil diverifikasi!', now()->addSeconds(5));
        return redirect('/');
    }

    public function resendVerificationCode(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->hasVerifiedEmail()) {
            return back()->with('error', 'Tidak dapat mengirim kode verifikasi.');
        }

        $user->verification_code = $this->generateNumericCode();
        $user->verification_code_expires_at = now()->addHours(1);
        $user->save();

        Mail::to($user->email)->send(new VerificationCodeMail($user, $user->verification_code));

        Cache::put('success', 'Kode verifikasi baru telah dikirim ke email Anda.', now()->addSeconds(5));
        return back();
    }

    public function resendVerificationLink(Request $request)
    {
        // Validasi user_id
        $request->validate([
            'user_id' => 'required|exists:users,id', // Pastikan user_id ada di database
        ]);

        // Ambil user berdasarkan id
        $user = User::find($request->user_id);

        if ($user && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
            
            Cache::put('success', 'Link verifikasi telah dikirim ulang ke email Anda', now()->addSeconds(5));
            return redirect('/');
        }
        
        // Jika sudah terverifikasi, tampilkan pesan
        Cache::put('info', 'Email sudah terverifikasi atau tidak ditemukan.', now()->addSeconds(5));
        return redirect('/');
    }
}
