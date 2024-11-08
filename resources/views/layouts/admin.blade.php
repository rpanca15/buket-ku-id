<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        <aside class="relative w-64 bg-purple-700 text-white shadow-lg h-full flex flex-col justify-between">
            <div class="py-6 px-6">
                <img src="{{ asset('images/logotrans.png') }}" alt="Logo Buket_ku.id">
            </div>
            <nav class="flex-grow flex items-center justify-center">
                <ul class="space-y-1 w-full">
                    <li>
                        <a href="/admin"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-purple-600 transition-colors duration-300 ease-in-out">
                            <i class="fas fa-tachometer-alt"></i> <!-- Dashboard Icon -->
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-purple-600 transition-colors duration-300 ease-in-out">
                            <i class="fas fa-list-alt"></i> <!-- Categories Icon -->
                            <span class="ml-2">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/products"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-purple-600 transition-colors duration-300 ease-in-out">
                            <i class="fas fa-box"></i> <!-- Products Icon -->
                            <span class="ml-2">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-purple-600 transition-colors duration-300 ease-in-out">
                            <i class="fas fa-shopping-cart"></i> <!-- Orders Icon -->
                            <span class="ml-2">Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-purple-600 transition-colors duration-300 ease-in-out">
                            <i class="fas fa-paint-brush"></i> <!-- Custom Orders Icon -->
                            <span class="ml-2">Custom Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-purple-600 transition-colors duration-300 ease-in-out">
                            <i class="fas fa-credit-card"></i> <!-- Payments Icon -->
                            <span class="ml-2">Payments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center font-bold py-3 px-4 text-white hover:bg-white hover:text-purple-600 transition-colors duration-300 ease-in-out">
                            <i class="fas fa-star"></i> <!-- Reviews Icon -->
                            <span class="ml-2">Reviews</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <a href="#"
                class="flex items-center font-bold justify-center py-3 px-4 text-white bg-red-500 hover:bg-red-600 transition-colors duration-300 ease-in-out">
                <i class="fas fa-sign-out-alt"></i> <!-- Logout Icon -->
                <span class="ml-2">Logout</span>
            </a>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-6 h-full overflow-auto bg-white">
            @yield('content')
        </main>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
