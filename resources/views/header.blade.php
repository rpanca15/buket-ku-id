@vite ('resources/css/app.css')

<nav class="px-20 mt-2.5 max-md:px-5">
    <div class="flex flex-wrap gap-5 justify-between items-center max-w-[1600px] mx-auto">
        <img src="/assets/logo.png" alt="Buket_ku.id Logo" class="w-[175px] h-[auto]">

        <ul class="flex gap-10 items-center text-base">
            <li><a href="/" class="hover:text-violet-700">Home</a></li>
            <div class="relative inline-block text-left group px-1">
                <a id="catalog-button" href="/catalog" class="px-3 py-2 hover:text-violet-700 flex items-center">
                    Catalog
                </a>
                <div
                    class="absolute left-0 mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 invisible group-hover:visible 
                    transition-all duration-200 opacity-0 group-hover:opacity-100 z-50 pb-2">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-violet-700">
                            Artificial
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-violet-700">
                            Graduation
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-violet-700">
                            Snack
                        </a>
                    </div>
                </div>
            </div>
            
            <li><a href="/order-status" class="hover:text-violet-700">Order</a></li>
            <li><a href="/admin" class="hover:text-violet-700">Dashboard</a></li>
        </ul>

        <form class="flex items-center bg-violet-50 rounded-full px-4 py-3 w-[485px] max-w-full">
            <img src="assets/icon/search.png"
                alt="" class="w-6 h-6 mr-3" aria-hidden="true">
            <input type="search" placeholder="Search for products..."
                class="bg-transparent border-none outline-none flex-grow text-black text-opacity-40">
        </form>

        <div class="flex gap-3.5">
            <a href="/cart" aria-label="Shopping cart" class="focus:outline-none focus:ring-2 focus:ring-violet-700">
                <img src="assets/icon/cart.png" alt="Cart" class="w-6 h-6">
            </a>
            <a href="/profile" aria-label="User  profile" class="focus:outline-none focus:ring-2 focus:ring-violet-700">
                <img src="assets/icon/profile.png" alt="Profile" class="w-6 h-6">
            </a>
        </div>
    </div>

    <hr class="border-t border-black border-opacity-10 my-4 max-w-[1240px] mx-auto">
</nav>