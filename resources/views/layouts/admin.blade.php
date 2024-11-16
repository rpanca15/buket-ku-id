<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Menyembunyikan modal dengan animasi */
        @keyframes closeModalAnimation {
            0% {
                transform: translateZ(0);
                opacity: 1;
            }

            100% {
                transform: translateZ(-1000px);
                opacity: 0;
            }
        }

        .modal {
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .modal-close {
            animation: closeModalAnimation 0.3s forwards;
        }
    </style>
</head>

<body class="bg-gray-100">
    @if (Cache::has('success'))
        <!-- Modal untuk pesan sukses -->
        <div id="success-modal" class="absolute top-10 left-0 right-0 z-50 flex justify-center items-center">
            <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg modal">
                <h3 class="text-lg font-semibold text-green-600">Success</h3>
                <p class="text-gray-700 mt-2">{{ Cache::get('success') }}</p>
                {{-- <div class="mt-4 flex justify-end">
                    <button onclick="closeModal('success-modal')"
                        class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600">
                        Close
                    </button>
                </div> --}}
            </div>
        </div>

        <script>
            setTimeout(function() {
                closeModal('success-modal');
            }, 1500);

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);

                modal.querySelector('.modal').classList.add('modal-close');

                setTimeout(() => {
                    modal.style.display = 'none';
                    modal.querySelector('.modal').classList.remove('modal-close');
                }, 300);
            }
        </script>
    @elseif (Cache::has('error'))
        <!-- Modal untuk pesan error -->
        <div id="error-modal" class="absolute top-10 left-0 right-0 z-50 flex justify-center items-center">
            <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg modal">
                <h3 class="text-lg font-semibold text-red-600">Error</h3>
                <p class="text-gray-700 mt-2">{{ Cache::get('error') }}</p>
                {{-- <div class="mt-4 flex justify-end">
                    <button onclick="closeModal('error-modal')"
                        class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">
                        Close
                    </button>
                </div> --}}
            </div>
        </div>

        <script>
            setTimeout(function() {
                closeModal('error-modal');
            }, 1500);

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);

                modal.querySelector('.modal').classList.add('modal-close');

                setTimeout(() => {
                    modal.style.display = 'none';
                    modal.querySelector('.modal').classList.remove('modal-close');
                }, 300);
            }
        </script>
    @endif

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="relative w-64 bg-x-purple text-white shadow-lg h-full flex flex-col gap-8 justify-between">
            <div>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Buket_ku.id" class="w-full h-auto">
                </a>
            </div>

            <nav class="flex-grow flex items-start justify-center">
                <ul class="space-y-1 w-full">
                    <li>
                        <a href="{{ route('admin') }}"
                            class="flex gap-6 items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-x-purple transition-colors duration-300 ease-in-out">
                            <i class="fas fa-tachometer-alt"></i> <!-- Dashboard Icon -->
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}"
                            class="flex gap-6 items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-x-purple transition-colors duration-300 ease-in-out">
                            <i class="fas fa-box mr-1"></i> <!-- Products Icon -->
                            <span class="ml-2">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orders.index') }}"
                            class="flex gap-6 items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-x-purple transition-colors duration-300 ease-in-out">
                            <i class="fas fa-shopping-cart"></i> <!-- Orders Icon -->
                            <span class="ml-2">Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex gap-6 items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-x-purple transition-colors duration-300 ease-in-out">
                            <i class="fas fa-users"></i> <!-- Custom Orders Icon -->
                            <span class="ml-2">Customers</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <form action="{{ route('logout') }}" method="POST" class="flex items-center justify-center p-2">
                @csrf
                <button type="submit"
                    class="flex items-center font-bold justify-center py-3 px-4 text-white hover:bg-x-red transition-colors duration-300 ease-in-out w-full  rounded-lg">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="ml-2">Logout</span>
                </button>
            </form>
        </aside>

        <!-- Main content -->
        <main class="flex-1 h-full overflow-auto bg-x-grey">
            @yield('content')
        </main>
    </div>
    @yield('scripts')

    @vite('resources/js/app.js')
</body>

</html>
