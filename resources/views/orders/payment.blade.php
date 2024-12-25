@extends('layouts.app')

@section('title')
    Checkout Pembayaran | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('order.index') }}"
                class="flex items-center bg-x-purple text-white px-4 py-2 rounded-full hover:bg-purple-500 transition ease-in-out duration-300">
                <i class="fas fa-arrow-left text-xl mr-1"></i>&nbsp;Kembali
            </a>
            <h1 class="text-3xl font-bold">Checkout Pembayaran</h1>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 mx-auto w-full lg:w-1/2">
            <div class="flex flex-col lg:flex-row lg:space-x-6">
                <!-- Bagian Informasi QR Code -->
                <div class="bg-gradient-to-r from-orange-400 to-red-500 p-6 rounded-lg shadow-lg flex-1">
                    <div class="bg-white p-4 rounded-lg shadow-md text-center">
                        <img alt="ShopeePay Logo" class="mx-auto mb-4" height="100"
                            src="https://storage.googleapis.com/a1aa/image/UHr19fCL1WwfDETx3lMFxxqofqqfbnzoYfAqCNBefbq2xP63JA.jpg"
                            width="100" />
                        <p class="text-center font-bold">dhewipututra</p>
                        <p class="text-center text-gray-500">(+62)895******849</p>
                        <img alt="QR Code" class="mx-auto my-4" height="200"
                            src="https://storage.googleapis.com/a1aa/image/uE18mUPUQmLZA5OUPIyxSz7crI2tmW1Re0e0RAjQreoKfRfdC.jpg"
                            width="200" />
                        <p class="text-center text-gray-500">
                            Kirim uang dari semua bank dan e-wallet pakai QRIS ShopeePay.
                        </p>
                    </div>
                </div>
            </div>

            @php
                $orderDetails = [
                    'order_id' => $order->id,
                    'customer_name' => $order->user->name,
                    'product_count' => $order->product_count,
                    'cod_date' => \Carbon\Carbon::parse($order->cod_date)->format('d M Y'),
                    'cod_location' => $order->cod_location,
                    'total_price' => 'Rp' . number_format($order->total, 2, ',', '.'),
                ];

                $whatsappMessage =
                    "Pembayaran Pesanan #{$orderDetails['order_id']}\n\n" .
                    "Nama: {$orderDetails['customer_name']}\n" .
                    "Jumlah Produk: {$orderDetails['product_count']}\n" .
                    "Tanggal COD: {$orderDetails['cod_date']}\n" .
                    "Lokasi COD: {$orderDetails['cod_location']}\n" .
                    "Total Harga: {$orderDetails['total_price']}\n\n" .
                    'Bukti Pembayaran: [Masukkan bukti pembayaran di sini].';
            @endphp

            <!-- Tombol Kirim Pesan ke WhatsApp -->
            <div class="mt-8 w-full text-center">
                <a href="https://wa.me/+6285866505631?text={{ urlencode($whatsappMessage) }}" target="_blank"
                    class="w-full px-6 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition"
                    id="whatsappBtn">
                    Kirim Pesan ke WhatsApp
                </a>
            </div>

            <!-- Form untuk Tombol Done (untuk menandakan bahwa pembayaran telah selesai) -->
            <form action="{{ route('order.processPayment', $order->id) }}" method="POST" id="doneForm" class="hidden">
                @csrf
                <div class="mt-4">
                    <button type="submit"
                        class="w-full px-6 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">
                        Done
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Menunggu pesan dikirim melalui WhatsApp dan menampilkan tombol Done setelah itu
        document.getElementById('whatsappBtn').addEventListener('click', function() {
            // Menunggu beberapa detik untuk simulasi WhatsApp terbuka (sesuaikan jika perlu)
            setTimeout(function() {
                // Menyembunyikan tombol WhatsApp
                document.getElementById('whatsappBtn').classList.add('hidden');
                // Menampilkan tombol Done
                document.getElementById('doneForm').classList.remove('hidden');
            }, 2000); // Waktu tunggu (misalnya 2 detik setelah klik WhatsApp)
        });
    </script>
@endsection
