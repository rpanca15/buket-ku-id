<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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
            'password' => 'required',
        ]);

        // Proses login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

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
            'password' => 'required|string|min:8|confirmed',
            'no_telepon' => 'required|string|max:15|unique:users', // Menambahkan validasi untuk nomor telepon
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon, // Menyimpan nomor telepon
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        return redirect('/')->with('success', 'Registrasi berhasil! Selamat datang!');
    }

    /**
     * Melakukan logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
