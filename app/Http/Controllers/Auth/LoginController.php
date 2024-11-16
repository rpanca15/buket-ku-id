<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

        // Proses login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Cache::put('success', 'Login berhasil! Selamat datang!', now()->addSeconds(5));
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }
}
