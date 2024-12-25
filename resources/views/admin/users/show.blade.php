@extends('layouts.admin')

@section('title')
    Detail Pengguna | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="min-w-full relative mb-6">
            <a href="{{ route('users.index') }}" title="Kembali ke Daftar Pengguna"
                class="text-black-700 group rounded-lg absolute top-2">
                <i class="fas fa-arrow-left text-xl group-hover:opacity-60"></i>
            </a>
            <h1 class="text-3xl font-bold text-center">Detail Pengguna</h1>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Informasi Pengguna</h2>
                    <div class="space-y-3">
                        <div>
                            <span class="font-medium text-gray-600">Nama:</span>
                            <p class="text-gray-900">{{ $user->name }}</p>
                        </div>
                        <div>
                            <span class="font-medium text-gray-600">Email:</span>
                            <p class="text-gray-900">{{ $user->email }}</p>
                        </div>
                        <div>
                            <span class="font-medium text-gray-600">No. Telepon:</span>
                            <p class="text-gray-900">{{ $user->no_telepon }}</p>
                        </div>
                        <div>
                            <span class="font-medium text-gray-600">Role:</span>
                            <p class="text-gray-900">
                                <span
                                    class="px-2 py-1 rounded 
                                    {{ $user->role == 'admin' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </p>
                        </div>
                        <div>
                            <span class="font-medium text-gray-600">Terdaftar Sejak:</span>
                            <p class="text-gray-900">{{ $user->created_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-semibold mb-4">Aktivitas Terakhir</h2>
                    @if ($user->orders->count() > 0)
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-medium mb-2">Riwayat Pesanan</h3>
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="p-2 text-left">ID</th>
                                        <th class="p-2 text-left">Tanggal</th>
                                        <th class="p-2 text-left">Total</th>
                                        <th class="p-2 text-left">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->orders->take(5) as $order)
                                        <tr class="border-b">
                                            <td class="p-2">{{ $order->id }}</td>
                                            <td class="p-2">{{ $order->created_at->format('d M Y') }}</td>
                                            <td class="p-2">Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                                            <td class="p-2">
                                                <span
                                                    class="px-2 py-1 rounded text-xs 
                                                    {{ $order->status->id == 1
                                                        ? 'bg-yellow-100 text-yellow-800'
                                                        : ($order->status->id == 2
                                                            ? 'bg-green-100 text-green-800'
                                                            : 'bg-blue-100 text-blue-800') }}">
                                                    {{ $order->status->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500 italic">Belum ada riwayat pesanan</p>
                    @endif
                </div>
            </div>

            <div class="flex justify-end mt-6 space-x-4">
                <a href="{{ route('users.edit', $user->id) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition">
                    <i class="fas fa-edit mr-2"></i>Edit Pengguna
                </a>
                @if ($user->id !== Auth::id())
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
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
        </div>
    </div>
@endsection
