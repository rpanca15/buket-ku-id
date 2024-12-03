<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        ]);


        // Membuat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon, // Menyimpan nomor telepon
            'role' => 'user',
        ]);

        Cache::put('success', 'Registrasi berhasil!', now()->addSeconds(5));
        return redirect('/');
    }
}
