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
</head>

<body class="bg-gray-100">
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
