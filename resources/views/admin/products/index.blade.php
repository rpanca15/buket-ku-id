@extends('layouts.admin')

@section('title')
    Products | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Product</h1>
            <a href="{{ route('products.create') }}"
                class="flex items-center bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition">
                <i class="fas fa-plus text-xl mr-1"></i>&nbsp;Tambah
            </a>
        </div>

        <div class="bg-white shadow-lg max-h-screen rounded-lg p-4 overflow-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b-2">
                        <th class="p-4">ID</th>
                        <th class="p-4">Nama Produk</th>
                        <th class="p-4">Qty</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4">Deskripsi</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td class="border-b p-4">{{ $product->id }}</td>
                            <td class="border-b p-4">{{ $product->name }}</td>
                            <td class="border-b p-4">{{ $product->stock }}</td>
                            <td class="border-b p-4">{{ $product->category->name ?? '-' }}</td>
                            <td class="border-b p-4">Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="border-b p-4">{{ $product->description }}</td>
                            <td class="border-b p-4 text-center flex items-center justify-center gap-2">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="bg-x-yellow text-white px-3 py-2 rounded-full hover:bg-yellow-600 transition">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                        class="bg-x-red text-white px-3 py-2 rounded-full hover:bg-red-600 transition">
                                        <i class="fas fa-trash"></i>
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
