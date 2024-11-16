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

<body>
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

    <nav class="px-10 mt-2.5 max-md:px-5 max-w-screen">
        <div class="flex gap-8 justify-between items-center mx-auto">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Buket_ku.id Logo" class="w-[175px] h-[auto]">

            <ul class="flex gap-6 items-center justify-between text-base">
                <li><a href="#" class="hover:text-violet-700">Home</a></li>
                <li class="relative inline-block text-left group px-1">
                    <button class="px-3 py-2 hover:text-violet-700">
                        Catalog
                    </button>
                    <div
                        class="absolute left-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 invisible group-hover:visible 
                        transition-all duration-200 opacity-0 group-hover:opacity-100 z-50 pb-2">
                        <div class="py-1">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-violet-700">
                                Artificial
                            </a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-violet-700">
                                Graduation
                            </a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-violet-700">
                                Snack
                            </a>
                        </div>
                    </div>
                </li>
                <li><a href="{{ route('order_status') }}" class="hover:text-violet-700">Order</a></li>
                <li><a href="{{ route('admin') }}" class="hover:text-violet-700">Dashboard</a></li>
            </ul>

            <form class="flex items-center bg-violet-50 rounded-full px-4 py-3 w-[485px] max-w-full">
                <img src="{{ asset('assets/images/icon/search.png') }}" alt="" class="w-6 h-6 mr-3"
                    aria-hidden="true">
                <input type="search" placeholder="Search for products..."
                    class="bg-transparent border-none outline-none flex-grow text-black text-opacity-40">
            </form>

            @guest
                <div class="flex gap-6 items-center justify-center">
                    <a href="{{ route('login') }}" title="Login"
                        class="text-violet-900 rounded hover:text-violet-700 transition ease-in-out duration-300">
                        <i class="fas fa-sign-in text-[20px] font-bold"></i>
                    </a>
                    <a href="{{ route('register') }}" title="Register"
                        class="text-violet-900 rounded hover:text-violet-700 transition ease-in-out duration-300">
                        <i class="fas fa-user-plus text-[20px] font-bold"></i>
                    </a>
                </div>
            @endguest

            @auth
                <div class="flex gap-6 items-center jusitfy-center">
                    <a href="{{ route('admin') }}" title="Cart"
                        class="text-violet-900 rounded hover:text-violet-700 transition ease-in-out duration-300">
                        <i class="fas fa-cart-shopping text-[20px]"></i>
                    </a>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('admin') }}" title="Dashboard"
                            class="text-violet-900 rounded hover:text-violet-700 transition ease-in-out duration-300">
                            <i class="fas fa-dashboard text-[20px]"></i>
                        </a>
                    @endif
                    <a href="{{ route('admin') }}" title="Profile"
                        class="text-violet-900 rounded hover:text-violet-700 transition ease-in-out duration-300">
                        <i class="fas fa-circle-user text-[20px]"></i>
                    </a>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" title="Logout"
                        class="text-red-400 rounded-lg transition ease-in-out duration-300 relative group">
                        <i class="fas fa-sign-out-alt text-2xl flex opacity-100 group-hover:opacity-0"></i>
                        <i
                            class="fas fa-person-running text-2xl absolute left-0 top-0 opacity-0 group-hover:opacity-100  transition ease-in-out duration-300"></i>
                    </button>
                </form>
            @endauth
        </div>

        <hr class="border-t border-black border-opacity-10 my-4 mx-auto">
    </nav>

    <main>
        @yield('content')
    </main>

    <footer
        class="flex flex-col items-center self-stretch px-16 py-7 mt-56 w-full bg-zinc-100 max-md:px-5 max-md:mt-10 max-md:max-w-full">
        <div class="self-stretch max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <div class="flex flex-col w-[45%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col w-full max-md:mt-10 max-md:max-w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/44ef5edf8b785f037e273dbd106765cf405635d2eb29e96290977ed00635cee0?apiKey=8d90719630234040b8c6e31cc1469133&"
                            alt="Company logo" class="object-contain w-96 max-w-full aspect-[2.44]" />
                        <div
                            class="flex flex-wrap gap-10 justify-between items-start self-end mt-10 max-w-full w-[484px]">
                            <div class="flex flex-col min-w-[240px] w-[280px]">
                                <div class="flex flex-col max-w-full w-[280px]">
                                    <h2 class="text-4xl font-bold text-violet-900">Buket_ku.id</h2>
                                    <p
                                        class="mt-6 text-base font-semibold tracking-wider leading-6 text-black text-opacity-60">
                                        Temukan buket bunga impian yang siap memperindah momen spesial kalian. Seluruh
                                        produk kami dapat dikustomisasi sesuai dengan keinganan kalian.
                                    </p>
                                </div>
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/47560d68edbdd82d8b994e3ddf1e2144a4570eb44138df6c2d12cf033c35a62d?apiKey=8d90719630234040b8c6e31cc1469133&"
                                    alt="Social media icons"
                                    class="object-contain mt-9 max-w-full aspect-[3.86] w-[108px]" />
                            </div>
                            <nav class="text-base font-bold leading-5 text-black text-opacity-60">
                                <ul class="flex flex-col gap-6">
                                    <li><a href="/home">Home</a></li>
                                    <li><a href="/catalog">Catalog</a></li>
                                    <li><a href="#">Order</a></li>
                                    <li><a href="#">Custom Order</a></li>
                                    <li><a href="#">Dashboard</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col ml-5 w-[55%] max-md:ml-0 max-md:w-full">
                    <div
                        class="flex flex-col gap-4 grow mt-9 text-3xl font-bold leading-tight text-violet-900 max-md:mt-10 max-md:max-w-full">
                        <h2 class="self-start">Our Location</h2>
                        <div class="relative w-full h-full flex-grow">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1761.8664687535904!2d110.84770795550463!3d-7.546987133769291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a17476dfb651b%3A0xc9260aaad1c657e8!2sHomemade%20buket%20snack%20(Pre-order)!5e0!3m2!1sid!2sid!4v1731332756561!5m2!1sid!2sid"
                                style="border:0; width: 100%; height: 100%; position: absolute;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr
            class="shrink-0 mt-20 max-w-full h-px border border-solid border-black border-opacity-10 w-[1240px] max-md:mt-10" />
        <p class="mt-7 ml-6 text-sm text-right text-black text-opacity-60">
            Buket_ku.co © 2000-{{ now()->year }}, All Rights Reserved
        </p>
    </footer>
</body>

</html>
