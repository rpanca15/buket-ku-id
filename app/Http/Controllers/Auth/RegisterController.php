<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

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
            'password' => 'required|string|min:8|confirmed',
            'no_telepon' => 'required|string|max:15|unique:users', // Menambahkan validasi untuk nomor telepon
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon, // Menyimpan nomor telepon
            'role' => 'user',
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        Cache::put('success', 'Registrasi berhasil! Selamat datang!', now()->addSeconds(5));
        return redirect('/');
    }
}