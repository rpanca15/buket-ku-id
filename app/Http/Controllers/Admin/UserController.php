<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar pengguna.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with(['orders.status'])->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Menampilkan form untuk membuat pengguna baru.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Menyimpan pengguna baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin',  // Menambahkan role untuk admin atau user
            'no_telepon' => 'required|string|max:15|unique:users',  // Validasi nomor telepon
        ]);

        // Membuat pengguna baru dengan email terverifikasi
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Meng-hash password
            'role' => $request->role,
            'no_telepon' => $request->no_telepon,
            'verification_code' => null,  // Pastikan kode verifikasi kosong
            'verification_code_expires_at' => null // Pastikan waktu kadaluarsa kosong
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan dan email terverifikasi.');
    }

    /**
     * Menampilkan form untuk mengedit informasi pengguna.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Memperbarui informasi pengguna.
     */
    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed', // Password opsional jika tidak diubah
            'role' => 'required|in:user,admin',
            'no_telepon' => 'required|string|max:15|unique:users,no_telepon,' . $user->id, // Validasi nomor telepon
        ]);

        // Update pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // Update password jika diubah
        }
        $user->role = $request->role;
        $user->no_telepon = $request->no_telepon; // Update nomor telepon
        $user->save();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Menghapus pengguna.
     */
    public function destroy(User $user)
    {
        // Jangan izinkan penghapusan pengguna admin (bisa disesuaikan)
        if ($user->role == 'admin') {
            return redirect()->route('users.index')->with('error', 'Tidak dapat menghapus pengguna admin.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
