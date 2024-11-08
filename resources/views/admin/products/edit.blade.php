@extends('layouts.admin')

@section('title')
    Update Product | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-4 py-2 relative">
        <a href="{{ route('products.index') }}" title="Kembali ke Daftar Produk"
            class="text-black-700 group rounded-lg absolute top-4 left-4">
            <i class="fas fa-arrow-left text-xl group-hover:opacity-60"></i>
        </a>
        <h1 class="text-3xl font-bold mb-6 text-center">Edit Produk</h1>
        <form id="product-form" class="flex flex-wrap gap-4" action="{{ route('products.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Gambar Produk dengan Dropzone -->
            <div id="div-upload" class="flex-1 bg-white shadow-lg rounded-lg p-6">
                <!-- Pratinjau gambar jika ada -->
                <div class="flex justify-center mb-4 {{ $product->image ? '' : 'hidden' }}" id="preview-container">
                    <img id="image-preview" src="{{ $product->image ? asset('storage/' . $product->image) : '' }}" class="w-full h-auto rounded border">
                </div>
                <label for="file-input"
                    class="flex flex-col justify-center items-center bg-gray-50 border border-dashed border-gray-400 rounded-lg h-full cursor-pointer hover:bg-gray-100 transition"
                    id="upload-label" {{ $product->image ? 'style=display:none;' : '' }}>
                    <i id="icon-upload"
                        class="fas fa-plus text-4xl w-24 h-24 flex items-center justify-center text-gray-400 border border-dashed border-gray-400 rounded"></i>
                    <span id="drop-instruction" class="text-gray-500 text-center text-lg">Seret dan lepas gambar di sini
                        atau klik untuk memilih file</span>
                </label>
                <input type="file" id="file-input" name="image" accept="image/*"
                    class="hidden @error('image') is-invalid @enderror">
                <div id="file-name" class="mt-2 text-gray-600 text-center hidden"></div>
                <!-- Tombol Reset Gambar -->
                <button id="reset-button"
                    class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition {{ $product->image ? '' : 'hidden' }}">
                    <i class="fas fa-times text-xl text-white"></i>
                </button>
                @error('image')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Form Section untuk detail lainnya -->
            <div class="flex-1 bg-white shadow-lg rounded-lg p-6">
                <!-- Nama Produk -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                        required>
                    @error('name')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi Produk -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Produk</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror"
                        required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Harga Produk -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Harga Produk</label>
                    <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('price') border-red-500 @enderror"
                        required>
                    @error('price')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Stok Produk -->
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-semibold text-gray-700 mb-1">Stok Produk</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('stock') border-red-500 @enderror"
                        required>
                    @error('stock')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kategori Produk -->
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                    <select id="category_id" name="category_id"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('category_id') border-red-500 @enderror"
                        required>
                        <option value="" disabled>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-between mt-4">
                    <button type="submit" title="Simpan"
                        class="w-[64px] bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition w-24">
                        <i class="fas fa-save"></i>
                    </button>
                    <button type="reset" title="Reset"
                        class="w-[64px] bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition w-24">
                        <i class="fas fa-undo"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
