<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header class="bg-x-purple text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <img src="{{ asset('assets/images/logotrans.png') }}" alt="Logo" class="w-32 h-auto">
            </div>
            <nav class="flex space-x-6">
                {{-- <a href="{{ route('home') }}" class="text-white hover:text-gray-200">Home</a>
                <a href="{{ route('about') }}" class="text-white hover:text-gray-200">About</a>
                <a href="{{ route('contact') }}" class="text-white hover:text-gray-200">Contact</a>
                <!-- Tambahkan link lainnya sesuai kebutuhan --> --}}
                <div class="flex items-center justify-center gap-2">
                    @guest
                        <a href="{{ route('login') }}"
                            class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-600 transition">Masuk
                            <i class="fas fa-sign-in-alt ms-1"></i></a>
                        <a href="{{ route('register') }}"
                            class="bg-green-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-green-600 transition">Daftar
                            <i class="fas fa-user-plus ms-1"></i></a>
                    @endguest

                    @auth
                        <span class="text-white font-semibold">{{ Auth::user()->name }}</span>
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('admin') }}" title="Dashboard"
                                class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                                <i class="fas fa-dashboard"></i></a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" title="Logout"
                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                <i class="fas fa-sign-out-alt"></i></button>
                        </form>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if (Cache::has('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ Cache::get('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (Cache::has('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ Cache::get('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>

</html>
