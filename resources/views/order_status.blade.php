@extends('layouts.app')

@section('title')
    Order | Buket_ku.id
@endsection

@section('content')
    <section class="flex overflow-hidden flex-col gap-4 bg-white max-md:pb-24 px-20" aria-labelledby="order-status-heading">
        <nav aria-label="Breadcrumb" class="flex items-center text-base">
            <ol class="flex items-center">
                <li><a href="/" class="text-black text-opacity-60 hover:text-opacity-100">Home</a></li>
                <li class="mx-2"><i class="fas fa-chevron-right text-sm text-gray-600"></i></li>
                <li aria-current="page" class="text-violet-700 font-medium">Order</li>
            </ol>
        </nav>

        <div class="w-full">
            <!-- Header -->
            <h1 id="order-status-heading" class="self-start text-4xl font-bold text-black">Order Status</h1>

            <!-- Tab Navigation -->
            <div class="flex justify-around items-start mt-10 w-full text-2xl font-medium text-black border-b relative">
                <button class="w-full tab-item px-5 py-2 border-b-4 border-transparent focus:outline-none" data-tab="1">
                    Belum Dibayar
                </button>
                <button class="w-full tab-item px-5 py-2 border-b-4 border-transparent focus:outline-none" data-tab="2">
                    Diproses
                </button>
                <button class="w-full tab-item px-5 py-2 border-b-4 border-transparent focus:outline-none" data-tab="3">
                    Konfirmasi
                </button>
                <button class="w-full tab-item px-5 py-2 border-b-4 border-transparent focus:outline-none" data-tab="4">
                    Selesai
                </button>
                <div class="underline-animation absolute bottom-0 left-0 h-1 bg-black transition-all duration-300 ease-out"
                    style="width: 25%;"></div>
            </div>

            <!-- Tab Content -->
            <div class="tab-content mt-10">
                <!-- Tab 1 Content -->
                <div class="tab-panel block" id="tab-1">
                    <section aria-labelledby="order-summary-heading" class="max-md:mt-10">
                        <div class="flex flex-col text-xl rounded-3xl border border-violet-900 border-solid min-h-auto">
                            <!-- Bagian Kiri -->
                            <div class="flex flex-col w-full items-start gap-2 p-6 max-md:p-5 relative">
                                <button
                                    class="absolute top-6 right-6 px-6 py-2 bg-violet-500 rounded-3xl text-white hover:bg-violet-700 transition ease-in-out duration-300">Bayar</button>
                                <p class="text-xl text-black">ID Order: SMA 8</p>
                                <p class="text-xl text-black">Lokasi COD: SMA 8</p>
                                <p class="text-xl text-black">Tanggal COD: 20 November 2024</p>
                                <p class="text-xl text-black">Metode Bayar: COD</p>
                                <p class="text-xl font-bold text-black">Total Harga: Rp46.000</p>

                                <section aria-label="Order Items"
                                    class="flex justify-between items-center gap-4 mt-5 w-full font-bold overflow-x-auto scrollbar-hide">
                                    <!-- Item Template -->
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Tab 2 Content -->
                <div class="tab-panel hidden" id="tab-2">
                    <section aria-labelledby="order-summary-heading" class="max-md:mt-10">
                        <div class="flex flex-col text-xl rounded-3xl border border-violet-900 border-solid min-h-auto">
                            <!-- Bagian Kiri -->
                            <div class="flex flex-col w-full items-start gap-2 p-6 max-md:p-5 relative">
                                <p
                                    class="absolute top-6 right-6 px-6 py-2 bg-violet-100 rounded-3xl text-violet-900 text-center">
                                    Sedang Diproses</p>
                                <p class="text-xl text-black">ID Order: SMA 8</p>
                                <p class="text-xl text-black">Lokasi COD: SMA 8</p>
                                <p class="text-xl text-black">Tanggal COD: 20 November 2024</p>
                                <p class="text-xl text-black">Metode Bayar: COD</p>
                                <p class="text-xl font-bold text-black">Total Harga: Rp46.000</p>

                                <section aria-label="Order Items"
                                    class="flex justify-between items-center gap-4 mt-5 w-full font-bold overflow-x-auto scrollbar-hide">
                                    <!-- Item Template -->
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Tab 3 Content -->
                <div class="tab-panel hidden" id="tab-3">
                    <section aria-labelledby="order-summary-heading" class="max-md:mt-10">
                        <div class="flex flex-col text-xl rounded-3xl border border-violet-900 border-solid min-h-auto">
                            <!-- Bagian Kiri -->
                            <div class="flex flex-col w-full items-start gap-2 p-6 max-md:p-5 relative">
                                <button
                                    class="absolute top-6 right-6 px-6 py-2 bg-violet-500 rounded-3xl text-white hover:bg-violet-700 transition ease-in-out duration-300">Konfirmasi</button>
                                <p class="text-xl text-black">ID Order: SMA 8</p>
                                <p class="text-xl text-black">Lokasi COD: SMA 8</p>
                                <p class="text-xl text-black">Tanggal COD: 20 November 2024</p>
                                <p class="text-xl text-black">Metode Bayar: COD</p>
                                <p class="text-xl font-bold text-black">Total Harga: Rp46.000</p>

                                <section aria-label="Order Items"
                                    class="flex justify-between items-center gap-4 mt-5 w-full font-bold overflow-x-auto scrollbar-hide">
                                    <!-- Item Template -->
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Tab 4 Content -->
                <div class="tab-panel hidden" id="tab-4">
                    <section aria-labelledby="order-summary-heading" class="max-md:mt-10">
                        <div class="flex flex-col text-xl rounded-3xl border border-violet-900 border-solid min-h-auto">
                            <!-- Bagian Kiri -->
                            <div class="flex flex-col w-full items-start gap-2 p-6 max-md:p-5 relative">
                                <p
                                    class="absolute top-6 right-6 px-6 py-2 bg-violet-100 rounded-3xl text-violet-900 text-center">
                                    Selesai</p>
                                <p class="text-xl text-black">ID Order: SMA 8</p>
                                <p class="text-xl text-black">Lokasi COD: SMA 8</p>
                                <p class="text-xl text-black">Tanggal COD: 20 November 2024</p>
                                <p class="text-xl text-black">Metode Bayar: COD</p>
                                <p class="text-xl font-bold text-black">Total Harga: Rp46.000</p>

                                <section aria-label="Order Items"
                                    class="flex justify-between items-center gap-4 mt-5 w-full font-bold overflow-x-auto scrollbar-hide">
                                    <!-- Item Template -->
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cceb2f95aa68b0cde986fab020a6b5cac25e28f81f5e03e6faa0192e69692015?placeholderIfAbsent=true&apiKey=d1735fa541f5476b84a6d958e12b16eb"
                                            alt="Gradient Graphic T-shirt"
                                            class="object-contain rounded-lg h-auto w-[96px]" />
                                        <div class="flex flex-col gap-2 justify-between h-full">
                                            <h3 class="text-base text-black leading-[20px]">Gradient Graphic T-shirt</h3>
                                            <div>
                                                <p class="text-xl text-black">$145 <span
                                                        class="text-base">{{ '/' }}buah</span></p>
                                                <p class="text-base text-black">10 buah</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Tab Switching Script
        document.querySelectorAll('.tab-item').forEach((tab) => {
            tab.addEventListener('click', (e) => {
                const tabId = tab.getAttribute('data-tab');

                // Remove active styles from all tabs
                document.querySelectorAll('.tab-item').forEach((btn) => {
                    btn.classList.remove('border-black');
                    btn.classList.add('border-transparent');
                });

                // Hide all tab panels
                document.querySelectorAll('.tab-panel').forEach((panel) => {
                    panel.classList.add('hidden');
                    panel.classList.remove('block');
                });

                // Activate clicked tab
                tab.classList.add('border-black');
                tab.classList.remove('border-transparent');

                // Show related tab panel
                document.getElementById(`tab-${tabId}`).classList.remove('hidden');
                document.getElementById(`tab-${tabId}`).classList.add('block');

                // Animate underline
                const underline = document.querySelector('.underline-animation');
                const tabWidth = tab.offsetWidth;
                const tabPosition = tab.offsetLeft;

                // Apply animation for underline movement
                underline.style.width = `${tabWidth}px`;
                underline.style.left = `${tabPosition}px`;
            });
        });

        // Trigger click on the first tab to initialize the underline position
        document.querySelector('.tab-item').click();
    </script>
@endsection
