<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Melakukan proses login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Cek apakah user ditemukan dan password sesuai
        if ($user && Hash::check($credentials['password'], $user->password)) {

            // Cek apakah email sudah diverifikasi
            if (!$user->hasVerifiedEmail()) {
                Cache::put('error', 'Email belum diverifikasi!', now()->addSeconds(5));
                return back();
            }

            // Login user secara manual
            Auth::login($user);

            // Regenerate session
            $request->session()->regenerate();
            Cache::put('success', 'Login berhasil! Selamat datang!', now()->addSeconds(5));

            return redirect()->intended('/');
        }

        // Jika gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }
}
