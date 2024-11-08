<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Style for the active menu item */
        .active {
            background-color: white;
            color: #6B46C1; /* purple-600 */
        }
    </style>
    <script>
        // Get all the menu links
        const menuLinks = document.querySelectorAll('aside nav ul li a');
    
        // Add click event to each link
        menuLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                // Remove 'active' class from all links
                menuLinks.forEach(link => link.classList.remove('active'));
    
                // Add 'active' class to the clicked link
                this.classList.add('active');
            });
        });
    </script>        
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="relative w-64 bg-x-purple text-white shadow-lg h-full flex flex-col gap-8 justify-between">
            <div class="py-6 px-6">
                <img src="{{ asset('images/logotrans.png') }}" alt="Logo Buket_ku.id">
            </div>
            <nav class="flex-grow flex items-start justify-center">
                <ul class="space-y-1 w-full">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-x-purple transition-colors duration-300 ease-in-out">
                            <i class="fas fa-tachometer-alt"></i> <!-- Dashboard Icon -->
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-x-purple transition-colors duration-300 ease-in-out">
                            <i class="fas fa-box"></i> <!-- Products Icon -->
                            <span class="ml-2">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-x-purple transition-colors duration-300 ease-in-out">
                            <i class="fas fa-shopping-cart"></i> <!-- Orders Icon -->
                            <span class="ml-2">Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-x-purple transition-colors duration-300 ease-in-out">
                            <i class="fas fa-paint-brush"></i> <!-- Custom Orders Icon -->
                            <span class="ml-2">Custom Orders</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <a href="#"
                class="flex items-center font-bold justify-center py-3 px-4 text-white bg-x-red hover:bg-red-600 transition-colors duration-300 ease-in-out">
                <i class="fas fa-sign-out-alt"></i>
                <span class="ml-2">Logout</span>
            </a>
        </aside>

        <!-- Main content -->
        <main class="flex-1 h-full overflow-auto bg-white">
            @yield('content')
        </main>
    </div>
    @yield('scripts')

    @vite('resources/js/app.js')
</body>

</html>
