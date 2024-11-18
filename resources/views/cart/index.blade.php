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
                                        <img loading="lazy" src="{{ $item->product->image_url }}"
                                            alt="{{ $item->product->name }}"
                                            class="object-contain shrink-0 self-stretch my-auto rounded-lg aspect-square w-[124px]" />
                                        <div
                                            class="flex flex-wrap flex-1 shrink gap-10 justify-between items-center self-stretch my-auto basis-0 min-w-[240px] max-md:max-w-full">
                                            <div class="flex flex-col justify-between self-stretch my-auto min-h-[118px]">
                                                <h2 class="text-xl">{{ $item->product->name }}</h2>
                                                <p class="mt-14 text-2xl max-md:mt-10">
                                                    ${{ number_format($item->product->price, 2) }}</p>
                                            </div>
                                            <div
                                                class="flex flex-col justify-between items-end self-stretch my-auto text-sm whitespace-nowrap min-h-[124px] w-[225px]">
                                                <form action="{{ route('cart.remove', $item->product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-6 h-6">
                                                        <img loading="lazy" src="https://example.com/remove-icon.png"
                                                            alt="Remove" class="object-contain w-6 aspect-square" />
                                                    </button>
                                                </form>
                                                <div
                                                    class="flex overflow-hidden gap-5 justify-center items-center px-5 py-3 mt-14 bg-zinc-100 rounded-[62px] max-md:mt-10">
                                                    <button aria-label="Decrease quantity" class="w-5 h-5">
                                                        <img loading="lazy" src="https://example.com/decrease-icon.png"
                                                            alt="Decrease"
                                                            class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                                    </button>
                                                    <span>{{ $item->quantity }}</span>
                                                    <button aria-label="Increase quantity" class="w-5 h-5">
                                                        <img loading="lazy" src="https://example.com/increase-icon.png"
                                                            alt="Increase"
                                                            class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach

                            <!-- Tampilkan total harga hanya jika ada produk dalam cart -->
                            <div class="mt-5 text-xl font-bold">
                                <p>Total: ${{ number_format($totalPrice, 2) }}</p>
                            </div>
                        @endif
                    </div>
                </section>

                <!-- Aside Section for Order Details -->
                <aside class="flex flex-col ml-5 w-1/2 max-md:ml-0">
                    <div class="flex flex-col gap-6 w-full text-black max-md:mt-10">
                        <h2 class="text-2xl font-bold">Rincian Pemesanan</h2>

                        <!-- Dropdown Lokasi COD -->
                        <div class="flex items-center justify-between gap-3 p-2 bg-zinc-100 rounded-[62px]">
                            <label for="lokasi-cod" class="ps-6 text-sm font-medium">Pilih lokasi COD</label>
                            <select id="lokasi-cod" class="w-1/2 flex items-center justify-center bg-zinc-200 border-none text-sm py-2 px-6 rounded-full">
                                <option value="" disabled selected hidden>-- Pilih lokasi --</option>
                                <option value="sman-8-surakarta">SMAN 8 Surakarta</option>
                                <option value="taman-jaya-wijaya">Taman Jaya Wijaya</option>
                                <option value="uns-kentingan">UNS Kentingan</option>
                                <option value="buket-ku-id">Ambil di alamat Buket_ku.id</option>
                            </select>
                        </div>

                        <!-- Dropdown Metode Pembayaran -->
                        <div class="flex items-center justify-between gap-3 p-2 bg-zinc-100 rounded-[62px]">
                            <label for="metode-pembayaran" class="ps-6 text-sm font-medium">Pilih metode pembayaran</label>
                            <select id="metode-pembayaran" class="w-1/2 flex items-center justify-center bg-zinc-200 border-none text-sm py-2 px-6 rounded-full">
                                <option value="">-- Pilih metode --</option>
                                <option value="bayar-di-tempat">Bayar di tempat</option>
                                <option value="shopeepay">Shopeepay</option>
                            </select>
                        </div>

                        <!-- Pemilih Tanggal -->
                        <div class="flex items-center justify-between gap-3 p-2 bg-zinc-100 rounded-[62px]">
                            <label for="tanggal-cod" class="ps-6 text-sm font-medium">Pilih Tanggal COD</label>
                            <input type="date" id="tanggal-cod"
                                class="w-1/2 flex items-center justify-center bg-zinc-200 border-none text-sm py-2 rounded-full" />
                        </div>

                        <!-- Garis Pemisah -->
                        <div class="flex flex-col gap-3 max-w-full">
                            <hr class="w-full border-t border-solid border-black border-opacity-10" />
                            <div class="flex justify-between items-center w-full">
                                <p class="text-xl">Total</p>
                                <p class="text-2xl font-bold text-right">Rp{{ number_format($totalPrice, 2) }}</p>
                            </div>
                        </div>

                        <!-- Tombol Go to Checkout -->
                        <button id="checkout-button"
                            class="flex gap-3 justify-center items-center self-end px-12 py-4 mt-8 text-base font-bold text-white bg-gray-300 rounded-[62px] cursor-not-allowed disabled:opacity-50 max-md:px-5 max-md:mt-5"
                            disabled>
                            <span class="self-stretch">Go to Checkout</span>
                            <i class="fas fa-bag-shopping"></i>
                        </button>
                    </div>
                </aside>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        const lokasiCod = document.getElementById('lokasi-cod');
        const metodePembayaran = document.getElementById('metode-pembayaran');
        const tanggalCod = document.getElementById('tanggal-cod');
        const checkoutButton = document.getElementById('checkout-button');

        function checkSelections() {
            if (lokasiCod.value && metodePembayaran.value && tanggalCod.value) {
                checkoutButton.classList.remove('bg-gray-300', 'cursor-not-allowed');
                checkoutButton.classList.add('bg-violet-900');
                checkoutButton.disabled = false;
            } else {
                checkoutButton.classList.add('bg-gray-300', 'cursor-not-allowed');
                checkoutButton.classList.remove('bg-violet-900');
                checkoutButton.disabled = true;
            }
        }

        lokasiCod.addEventListener('change', checkSelections);
        metodePembayaran.addEventListener('change', checkSelections);
        tanggalCod.addEventListener('change', checkSelections);
    </script>
@endsection
