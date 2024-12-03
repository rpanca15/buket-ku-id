@extends('layouts.admin')

@section('title')
    Edit User | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="min-w-full relative">
            <a href="javascript:history.back()" title="Kembali ke Daftar Pengguna"
                class="text-black-700 group rounded-lg absolute top-2">
                <i class="fas fa-arrow-left text-xl group-hover:opacity-60"></i>
            </a>
            <h1 class="text-3xl font-bold mb-6 text-center">Edit Pengguna</h1>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama User</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror"
                        placeholder="Nama Lengkap" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror"
                        placeholder="Email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="no_telepon" class="block text-sm font-medium text-gray-700">No. Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon"
                        class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('no_telepon') border-red-500 @enderror"
                        placeholder="Nomor Telepon" value="{{ old('no_telepon', $user->no_telepon) }}" required>
                    @error('no_telepon')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" id="role"
                        class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('role') border-red-500 @enderror"
                        required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('role')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru (Opsional)</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror"
                        placeholder="Kosongkan jika tidak ingin mengubah password">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password
                        Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Konfirmasi password baru">
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-x-purple text-white px-6 py-2 rounded-full hover:bg-purple-500 transition ease-in-out duration-300">
                        <i class="fas fa-save mr-3"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
