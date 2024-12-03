@extends('layouts.admin')

@section('title')
    Customers | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Users</h1>
            <a href="{{ route('users.create') }}"
                class="flex items-center bg-x-purple text-white px-4 py-2 rounded-full hover:bg-purple-500 transition ease-in-out duration-300">
                <i class="fas fa-plus text-xl mr-1"></i>&nbsp;Add
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-4 min-h-[calc(100vh-100px)]">
            <div class="overflow-auto min-w-full max-h-[calc(100vh-135px)] custom-scrollbar">
                <table class="min-w-full border-collapse table-fixed">
                    <thead class="sticky top-0 bg-gray-100 z-10">
                        <tr class="bg-gray-100 text-gray-600">
                            <th class="text-left p-4 w-[10%]">#</th>
                            <th class="text-left p-4 w-[20%]">Nama User</th>
                            <th class="text-left p-4 w-[30%]">Email</th>
                            <th class="text-left p-4 w-[25%]">No. Telp</th>
                            <th class="text-left p-4 w-[15%]">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="group border-b hover:bg-gray-50 transition duration-200 relative">
                                <td class="border-b p-4 w-[10%]">{{ $loop->iteration }}
                                    <div
                                        class="absolute top-2 left-10 hidden group-hover:flex items-center justify-center gap-4 p-2 bg-white shadow-lg rounded">
                                        <a href="{{ route('users.show', $user->id) }}" title="Show"
                                            class="text-blue-500 hover:text-blue-600 transition">
                                            <i class="fas fa-eye text-lg"></i> Show
                                        </a>
                                        <a href="{{ route('users.edit', $user->id) }}" title="Edit"
                                            class="text-yellow-500 hover:text-yellow-600 transition">
                                            <i class="fas fa-edit text-lg"></i> Edit
                                        </a>
                                        @if ($user->id !== Auth::id())
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"
                                                    class="text-red-500 hover:text-red-600 transition">
                                                    <i class="fas fa-trash text-lg"></i> Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                                <td class="border-b p-4 w-[20%]">{{ $user->name }}</td>
                                <td class="border-b p-4 w-[30%]">{{ $user->email }}</td>
                                <td class="border-b p-4 w-[25%]">{{ $user->no_telepon }}</td>
                                <td class="border-b p-4 w-[15%]">{{ $user->role }}</td>
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

@section('scripts')
@endsection
