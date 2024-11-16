@extends('layouts.admin')

@section('title')
    Add Order | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-start mb-6">
            <h1 class="text-3xl font-bold">Add Order</h1>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <!-- Tanggal COD -->
                <div class="mb-4">
                    <label for="cod_date" class="block text-sm font-semibold text-gray-700 mb-1">Tanggal COD</label>
                    <input type="date" id="cod_date" name="cod_date"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('cod_date') border-red-500 @enderror"
                        value="{{ old('cod_date') }}" required>
                </div>

                <!-- Lokasi COD -->
                <div class="mb-4">
                    <label for="cod_location" class="block text-sm font-semibold text-gray-700 mb-1">Lokasi COD</label>
                    <input type="text" id="cod_location" name="cod_location"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('cod_location') border-red-500 @enderror"
                        value="{{ old('cod_location') }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Produk</label>

                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($products as $product)
                            <div class="flex items-start border p-4 rounded-lg shadow">
                                <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden">
                                    <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="w-full h-full object-cover">
                                </div>

                                <div class="ml-4 flex-1">
                                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                    <p class="text-sm text-gray-500">Harga: Rp{{ number_format($product->price, 2, ',', '.') }}</p>
                                    <p class="text-sm text-gray-500">Stok: {{ $product->stock }}</p>

                                    <!-- Quantity Input -->
                                    <div class="mt-2">
                                        <label for="quantity_{{ $product->id }}" class="block text-sm text-gray-700">Jumlah</label>
                                        <input type="number" id="quantity_{{ $product->id }}"
                                            name="products[{{ $product->id }}][quantity]"
                                            class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                                            value="{{ old('products.' . $product->id . '.quantity', 0) }}"
                                            min="0" max="{{ $product->stock }}"
                                            data-price="{{ $product->price }}"
                                            onchange="calculateTotal()">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Total Harga -->
                <div class="mb-4 mt-4">
                    <label for="total_price" class="block text-sm font-semibold text-gray-700 mb-1">Total Harga</label>
                    <input type="text" id="total_price" class="w-full px-3 py-2 border rounded-lg bg-gray-100" readonly>
                    <input type="hidden" id="total_price_value" name="total_price" value="0">
                </div>

                <!-- Status Pesanan -->
                <div class="mb-4">
                    <label for="status_id" class="block text-sm font-semibold text-gray-700 mb-1">Status Pesanan</label>
                    <select id="status_id" name="status_id"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('status_id') border-red-500 @enderror"
                        required>
                        <option value="">Pilih Status</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                    Add Order
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function calculateTotal() {
            let total = 0;

            document.querySelectorAll('input[id^="quantity_"]').forEach(function(input) {
                const quantity = parseInt(input.value) || 0;
                const price = parseFloat(input.getAttribute('data-price')) || 0;
                total += quantity * price;
            });

            // Format untuk tampilan
            document.getElementById('total_price').value = 'Rp' + total.toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            // Set nilai untuk dikirim ke server
            document.getElementById('total_price_value').value = total;
        }

        // Panggil calculateTotal saat halaman dimuat
        document.addEventListener('DOMContentLoaded', calculateTotal);
    </script>
@endsection