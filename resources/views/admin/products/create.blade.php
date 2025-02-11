@extends('layouts.admin')

@section('title')
    Add Product | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4 max-w-screen max-h-screen overflow-y-auto">
        <div class="min-w-full relative">
            <a href="{{ route('products.index') }}" title="Kembali ke Daftar Produk"
                class="text-black-700 group rounded-lg absolute top-2">
                <i class="fas fa-arrow-left text-xl group-hover:opacity-60"></i>
            </a>
            <h1 class="text-3xl font-bold mb-6 text-center">Tambah Produk Baru</h1>
        </div>
        <form id="product-form" class="flex flex-wrap gap-4" action="{{ route('products.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <!-- Form Section untuk detail lainnya -->
            <div class="flex-1 flex flex-col gap-6 bg-white shadow-lg rounded-lg p-6">
                <!-- Gambar Produk dengan Dropzone -->
                <div id="div-upload" class="flex-1 bg-white">
                    <div class="flex justify-center mb-4 hidden" id="preview-container">
                        <img id="image-preview" class="w-auto h-[200px] rounded border">
                    </div>
                    <label for="file-input"
                        class="flex flex-col justify-center items-center p-4 bg-gray-50 border border-dashed border-gray-400 rounded-lg h-full cursor-pointer hover:bg-gray-100 transition"
                        id="upload-label">
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
                        class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded-full hover:bg-yellow-600 transition hidden">
                        <i class="fas fa-times text-xl text-white"></i>
                    </button>
                    @error('image')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Produk -->
                <div class="flex items-center gap-8">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1 w-[10%]">Nama Produk</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="flex-grow px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                        required>
                    @error('name')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi Produk -->
                <div class="flex items-center gap-8">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1 w-[10%]">Deskripsi Produk</label>
                    <textarea id="description" name="description" rows="4"
                        class="flex-grow px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror"
                        required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Harga Produk -->
                <div class="flex items-center gap-8">
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-1 w-[10%]">Harga
                        Produk</label>
                    <input type="number" step="1000" min="0" id="price" name="price"
                        value="{{ old('price') }}"
                        class="flex-grow px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('price') border-red-500 @enderror"
                        required>
                    @error('price')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Stok Produk -->
                <div class="flex items-center gap-8">
                    <label for="stock" class="block text-sm font-semibold text-gray-700 mb-1 w-[10%]">Stok Produk</label>
                    <input type="number" id="stock" min="0" name="stock" value="{{ old('stock') }}"
                        class="flex-grow px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('stock') border-red-500 @enderror"
                        required>
                    @error('stock')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kategori Produk -->
                <div class="flex items-center gap-8">
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1 w-[10%]">Kategori</label>
                    <select id="category_id" name="category_id"
                        class="flex-grow px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('category_id') border-red-500 @enderror"
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
                <div class="flex justify-between">
                    <button type="reset" title="Reset"
                        class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-600 transition ease-in-out duration-300">
                        <i class="fas fa-undo mr-3"></i>Reset
                    </button>
                    <button type="submit" title="Simpan"
                        class="bg-x-purple text-white px-6 py-2 rounded-full hover:bg-purple-500 transition ease-in-out duration-300">
                        <i class="fas fa-save mr-3"></i>Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropArea = document.getElementById('upload-label');
            const fileInput = document.getElementById('file-input');
            const imagePreview = document.getElementById('image-preview');
            const previewContainer = document.getElementById('preview-container');
            const fileName = document.getElementById('file-name');
            const divUpload = document.getElementById('div-upload');
            const dropInstruction = document.getElementById('drop-instruction');
            const iconUpload = document.getElementById('icon-upload');
            const resetButton = document.getElementById('reset-button');

            // Prevent default behaviors for drag and drop
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            // Highlight drop area when item is dragged over it
            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, () => {
                    dropArea.classList.add('bg-gray-100', 'border-blue-500', 'border-2');
                    dropInstruction.textContent = 'Lepaskan file';
                    dropInstruction.classList.add('text-blue-500');
                    iconUpload.classList.add('bg-gray-100', 'text-blue-500', 'border-blue-500',
                        'border-2');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, () => {
                    dropArea.classList.remove('bg-gray-100', 'border-blue-500', 'border-2');
                    dropInstruction.textContent =
                        'Seret dan lepas gambar di sini atau klik untuk memilih file';
                    dropInstruction.classList.remove('text-blue-500');
                    iconUpload.classList.remove('bg-gray-100', 'text-blue-500', 'border-blue-500',
                        'border-2');
                }, false);
            });

            // Handle dropped files
            dropArea.addEventListener('drop', (e) => {
                let dt = e.dataTransfer;
                let files = dt.files;

                if (files.length > 0) {
                    fileInput.files = files;
                    previewImage(files[0]);
                }
            });

            // Handle file input change
            fileInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    previewImage(file);
                }
            });

            // Function to preview image
            function previewImage(file) {
                if (file && file.type.startsWith('image/')) {
                    const imageURL = URL.createObjectURL(file);
                    imagePreview.src = imageURL;
                    previewContainer.classList.remove('hidden');
                    dropArea.classList.add('hidden');
                    fileName.textContent = file.name;
                    fileName.classList.remove('hidden');
                    resetButton.classList.remove('hidden');
                    divUpload.classList.add('flex', 'flex-col', 'justify-center', 'items-center');
                } else {
                    alert('Tolong pilih file gambar yang valid.');
                }
            }

            // Handle reset button click
            resetButton.addEventListener('click', () => {
                fileInput.value = '';
                imagePreview.src = '';
                previewContainer.classList.add('hidden');
                dropArea.classList.remove('hidden');
                fileName.textContent = '';
                fileName.classList.add('hidden');
                dropInstruction.textContent = 'Seret dan lepas gambar di sini atau klik untuk memilih file';
                resetButton.classList.add('hidden');
                divUpload.classList.remove('flex', 'flex-col', 'justify-center', 'items-center');
            });
        });
    </script>
@endsection
