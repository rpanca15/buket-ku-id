@extends('layouts.app')

@section('title')
    Profile {{ $user->name }} | Buket_ku.id
@endsection

@section('content')
    <section class="profile-user bg-white rounded-xl pt-10 flex items-center justify-center min-h-screen">

        <main class="flex flex-col max-w-3xl w-full gap-8">
            <!-- Profile Header -->
            <section
                class="profile-header flex flex-col items-center text-center py-8 px-6 bg-violet-900 text-white rounded-lg shadow-sm">
                <h1 class="text-lg font-semibold">My Profile</h1>
                <p class="mt-4 text-2xl font-bold">Welcome, {{ $user->name }}</p>
            </section>

            <!-- Profile Details -->
            <section class="profile-details bg-white shadow-sm rounded-lg p-6 border border-gray-200">
                <!-- Form Readonly -->
                <form id="view-profile-form" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <div class="mt-2 bg-gray-100 px-4 py-2 rounded-lg">
                            <input type="text" value="{{ $user->name }}"
                                class="w-full bg-transparent text-gray-800 text-sm focus:outline-none" readonly />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-2 bg-gray-100 px-4 py-2 rounded-lg">
                            <input type="email" value="{{ $user->email }}"
                                class="w-full bg-transparent text-gray-800 text-sm focus:outline-none" readonly />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">No Telepon</label>
                        <div class="mt-2 bg-gray-100 px-4 py-2 rounded-lg">
                            <input type="tel" value="{{ $user->no_telepon }}"
                                class="w-full bg-transparent text-gray-800 text-sm focus:outline-none" readonly />
                        </div>
                    </div>
                </form>

                <!-- Form Edit Profil -->
                <form id="edit-profile-form" class="space-y-6 {{ session('form') === 'edit-profile' ? '' : 'hidden' }}"
                    method="POST" action="{{ route('profile.update', $user->id) }}">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full bg-gray-100 px-4 py-3 mt-2 rounded-lg text-gray-800 text-sm focus:outline-none" />
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full bg-gray-100 px-4 py-3 mt-2 rounded-lg text-gray-800 text-sm focus:outline-none" />
                        @error('email')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">No Telepon</label>
                        <input type="tel" name="no_telepon" value="{{ old('no_telepon', $user->no_telepon) }}"
                            class="w-full bg-gray-100 px-4 py-3 mt-2 rounded-lg text-gray-800 text-sm focus:outline-none" />
                        @error('no_telepon')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex gap-4 justify-end">
                        <button type="button"
                            class="cancel-btn px-6 py-2 bg-red-700 text-white text-sm font-semibold rounded-full hover:bg-red-500 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2 bg-violet-900 text-white text-sm font-semibold rounded-full hover:bg-violet-700 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

                <!-- Form Edit Password -->
                <form id="edit-password-form" class="space-y-6 {{ session('form') === 'edit-password' ? '' : 'hidden' }}"
                    method="POST" action="{{ route('profile.update-password', $user->id) }}">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password Lama</label>
                        <input type="password" name="current_password" value="{{ old('current_password') }}"
                            class="w-full bg-gray-100 px-4 py-3 mt-2 rounded-lg text-gray-800 text-sm focus:outline-none" />
                        @error('current_password')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="new_password" value="{{ old('new_password') }}"
                            class="w-full bg-gray-100 px-4 py-3 mt-2 rounded-lg text-gray-800 text-sm focus:outline-none" />
                        @error('new_password')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <input type="password" name="new_password_confirmation"
                            class="w-full bg-gray-100 px-4 py-3 mt-2 rounded-lg text-gray-800 text-sm focus:outline-none" />
                    </div>

                    <div class="flex gap-4 justify-end">
                        <button type="button"
                            class="cancel-btn px-6 py-2 bg-red-700 text-white text-sm font-semibold rounded-full hover:bg-red-500 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2 bg-violet-900 text-white text-sm font-semibold rounded-full hover:bg-violet-700 transition">
                            Simpan Password
                        </button>
                    </div>
                </form>
            </section>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3">
                <button id="edit-profile-btn"
                    class="px-6 py-2 bg-gray-700 text-white text-sm font-semibold rounded-full hover:bg-gray-600 transition">
                    Edit Profil
                </button>
                <button id="edit-password-btn"
                    class="px-6 py-2 bg-gray-700 text-white text-sm font-semibold rounded-full hover:bg-gray-600 transition">
                    Edit Password
                </button>
                <a href="{{ route('home') }}"
                    class="px-6 py-2 bg-violet-900 text-white text-sm font-semibold rounded-full hover:bg-violet-700 transition">
                    Back
                </a>
            </div>
        </main>
    </section>
@endsection

@section('scripts')
    <script>
        const viewProfileForm = document.getElementById('view-profile-form');
        const editProfileForm = document.getElementById('edit-profile-form');
        const editPasswordForm = document.getElementById('edit-password-form');
        const editProfileBtn = document.getElementById('edit-profile-btn');
        const editPasswordBtn = document.getElementById('edit-password-btn');
        const batalBtns = document.querySelectorAll('.cancel-btn');

        editProfileBtn.addEventListener('click', () => {
            viewProfileForm.classList.add('hidden');
            editPasswordForm.classList.add('hidden');
            editProfileForm.classList.remove('hidden');
        });

        editPasswordBtn.addEventListener('click', () => {
            viewProfileForm.classList.add('hidden');
            editProfileForm.classList.add('hidden');
            editPasswordForm.classList.remove('hidden');
        });

        batalBtns.forEach(batalBtn => {
            batalBtn.addEventListener('click', () => {
                viewProfileForm.classList.remove('hidden');
                editProfileForm.classList.add('hidden');    
                editPasswordForm.classList.add('hidden');
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const activeForm = @json(session('form', 'view-profile'));

            if (activeForm === 'edit-profile') {
                viewProfileForm.classList.add('hidden');
                editProfileForm.classList.remove('hidden');
                editPasswordForm.classList.add('hidden');
            } else if (activeForm === 'edit-password') {
                viewProfileForm.classList.add('hidden');
                editProfileForm.classList.add('hidden');
                editPasswordForm.classList.remove('hidden');
            }
        });
    </script>
@endsection
