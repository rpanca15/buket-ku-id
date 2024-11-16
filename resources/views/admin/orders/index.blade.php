@extends('layouts.admin')

@section('title')
    Orders | Buket_ku.id
@endsection

@section('content')
<div class="container mx-auto px-6 py-4">
    <!-- Header dengan judul dan tombol tambah -->
    <div class="flex justify-between items-start mb-6">
        <h1 class="text-3xl font-bold">Orders</h1>
        <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
            Add Order
        </a>
    </div>

    <!-- Tabel Orders -->
    <div class="bg-white shadow-lg max-h-[calc(100vh-300px)] rounded-lg p-4 overflow-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b-2">
                    <th class="p-4">Order ID</th>
                    <th class="p-4">Jumlah Produk</th>
                    <th class="p-4">Tanggal COD</th>
                    <th class="p-4">Customer</th>
                    <th class="p-4">Lokasi COD</th>
                    <th class="p-4">Total Harga</th>
                    <th class="p-4">Status Pesanan</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td class="border-b p-4">{{ $order->id }}</td>
                        <td class="border-b p-4">{{ $order->product_count }}</td>
                        <td class="border-b p-4">{{ \Carbon\Carbon::parse($order->cod_date)->format('d M Y') }}</td>
                        <td class="border-b p-4">{{ $order->user->name ?? 'Unknown' }}</td>
                        <td class="border-b p-4">{{ $order->cod_location }}</td>
                        <td class="border-b p-4">Rp{{ number_format($order->total, 2, ',', '.') }}</td>
                        <td class="border-b p-4">{{ $order->status->status }}</td>
                        <td class="border-b p-4 text-center">
                            <a href="{{ route('orders.show', $order->id) }}"
                               class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 transition">
                               Detail
                            </a>
                            <a href="{{ route('orders.edit', $order->id) }}"
                               class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition">
                               Edit
                            </a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center p-4">Tidak ada pesanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
