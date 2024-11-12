@extends('layouts.admin')

@section('title')
    Products | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Product</h1>
            <a href="{{ route('products.create') }}"
                class="flex items-center bg-x-purple text-white px-4 py-2 rounded-full hover:bg-purple-500 transition ease-in-out duration-300">
                <i class="fas fa-plus text-xl mr-1"></i>&nbsp;Add
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-4 min-h-[calc(100vh-100px)]">
            <table class="min-w-full border-collapse table-fixed">
                <thead>
                    <tr class="border-b-2">
                        <th class="text-left p-4 w-[5%]">ID</th>
                        <th class="text-left p-4 w-[20%]">Nama Produk</th>
                        <th class="text-left p-4 w-[10%]">Qty</th>
                        <th class="text-left p-4 w-[15%]">Kategori</th>
                        <th class="text-left p-4 w-[15%]">Harga</th>
                        <th class="text-left p-4 w-[25%]">Deskripsi</th>
                        <th class="text-left p-4 w-[10%]">Actions</th>
                    </tr>
                </thead>
            </table>

            <div class="overflow-y-auto min-w-full max-h-[calc(100vh-200px)]">
                <table class="min-w-full border-collapse table-fixed">
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td class="border-b p-4 w-[5%]">{{ $product->id }}</td>
                                <td class="border-b p-4 w-[20%]">{{ $product->name }}</td>
                                <td class="border-b p-4 w-[10%]">{{ $product->stock }}</td>
                                <td class="border-b p-4 w-[15%]">{{ $product->category->name ?? '-' }}</td>
                                <td class="border-b p-4 w-[15%]">Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                                <td class="border-b p-4 w-[25%]">{{ $product->description }}</td>
                                <td class="border-b p-4 w-[10%]">
                                    <div class="w-full flex items-center justify-center gap-4">
                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="text-blue-500 hover:text-blue-600 transition">
                                            <i class="fas fa-eye text-xl"></i>
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="text-yellow-500 hover:text-yellow-600 transition">
                                            <i class="fas fa-edit text-xl"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                                class="text-red-500 hover:text-red-600 transition">
                                                <i class="fas fa-trash text-xl"></i>
                                            </button>
                                        </form>
                                    </div>
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
    </div>
@endsection
