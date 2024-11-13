<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan untuk mengubah ini sesuai dengan nama view Anda
    }

    // Menangani permintaan login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial pengguna
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Jika berhasil, arahkan ke halaman yang diinginkan
            return redirect()->intended('/home'); // Ganti '/home' dengan rute yang sesuai
        }

        // Jika gagal, lemparkan exception
        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Menangani logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); // Arahkan kembali ke halaman utama atau halaman login
    }
}