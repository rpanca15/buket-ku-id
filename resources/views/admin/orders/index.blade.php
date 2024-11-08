@extends('layouts.admin')

@section('title')
    Orders | Buket_ku.id
@endsection

@section('content')
<div class="container mx-auto px-6 py-4">
    <!-- Header dengan judul dan tombol tambah -->
    <div class="flex justify-between items-start mb-6">
        <h1 class="text-3xl font-bold">Product</h1>
    </div>

    <!-- Tabel Produk -->
    <div class="bg-white shadow-lg max-h-[calc(100vh-300px)] rounded-lg p-4">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="p-4">Order ID</th>
                    <th class="p-4">Produk</th>
                    <th class="p-4">Tanggal COD</th>
                    <th class="p-4">Customer</th>
                    <th class="p-4">Lokasi COD</th>
                    <th class="p-4">Total Harga</th>
                    <th class="p-4">Status Pesanan</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="border-b p-4">{{ $product->id }}</td>
                        <td class="border-b p-4">{{ $product->name }}</td>
                        <td class="border-b p-4">{{ $product->description }}</td>
                        <td class="border-b p-4">{{ $product->stock }}</td>
                        <td class="border-b p-4">Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                        <td class="border-b p-4">{{ $product->category->name ?? '-' }}</td>
                        <td class="border-b p-4 text-center">
                            <a href="{{ route('products.edit', $product->id) }}"
                               class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600 transition">
                               Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center p-4">Tidak ada produk</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
