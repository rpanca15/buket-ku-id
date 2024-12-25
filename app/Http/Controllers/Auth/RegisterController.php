<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\Captcha;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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
        ]);

        // Trigger event Registered untuk mengirim email verifikasi
        // event(new Registered($user));

        // Kirim notifikasi verifikasi email
        $user->sendEmailVerificationNotification();

        Cache::put('success', 'Registrasi berhasil! Silakan periksa email untuk verifikasi.', now()->addSeconds(5));
        return redirect('/');
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
