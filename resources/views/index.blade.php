@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Daftar Produk</h1>
            <a href="{{ route('products.create') }}"
                class="px-4 py-2 bg-x-purple text-white rounded hover:bg-purple-700 transition">Tambah Produk</a>
        </div>

        <!-- Daftar Produk -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-6 py-3">Nama Produk</th>
                        <th class="px-6 py-3">Harga</th>
                        <th class="px-6 py-3">Stok</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $product->name }}</td>
                            <td class="px-6 py-3">{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-3">{{ $product->stock }}</td>
                            <td class="px-6 py-3 text-center">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="text-x-purple hover:text-purple-700">Edit</a>
                                |
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
