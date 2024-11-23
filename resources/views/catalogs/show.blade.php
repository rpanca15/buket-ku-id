@extends('layouts.app')

@section('title', $product->name . ' | Buket_ku.id')
@section('content')
    <div class="flex flex-col gap-8 self-center mt-5 w-full px-20">
        <nav aria-label="Breadcrumb" class="flex items-center text-base">
            <ol class="flex items-center">
                <li><a href="/" class="text-black text-opacity-60 hover:text-opacity-100">Home</a></li>
                <li class="mx-2"><i class="fas fa-chevron-right text-sm text-gray-600"></i></li>
                <li><a href="{{ route('catalogs') }}" class="text-black text-opacity-60 hover:text-opacity-100">Catalog</a>
                </li>
                <li class="mx-2"><i class="fas fa-chevron-right text-sm text-gray-600"></i></li>
                <li>
                    <a href="{{ route('catalogs.' . strtolower($product->category->name)) }}"
                        class="text-black text-opacity-60 hover:text-opacity-100">
                        Buket {{ $product->category->name }}
                    </a>
                </li>
                <li class="mx-2"><i class="fas fa-chevron-right text-sm text-gray-600"></i></li>
                <li aria-current="page" class="text-violet-700 font-medium">{{ $product->name }}</li>
            </ol>
        </nav>
        <div class="w-full flex justify-between gap-14 flex-col md:flex-row">
            <!-- Product Image -->
            <section class="w-full md:w-2/5">
                <div class="relative">
                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}"
                        class="w-full rounded-3xl object-cover">
                </div>
            </section>

            <!-- Product Details -->
            <section class="w-full md:w-3/5 flex flex-col justify-between">
                <div class="flex flex-col gap-10">
                    <h1 class="text-4xl font-bold text-black">{{ $product->name }}</h1>
                    <p class="text-3xl font-bold text-violet-900">
                        {{ 'Rp ' . number_format($product->price, 0, ',', '.') }}
                    </p>
                    <div class="flex flex-col gap-4">
                        <p class="text-lg text-black text-opacity-80">
                            Stock: {{ $product->stock }}
                        </p>
                        <p class="text-xl text-black text-opacity-60">
                            {{ $product->description }}
                    </div>
                    </p>
                </div>
                <form class="flex items-center gap-4" action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div class="flex justify-between items-center gap-2 bg-zinc-100 rounded-full p-2">
                        <button type="button" id="decreaseQuantity"
                            class="text-lg px-4 py-2 hover:rounded-full hover:bg-gray-300">
                            <i class="fas fa-minus"></i>
                        </button>
                        <input type="number" name="quantity" id="quantity" value="1" min="1"
                            max="{{ $product->stock }}"
                            class="w-12 text-center bg-transparent border-none outline-none text-lg appearance-none -moz-appearance-none -webkit-appearance-none">
                        <button type="button" id="increaseQuantity"
                            class="text-lg px-4 py-2 hover:rounded-full hover:bg-gray-300">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <button type="submit"
                        class="w-full py-4 bg-violet-900 text-white font-bold rounded-full hover:bg-violet-700">
                        Add to Cart
                    </button>
                </form>
            </section>
        </div>
        <h2 class="self-center mt-40 text-4xl font-semibold text-black max-md:mt-10">Aturan Pemesanan</h2>
        <hr
            class="shrink-0 self-center mt-4 max-w-full h-px border border-solid border-black border-opacity-10 w-[1240px] max-md:mt-10" />
    </div>

    <style>
        /* Menghapus spinner pada input number */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen input dan tombol
            const quantityInput = document.getElementById('quantity');
            const increaseButton = document.getElementById('increaseQuantity');
            const decreaseButton = document.getElementById('decreaseQuantity');

            // Ambil nilai maksimal stok produk
            const maxStock = parseInt(quantityInput.max);

            // Fungsi untuk menambah jumlah
            increaseButton.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue < maxStock) {
                    quantityInput.value = currentValue + 1;
                }
            });

            // Fungsi untuk mengurangi jumlah
            decreaseButton.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            // Pastikan nilai input selalu berupa angka positif dan tidak lebih dari stok
            quantityInput.addEventListener('input', function() {
                let value = parseInt(quantityInput.value);
                if (isNaN(value) || value < 1) {
                    quantityInput.value = 1;
                } else if (value > maxStock) {
                    quantityInput.value = maxStock;
                }
            });
        });
    </script>
@endsection
