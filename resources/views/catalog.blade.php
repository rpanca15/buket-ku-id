@vite('resources/css/app.css')

<body class="bg-white">
    <header class="bg-violet-900 text-white text-sm font-bold px-20 py-2.5 flex flex-wrap items-center justify-between max-md:px-5">
        <p>
            Sign up and get 20% off to your first order.
            <a href="#" class="underline">Sign Up Now</a>
        </p>
        <img src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/9aab5cb942bad6cfcfda0e2790b30ed35bbe5baad7c1570ff823db476adbf9cb?apiKey=8d90719630234040b8c6e31cc1469133&"
            alt="" class="w-5 h-5" aria-hidden="true">
    </header>
    
    @include('header')
    <nav aria-label="Breadcrumb" class="flex items-center text-base ml-2.5">
        <ol class="flex items-center">
            <li><a href="/" class="text-black text-opacity-60 hover:text-violet-700">Home</a></li>
            <li aria-hidden="true" class="mx-2">
                <img src="https://cdn.builder.io/api/v1/image/assets/8d90719630234040b8c6e31cc1469133/e022f34536a1faf4527bf20407743f60c88ae03e0929af8760e5a1126cca6059?apiKey=8d90719630234040b8c6e31cc1469133&"
                    alt="" class="w-4 h-4">
            </li>
            <li aria-current="page" class="text-violet-700">Catalog</li>
        </ol>
    </nav>

    <main class="px-20 mt-5 max-md:px-5">
        <div class="flex flex-wrap justify-between items-end max-w-[1260px] mx-auto">
            <h1 class="text-3xl font-bold">Buket Artificial</h1>
        </div>
        
        <section class="mt-5 max-w-[1247px] mx-auto">
            <h2 class="sr-only">Product List</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <a href="link-to-product1" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_artficial/artificial_3.jpg" alt="Bunga Artificial + Kupu-Kupu" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Bunga Artificial + Kupu-Kupu</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 75.000</p>
                    </article>
                </a>
                <a href="link-to-product2" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_artficial/artificial_1.png" alt="Bunga Artificial Kawat" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Bunga Artificial Kawat</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 50.000</p>
                    </article>
                </a>
                <a href="link-to-product3" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_artficial/artificial_2.png" alt="Bunga Kupu-kupu led" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Bunga Kupu-kupu led</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 45.000</p>
                    </article>
                </a>
                <a href="link-to-product4" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src ="/assets/product_artficial/artificial_4.jpg" alt="Bunga Artificial + Kupu-kupu + boneka" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Bunga Artificial + Kupu-kupu + boneka</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 75.000</p>
                    </article>
                </a>
            </div>
        </section>

        <section class="mt-20 max-w-[1252px] mx-auto">
            <h2 class="text-3xl font-bold mb-5">Buket Wisuda</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <a href="link-to-product5" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_graduation/graduation_1.png" alt="Topper Boneka Wisuda + Artificial Flower" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Topper Boneka Wisuda + Artificial Flower</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 60.000</p>
                    </article>
                </a>
                <a href="link-to-product6" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_graduation/graduation_3.jpg" alt="Topper Wisuda 2D + Artificial Flower" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Topper Wisuda 2D + Artificial Flower</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 35.000</p>
                    </article>
                </a>
                <a href="link-to-product7" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_graduation/graduation_4.jpg" alt="Topper Boneka Wisuda + Snack" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Topper Boneka Wisuda + Snack</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 83.000</p>
                    </article>
                </a>
                <a href="link-to-product8" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_graduation/graduation_5.jpg" alt="Topper Boneka Wisuda + Snack + Artificial Flower" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Topper Boneka Wisuda + Snack + Artificial Flower</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 115.000</p>
                    </article>
                </a>
            </div>
        </section>
        <section class="mt-20 max-w-[1252px] mx-auto">
            <h2 class="text-3xl font-bold mb-5">Buket Wisuda</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <a href="link-to-product5" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_graduation/graduation_1.png" alt="Topper Boneka Wisuda + Artificial Flower" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Topper Boneka Wisuda + Artificial Flower</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 60.000</p>
                    </article>
                </a>
                <a href="link-to-product6" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_graduation/graduation_3.jpg" alt="Topper Wisuda 2D + Artificial Flower" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Topper Wisuda 2D + Artificial Flower</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 35.000</p>
                    </article>
                </a>
                <a href="link-to-product7" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_graduation/graduation_4.jpg" alt="Topper Boneka Wisuda + Snack" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Topper Boneka Wisuda + Snack</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 83.000</p>
                    </article>
                </a>
                <a href="link-to-product8" class="block">
                    <article>
                        <div class="bg-zinc-100 rounded-3xl overflow-hidden aspect-square">
                            <img src="/assets/product_graduation/graduation_5.jpg" alt="Topper Boneka Wisuda + Snack + Artificial Flower" class="w-full h-full object-cover">
                        </div>
                        <h3 class="mt-4 text-xl font-bold">Topper Boneka Wisuda + Snack + Artificial Flower</h3>
                        <p class="mt-2 text-2xl font-bold">Rp 115.000</p>
                    </article>
                </a>
            </div>
        </section>
    </main>

    @include ('footer')
</body>
</html>