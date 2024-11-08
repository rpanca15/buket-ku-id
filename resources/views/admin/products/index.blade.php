@extends('layouts.admin')

@section('title')
    Products | Buket_ku.id
@endsection

@section('content')
<div class="container mx-auto px-4 py-4">
    <!-- Header dengan judul dan tombol tambah -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Product</h1>
        <a href="{{ route('products.create') }}"
           class="flex items-center bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
           <i class="fas fa-plus text-xl"></i>&nbsp;Tambah Produk
        </a>
    </div>

    <!-- Tabel Produk -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="border-b p-4 bg-gray-100">ID</th>
                    <th class="border-b p-4 bg-gray-100">Nama Produk</th>
                    <th class="border-b p-4 bg-gray-100">Deskripsi</th>
                    <th class="border-b p-4 bg-gray-100">Harga</th>
                    <th class="border-b p-4 bg-gray-100">Stok</th>
                    <th class="border-b p-4 bg-gray-100">Kategori</th>
                    <th class="border-b p-4 bg-gray-100 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="border-b p-4">{{ $product->id }}</td>
                        <td class="border-b p-4">{{ $product->name }}</td>
                        <td class="border-b p-4">{{ $product->description }}</td>
                        <td class="border-b p-4">Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                        <td class="border-b p-4">{{ $product->stock }}</td>
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
