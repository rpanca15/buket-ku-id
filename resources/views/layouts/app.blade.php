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
    <nav class="px-20 mt-2.5 max-md:px-5">
        <div class="flex flex-wrap gap-5 justify-between items-center max-w-[1600px] mx-auto">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Buket_ku.id Logo" class="w-[175px] h-[auto]">

            <ul class="flex gap-10 items-center text-base">
                <li><a href="#" class="hover:text-violet-700">Home</a></li>
                <div class="relative inline-block text-left group px-1">
                    <button class="px-3 py-2 hover:text-violet-700">
                        Catalog
                    </button>
                    <div
                        class="absolute left-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 invisible group-hover:visible 
                        transition-all duration-200 opacity-0 group-hover:opacity-100 z-50 pb-2">
                        <div class="py-1">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-violet-700">
                                Kategori 1
                            </a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-violet-700">
                                Kategori 2
                            </a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-violet-700">
                                Kategori 3
                            </a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-violet-700">
                                Kategori 4
                            </a>
                        </div>
                    </div>
                </div>
                <li><a href="#" class="hover:text-violet-700">Order</a></li>
                <li><a href="#" class="hover:text-violet-700">Custom Order</a></li>
                <li><a href="#" class="hover:text-violet-700">Dashboard</a></li>
            </ul>

            <form class="flex items-center bg-violet-50 rounded-full px-4 py-3 w-[485px] max-w-full">
                <img src="{{ asset('assets/images/icon/search.png') }}" alt="" class="w-6 h-6 mr-3"
                    aria-hidden="true">
                <input type="search" placeholder="Search for products..."
                    class="bg-transparent border-none outline-none flex-grow text-black text-opacity-40">
            </form>

            @guest
                <div class="flex gap-3.5">
                    <a href="{{ route('login') }}" title="Login"
                        class="px-4 py-2 text-violet-700 rounded hover:text-violet-800 transition ease-in-out duration-300">
                        <i class="fas fa-sign-in text-2xl font-bold"></i>
                    </a>
                    <a href="{{ route('register') }}" title="Register"
                        class="px-4 py-2 text-violet-700 rounded hover:text-violet-800 transition ease-in-out duration-300">
                        <i class="fas fa-user-plus text-2xl font-bold"></i>
                    </a>
                </div>
            @endguest

            @auth
                <div class="flex gap-3.5">
                    <button aria-label="User profile" class="focus:outline-none focus:ring-2 focus:ring-violet-700">
                        <img src="{{ asset('assets/images/icon/cart.png') }}" alt="" class="w-6 h-6">
                    </button>
                    <button aria-label="Shopping cart" class="focus:outline-none focus:ring-2 focus:ring-violet-700">
                        <img src="{{ asset('assets/images/icon/profile.png') }}" alt="" class="w-6 h-6">
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" title="Logout"
                            class="text-red-500 px-4 py-2 rounded-lg hover:text-red-600 transition">
                            <i class="fas fa-sign-out-alt text-2xl"></i></button>
                    </form>
                </div>
            @endauth
        </div>

        <hr class="border-t border-black border-opacity-10 my-4 max-w-[1240px] mx-auto">
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
                        class="flex flex-col grow mt-9 text-3xl font-bold leading-tight text-violet-900 max-md:mt-10 max-md:max-w-full">
                        <h2 class="self-start ml-7 max-md:ml-2.5">Our Location</h2>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/1129c489c35e5c403b6a72a63e48bc99b1f3ee37047eed9ac7592c022dbef70c?apiKey=8d90719630234040b8c6e31cc1469133&"
                            alt="Map showing our location"
                            class="object-contain mt-2 w-full aspect-[1.77] max-md:max-w-full" />
                    </div>
                </div>
            </div>
        </div>
        <hr
            class="shrink-0 mt-20 max-w-full h-px border border-solid border-black border-opacity-10 w-[1240px] max-md:mt-10" />
        <p class="mt-7 ml-6 text-sm text-right text-black text-opacity-60">
            Shop.co © 2000-2023, All Rights Reserved
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
