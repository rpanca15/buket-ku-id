@extends('layouts.app')

@section('title')
    Cart | Buket_ku.id
@endsection

@section('content')
    <main class="flex flex-col items-start self-end w-full px-20">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="Breadcrumb" class="flex items-center text-base">
            <ol class="flex items-center">
                <li><a href="/" class="text-black text-opacity-60 hover:text-opacity-100">Home</a></li>
                <li class="mx-2"><i class="fas fa-chevron-right text-sm text-gray-600"></i></li>
                <li aria-current="page" class="text-violet-700 font-medium">Cart</li>
            </ol>
        </nav>

        <div class="self-stretch mt-5 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <!-- Main Cart Section -->
                <section class="flex flex-col w-3/5 max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col grow font-bold text-black max-md:mt-10 max-md:max-w-full">
                        <h1 class="self-start text-4xl">Your Cart</h1>

                        @if ($cartItems->isEmpty())
                            <!-- Tampilkan pesan pemberitahuan jika keranjang kosong -->
                            <div class="flex flex-col items-center justify-center mt-20">
                                <p class="text-2xl font-bold text-gray-500">Your cart is empty.</p>
                                <p class="text-lg text-gray-400">Add some products to your cart to proceed.</p>
                            </div>
                        @else
                            @foreach ($cartItems as $item)
                                <div
                                    class="flex overflow-hidden flex-col px-6 py-5 mt-5 w-full rounded-3xl border border-solid border-black border-opacity-10 max-md:px-5 max-md:max-w-full">
                                    <article class="flex flex-wrap gap-4 items-center w-full max-md:max-w-full">
                                        <img loading="lazy" src="{{ asset('/storage/products/' . $item->product->image) }}"
                                            alt="{{ $item->product->name }}"
                                            class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[124px]" />
                                        <div
                                            class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                                            <div class="flex flex-col justify-between self-stretch my-auto min-h-[118px]">
                                                <div class="flex flex-col gap-2">
                                                    <h2 class="text-xl">{{ $item->product->name }}</h2>
                                                    <h2 class="text-sm">Stock: {{ $item->product->stock }}</h2>
                                                </div>
                                                <p class="text-2xl max-md:mt-10">
                                                    {{ 'Rp ' . number_format($item->product->price, 0, ',', '.') }}</p>
                                            </div>
                                            <div
                                                class="flex flex-col justify-between items-end self-stretch my-auto text-sm whitespace-nowrap min-h-[124px] w-[225px]">
                                                <div class="min-w-full flex items-center justify-between">
                                                    <input type="checkbox" name="selected_items[]"
                                                        value="{{ $item->product_id }}"
                                                        data-product-id="{{ $item->product->id }}"
                                                        data-price="{{ $item->product->price * $item->quantity }}"
                                                        class="select-item cursor-pointer w-6 h-6 rounded-md border-gray-300">
                                                    <form action="{{ route('cart.remove', $item->product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                                            class="text-2xl text-red-500 hover:text-red-700 rounded-full transition ease-in duration-300">
                                                            <i class="fas fa-circle-minus"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div
                                                    class="flex overflow-hidden gap-5 justify-center items-center p-2 mt-14 bg-zinc-100 rounded-[62px] max-md:mt-10">
                                                    <button type="button"
                                                        class="quantity-decrease text-sm px-3 py-2 rounded-full hover:bg-gray-300 transition ease-in duration-300"
                                                        data-product-id="{{ $item->product->id }}"
                                                        {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <input type="number"
                                                        class="quantity-input w-14 text-center py-2 rounded-full bg-white border border-gray-300"
                                                        data-product-id="{{ $item->product->id }}"
                                                        value="{{ $item->quantity }}" min="1"
                                                        max="{{ $item->product->stock }}" required />

                                                    <button type="button"
                                                        class="quantity-increase text-sm px-3 py-2 rounded-full hover:bg-gray-300 transition ease-in duration-300"
                                                        data-product-id="{{ $item->product->id }}">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach

                            <!-- Tampilkan total harga hanya jika ada produk dalam cart -->
                            <div class="mt-5 text-xl font-bold">
                                <p>Total: {{ 'Rp ' . number_format($totalPrice, 0, ',', '.') }}</p>
                            </div>
                        @endif
                    </div>
                </section>

                <!-- Aside Section for Order Details -->
                <aside class="flex flex-col ml-5 w-1/2 max-md:ml-0">
                    <div class="flex flex-col gap-6 w-full text-black max-md:mt-10">
                        <h2 class="text-2xl font-bold">Rincian Pemesanan</h2>
                        <form action="{{ route('order.checkout') }}" method="POST" id="checkoutForm"
                            enctype="multipart/form-data" class="flex flex-col gap-6">
                            @csrf
                            <!-- Dropdown Lokasi COD -->
                            <div class="flex items-center justify-between gap-3 p-2 bg-zinc-100 rounded-[62px]">
                                <label for="lokasi-cod" class="ps-6 text-sm font-medium">Pilih lokasi COD</label>
                                <select id="lokasi-cod" name="cod_location"
                                    class="w-1/2 flex items-center justify-center bg-white border-none text-sm py-2 px-6 rounded-full">
                                    <option value="" disabled selected hidden>-- Pilih lokasi --</option>
                                    <option value="SMAN 8 Surakarta">SMAN 8 Surakarta</option>
                                    <option value="Taman Jaya Wijaya">Taman Jaya Wijaya</option>
                                    <option value="UNS Kentingan">UNS Kentingan</option>
                                    <option value="buket-ku-id">Ambil di alamat Buket_ku.id</option>
                                </select>
                                @error('cod_location')
                                    <div class="text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Dropdown Metode Pembayaran -->
                            <div class="flex items-center justify-between gap-3 p-2 bg-zinc-100 rounded-[62px]">
                                <label for="metode-pembayaran" class="ps-6 text-sm font-medium">Pilih metode
                                    pembayaran</label>
                                <select id="metode-pembayaran" name="payment_method"
                                    class="w-1/2 flex items-center justify-center bg-white border-none text-sm py-2 px-6 rounded-full">
                                    <option value="" disabled selected hidden>-- Pilih metode --</option>
                                    <option value="COD">Bayar di tempat</option>
                                    <option value="SPAY">Shopeepay</option>
                                </select>
                                @error('payment_method')
                                    <div class="text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Pemilih Tanggal -->
                            <div class="flex items-center justify-between gap-3 p-2 bg-zinc-100 rounded-[62px]">
                                <label for="tanggal-cod" class="ps-6 text-sm font-medium">Pilih Tanggal COD</label>
                                <input type="date" id="tanggal-cod" name="cod_date"
                                    class="w-1/2 flex items-center justify-center bg-white border-none text-sm py-2 rounded-full"
                                    required />
                            </div>

                            <!-- Garis Pemisah -->
                            <div class="flex flex-col gap-3 max-w-full">
                                <hr class="w-full border-t border-solid border-black border-opacity-10" />
                                <div class="flex justify-between items-center w-full">
                                    <p class="text-xl">Total</p>
                                    <p class="text-2xl font-bold text-right total-price">Rp 0</p>
                                </div>
                            </div>

                            <!-- Tombol Checkout -->
                            <button type="submit" id="checkout-button"
                                class="flex gap-3 justify-center items-center self-end px-12 py-4 mt-8 text-base font-bold text-white bg-gray-300 rounded-[62px] cursor-not-allowed transition-colors ease-in duration-300">
                                <span class="self-stretch">Go to Checkout</span>
                                <i class="fas fa-bag-shopping"></i>
                            </button>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </main>

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
        const checkboxes = document.querySelectorAll('.select-item');
        const lokasiCod = document.getElementById('lokasi-cod');
        const metodePembayaran = document.getElementById('metode-pembayaran');
        const tanggalCod = document.getElementById('tanggal-cod');
        const checkoutButton = document.getElementById('checkout-button');
        const selectedProductsInput = document.getElementById('selected-products');
        const totalPriceElement = document.querySelector('.total-price');

        function checkSelections() {
            // Cek apakah ada checkbox yang dipilih
            const isItemSelected = Array.from(checkboxes).some(checkbox => checkbox.checked);
            const isFormComplete = lokasiCod.value && metodePembayaran.value && tanggalCod.value;

            if (isItemSelected && isFormComplete) {
                checkoutButton.classList.remove('bg-gray-300', 'cursor-not-allowed');
                checkoutButton.classList.add('bg-violet-900', 'hover:bg-violet-700');
                checkoutButton.disabled = false;
            } else {
                checkoutButton.classList.add('bg-gray-300', 'cursor-not-allowed');
                checkoutButton.classList.remove('bg-violet-900', 'hover:bg-violet-700');
                checkoutButton.disabled = true;
            }

            // Menghitung total harga berdasarkan produk yang dipilih
            let totalPrice = 0;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    totalPrice += parseFloat(checkbox.dataset.price);
                }
            });

            totalPriceElement.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
        }

        // Tambahkan event listener untuk checkbox dan form fields
        checkboxes.forEach(checkbox => checkbox.addEventListener('change', checkSelections));
        lokasiCod.addEventListener('change', checkSelections);
        metodePembayaran.addEventListener('change', checkSelections);
        tanggalCod.addEventListener('change', checkSelections);

        // Periksa pada saat halaman pertama kali dimuat
        checkSelections();

        document.getElementById('checkoutForm').addEventListener('submit', function(event) {
            const selectedCheckboxes = document.querySelectorAll('.select-item:checked');
            const selectedItems = Array.from(selectedCheckboxes).map(checkbox => checkbox.value);

            const existingInput = document.getElementById('selected-products');
            if (existingInput) {
                existingInput.remove();
            }

            selectedItems.forEach((itemId, index) => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = `selected_items[${index}]`;
                input.value = itemId;
                this.appendChild(input);
            });
        });

        // Fungsi update kuantitas
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Handle quantity updates for all items
            document.querySelectorAll('.quantity-input').forEach(input => {
                const productId = input.dataset.productId;
                const decreaseBtn = document.querySelector(
                    `.quantity-decrease[data-product-id="${productId}"]`);
                const increaseBtn = document.querySelector(
                    `.quantity-increase[data-product-id="${productId}"]`);
                const maxStock = parseInt(input.max);

                // Increase button handler
                increaseBtn.addEventListener('click', function() {
                    let currentValue = parseInt(input.value);
                    if (currentValue < maxStock) {
                        input.value = currentValue + 1;
                        updateQuantity(productId, input.value);
                    }
                });

                // Decrease button handler
                decreaseBtn.addEventListener('click', function() {
                    let currentValue = parseInt(input.value);
                    if (currentValue > 1) {
                        input.value = currentValue - 1;
                        updateQuantity(productId, input.value);
                    }
                });

                // Manual input handler
                input.addEventListener('input', function() {
                    let value = parseInt(this.value);
                    if (isNaN(value) || value < 1) {
                        this.value = 1;
                        value = 1;
                    } else if (value > maxStock) {
                        this.value = maxStock;
                        value = maxStock;
                    }
                    updateQuantity(productId, value);
                });
            });

            // Debounced update function
            let updateTimeouts = {};

            function updateQuantity(productId, newQuantity) {
                if (updateTimeouts[productId]) {
                    clearTimeout(updateTimeouts[productId]);
                }

                updateTimeouts[productId] = setTimeout(function() {
                    const updateUrl = `/carts/update/${productId}`;

                    fetch(updateUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            body: JSON.stringify({
                                quantity: newQuantity,
                            }),
                        })
                        .then(response => {
                            if (response.ok) {
                                window.location.href = "{{ route('cart.index') }}";
                            } else {
                                console.warn('Update request failed');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan dalam pengiriman kuantitas.');
                        });
                }, 300);
            }
        });
    </script>
@endsection
