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
                    Belum Diproses
                </button>
                <button class="w-full tab-item px-5 py-2 border-b-4 border-transparent focus:outline-none" data-tab="2">
                    Diproses
                </button>
                <button class="w-full tab-item px-5 py-2 border-b-4 border-transparent focus:outline-none" data-tab="3">
                    Selesai
                </button>
                <div class="underline-animation absolute bottom-0 left-0 h-1 bg-black transition-all duration-300 ease-out"
                    style="width: 50%;"></div>
            </div>

            <!-- Tab Content -->
            <div class="tab-content mt-10">
                <!-- Tab 1 Content -->
                <div class="tab-panel block" id="tab-1">
                    <section aria-labelledby="order-summary-heading" class="flex flex-col gap-4 items-center">
                        @forelse ($pending as $item)
                            <div
                                class="flex flex-col text-xl rounded-3xl border border-violet-900 border-solid min-w-full min-h-auto">
                                <!-- Bagian Kiri -->
                                <div class="flex flex-col min-w-full items-start gap-2 p-6 max-md:p-5 relative">
                                    <div class="absolute top-6 right-6 flex items-center gap-4">
                                        <p class="px-6 py-2 bg-red-100 rounded-3xl text-red-900 text-center">
                                            {{ $item->status->status }}
                                        </p>
                                        @if($item->payment->status === 'pending' && $item->payment->method !== 'COD')
                                            <a href="{{ route('order.payment', $item->id) }}"
                                                class="px-6 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition">
                                                Bayar Sekarang
                                            </a>
                                        @endif
                                    </div>
                                    <p class="text-xl text-black">ID Order: {{ $item->id }}</p>
                                    <p class="text-xl text-black">Lokasi COD: {{ $item->cod_location }}</p>
                                    <p class="text-xl text-black">Tanggal COD:
                                        {{ \Carbon\Carbon::parse($item->cod_date)->format('d M Y') }}</p>
                                    <p class="text-xl text-black">Metode Bayar: {{ $item->payment->method }}</p>
                                    <p class="text-xl font-bold text-black">Total Harga:
                                        Rp{{ number_format($item->total, 0, ',', '.') }}</p>

                                    <section aria-label="Order Items"
                                        class="flex items-center gap-4 mt-5 w-full font-bold overflow-x-auto scrollbar-hide">
                                        @foreach ($item->details as $detail)
                                            <div
                                                class="flex items-center gap-4 min-w-[30%] max-h-[200px] p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                                <img src="{{ asset('storage/products/' . $detail->product->image) }}"
                                                    alt="{{ $detail->product->name }}"
                                                    class="object-contain rounded-lg h-auto w-[96px]" />
                                                <div class="flex flex-col self-start gap-2 h-full">
                                                    <h3 class="text-base text-black leading-[20px]">
                                                        {{ $detail->product->name }}</h3>
                                                    <div class="self-end">
                                                        <p class="text-xl text-black">
                                                            Rp{{ number_format($detail->price, 0, ',', '.') }} <span
                                                                class="text-base">{{ '/' }}buah</span></p>
                                                        <p class="text-base text-black">{{ $detail->quantity }} buah</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </section>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600">Tidak ada pesanan yang belum diproses.</p>
                        @endforelse
                    </section>
                </div>
                <!-- Tab 2 Content -->
                <div class="tab-panel hidden" id="tab-2">
                    <section aria-labelledby="order-summary-heading" class="flex flex-col gap-4 items-center">
                        @forelse ($processing as $item)
                            <div
                                class="flex flex-col text-xl rounded-3xl border border-violet-900 border-solid min-w-full min-h-auto">
                                <!-- Bagian Kiri -->
                                <div class="flex flex-col min-w-full items-start gap-2 p-6 max-md:p-5 relative">
                                    <p
                                        class="absolute top-6 right-6 px-6 py-2 bg-violet-100 rounded-3xl text-violet-900 text-center">
                                        {{ $item->status->status }}</p>
                                    <p class="text-xl text-black">ID Order: {{ $item->id }}</p>
                                    <p class="text-xl text-black">Lokasi COD: {{ $item->cod_location }}</p>
                                    <p class="text-xl text-black">Tanggal COD:
                                        {{ \Carbon\Carbon::parse($item->cod_date)->format('d M Y') }}</p>
                                    <p class="text-xl text-black">Metode Bayar: {{ $item->payment->method }}</p>
                                    <p class="text-xl font-bold text-black">Total Harga:
                                        Rp{{ number_format($item->total, 0, ',', '.') }}</p>

                                    <section aria-label="Order Items"
                                        class="flex justify-between items-center gap-4 mt-5 w-full font-bold overflow-x-auto scrollbar-hide">
                                        @foreach ($item->details as $detail)
                                            <div
                                                class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                                <img src="{{ asset('storage/products/' . $detail->product->image) }}"
                                                    alt="{{ $detail->product->name }}"
                                                    class="object-contain rounded-lg h-auto w-[96px]" />
                                                <div class="flex flex-col gap-2 justify-between h-full">
                                                    <h3 class="text-base text-black leading-[20px]">
                                                        {{ $detail->product->name }}</h3>
                                                    <div>
                                                        <p class="text-xl text-black">
                                                            Rp{{ number_format($detail->price, 0, ',', '.') }} <span
                                                                class="text-base">{{ '/' }}buah</span></p>
                                                        <p class="text-base text-black">{{ $detail->quantity }} buah</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </section>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600">Tidak ada pesanan yang sedang diproses.</p>
                        @endforelse
                    </section>
                </div>
                <!-- Tab 3 Content -->
                <div class="tab-panel hidden" id="tab-3">
                    <section aria-labelledby="order-summary-heading" class="flex flex-col gap-4 items-center">
                        @forelse ($completed as $item)
                            <div
                                class="flex flex-col text-xl rounded-3xl border border-violet-900 border-solid min-w-full min-h-auto">
                                <!-- Bagian Kiri -->
                                <div class="flex flex-col min-w-full items-start gap-2 p-6 max-md:p-5 relative">
                                    <p
                                        class="absolute top-6 right-6 px-6 py-2 bg-green-100 rounded-3xl text-green-900 text-center">
                                        {{ $item->status->status }}</p>
                                    <p class="text-xl text-black">ID Order: {{ $item->id }}</p>
                                    <p class="text-xl text-black">Lokasi COD: {{ $item->cod_location }}</p>
                                    <p class="text-xl text-black">Tanggal COD:
                                        {{ \Carbon\Carbon::parse($item->cod_date)->format('d M Y') }}</p>
                                    <p class="text-xl text-black">Metode Bayar: {{ $item->payment->method }}</p>
                                    <p class="text-xl font-bold text-black">Total Harga:
                                        Rp{{ number_format($item->total, 0, ',', '.') }}</p>

                                    <section aria-label="Order Items"
                                        class="flex justify-between items-center gap-4 mt-5 w-full font-bold overflow-x-auto scrollbar-hide">
                                        @foreach ($item->details as $detail)
                                            <div
                                                class="flex justify-between items-center gap-4 min-w-[30%] h-auto p-4 rounded-lg border border-gray-300 shadow-sm bg-white">
                                                <img src="{{ asset('storage/products/' . $detail->product->image) }}"
                                                    alt="{{ $detail->product->name }}"
                                                    class="object-contain rounded-lg h-auto w-[96px]" />
                                                <div class="flex flex-col gap-2 justify-between h-full">
                                                    <h3 class="text-base text-black leading-[20px]">
                                                        {{ $detail->product->name }}</h3>
                                                    <div>
                                                        <p class="text-xl text-black">
                                                            Rp{{ number_format($detail->price, 0, ',', '.') }} <span
                                                                class="text-base">{{ '/' }}buah</span></p>
                                                        <p class="text-base text-black">{{ $detail->quantity }} buah</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </section>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600">Tidak ada pesanan yang selesai.</p>
                        @endforelse
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
