@extends('layouts.admin')

@section('title')
    Categories | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold mr-4 w-full">Categories</h1>
            <form class="flex flex-grow w-full" action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="flex-grow mr-4">
                    <input type="text" id="name" name="name"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}" placeholder="Add category" required>
                    @error('name')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"
                    class="bg-x-green text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex items-center">
                    <i class="fas fa-save"></i>
                </button>
            </form>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-4">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border-b p-4 bg-gray-100">ID</th>
                        <th class="border-b p-4 bg-gray-100">Nama Kategori</th>
                        <th class="border-b p-4 bg-gray-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td class="border-b p-4">{{ $category->id }}</td>
                            <td class="border-b p-4">{{ $category->name }}</td>
                            <td class="border-b p-4 text-center flex items-center justify-center gap-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="bg-x-yellow text-white px-3 py-2 rounded-lg hover:bg-yellow-600 transition">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')"
                                        class="bg-x-red text-white px-3 py-2 rounded-lg hover:bg-red-600 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center p-4">Tidak ada kategori</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
