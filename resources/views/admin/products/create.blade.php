@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-2 relative">
        <a href="{{ route('products.index') }}" title="Kembali ke Daftar Produk"
            class="text-black-700 group rounded-lg absolute top-4 left-4">
            <i class="fas fa-arrow-left text-xl group-hover:opacity-60"></i>
        </a>
        <h1 class="text-3xl font-bold mb-6 text-center">Tambah Produk Baru</h1>
        <form id="product-form" class="flex flex-wrap gap-4" action="{{ route('products.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <!-- Gambar Produk dengan Dropzone -->
            <div class="flex-1 bg-white shadow-lg rounded-lg p-6">
                <label for="product-image" class="block text-sm font-semibold text-gray-700 mb-1">Gambar Produk</label>
                <div id="image-dropzone"
                    class="dropzone h-auto border-dashed border-2 border-gray-300 rounded-lg p-4 bg-gray-50"></div>
                @error('image')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Form Section untuk detail lainnya -->
            <div class="flex-1 bg-white shadow-lg rounded-lg p-6">
                <!-- Nama Produk -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
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
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Harga Produk -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Harga Produk</label>
                    <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('price') border-red-500 @enderror"
                        required>
                    @error('price')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Stok Produk -->
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-semibold text-gray-700 mb-1">Stok Produk</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
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
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
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

@section('scripts')
    <script>
        Dropzone.autoDiscover = false;

        const imageDropzone = new Dropzone("#image-dropzone", {
            url: "{{ route('products.store') }}",
            maxFiles: 1,
            maxFilesize: 2, // Ukuran maksimum dalam MB
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('#product-form').append(`<input type="hidden" name="image" value="${response.file_path}">`);
            },
            removedfile: function(file) {
                file.previewElement.remove();
                $('input[name="image"]').remove();
            }
        });
    </script>
@endsection
