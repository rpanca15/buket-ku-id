@extends('layouts.admin')

@section('title')
    {{ $product->name }} | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-4 py-2 relative">
        <!-- Tombol Kembali -->
        <a href="{{ route('products.index') }}" title="Kembali ke Daftar Produk"
           class="text-black-700 group rounded-lg absolute top-4 left-4">
            <i class="fas fa-arrow-left text-xl group-hover:opacity-60"></i>
        </a>
        
        <h1 class="text-3xl font-bold mb-6 text-center">Detail Produk</h1>
        
        <div class="flex flex-wrap gap-4">
            <!-- Gambar Produk -->
            <div class="flex-1 bg-white shadow-lg rounded-lg p-6">
                @if ($product->image)
                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="Gambar Produk"
                         class="w-full h-auto rounded border">
                @else
                    <p class="text-center text-gray-500">Gambar tidak tersedia</p>
                @endif
            </div>
            
            <!-- Detail Produk -->
            <div class="flex-1 bg-white shadow-lg rounded-lg p-6">
                <!-- Nama Produk -->
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-gray-700">Nama Produk</h2>
                    <p class="text-gray-600">{{ $product->name }}</p>
                </div>

                <!-- Deskripsi Produk -->
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-gray-700">Deskripsi</h2>
                    <p class="text-gray-600">{{ $product->description }}</p>
                </div>

                <!-- Harga Produk -->
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-gray-700">Harga</h2>
                    <p class="text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>

                <!-- Stok Produk -->
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-gray-700">Stok</h2>
                    <p class="text-gray-600">{{ $product->stock }} pcs</p>
                </div>

                <!-- Kategori Produk -->
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-gray-700">Kategori</h2>
                    <p class="text-gray-600">{{ $product->category->name ?? 'Tidak ada kategori' }}</p>
                </div>

                <!-- Tindakan -->
                <div class="flex justify-between mt-4">
                    <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
