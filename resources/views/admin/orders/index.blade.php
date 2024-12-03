@extends('layouts.admin')

@section('title')
    Orders | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4">
        <h1 class="text-3xl font-bold mb-6">Orders</h1>
        <!-- Tabel Orders -->
        <div class="bg-white shadow-lg rounded-lg p-4 min-h-[calc(100vh-100px)]">
            <div class="overflow-auto min-w-full max-h-[calc(100vh-130px)] custom-scrollbar">
                <table class="table min-w-full border-collapse">
                    <!-- Header dengan posisi sticky -->
                    <thead class="sticky top-0 bg-gray-100 z-10">
                        <tr class="text-gray-600">
                            <th scope="col" class="text-center px-4 py-3">ID</th>
                            <th scope="col" class="text-center px-4 py-3">Customer</th>
                            <th scope="col" class="text-center px-4 py-3">Jml</th>
                            <th scope="col" class="text-center px-4 py-3">Tanggal COD</th>
                            <th scope="col" class="text-center px-4 py-3">Lokasi COD</th>
                            <th scope="col" class="text-center px-4 py-3">Total Harga</th>
                            <th scope="col" class="text-center px-4 py-3">Metode Pembayaran</th> <!-- Tambahan -->
                            <th scope="col" class="text-center px-4 py-3">Payment</th>
                            <th scope="col" class="text-center px-4 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr class="group border-b hover:bg-gray-50 transition duration-200 relative">
                                <td class="px-4 py-3 text-center max-w-[100px]">{{ $order->id }}</td>
                                <td class="px-4 py-3 text-center max-w-[200px]">{{ $order->user->name ?? 'Unknown' }}</td>
                                <td class="px-4 py-3 text-center max-w-[50px]">{{ $order->product_count }}</td>
                                <td class="px-4 py-3 text-center max-w-[150px]">
                                    {{ \Carbon\Carbon::parse($order->cod_date)->format('d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-center max-w-[150px]">{{ $order->cod_location }}</td>
                                <td class="px-4 py-3 text-center max-w-[150px]">
                                    Rp{{ number_format($order->total, 2, ',', '.') }}
                                </td>

                                <!-- Kolom Metode Pembayaran -->
                                <td class="px-4 py-3 text-center max-w-[150px]">
                                    {{ $order->payment->method ?? 'Tidak Diketahui' }}
                                </td>

                                <!-- Kolom Status Pembayaran -->
                                <td class="px-4 py-3 text-center max-w-[100px]">
                                    @if ($order->payment)
                                        @if ($order->payment->status === 'pending')
                                            <span class="text-red-500">Belum dibayar</span>
                                        @else
                                            <span class="text-green-500">{{ ucfirst($order->payment->status) }}</span>
                                        @endif
                                    @else
                                        <span class="text-gray-500">Tidak Diketahui</span>
                                    @endif
                                </td>

                                <!-- Kolom Status -->
                                <td class="px-4 py-3 text-center max-w-[200px]">
                                    <div class="relative">
                                        <select class="status-dropdown w-full px-2 py-1 border rounded"
                                            data-order-id="{{ $order->id }}"
                                            data-current-status="{{ $order->status->id }}">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}"
                                                    {{ $status->id == $order->status->id ? 'selected' : '' }}>
                                                    {{ $status->status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div
                                        class="absolute top-2 left-10 hidden group-hover:flex items-center justify-center gap-4 p-2 bg-white shadow-lg rounded">
                                        <a href="{{ route('orders.show', $order->id) }}" title="Show"
                                            class="text-blue-500 hover:text-blue-600 transition">
                                            <i class="fas fa-eye"></i> Show
                                        </a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')"
                                                class="text-red-500 hover:text-red-600 transition">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        <button title="Simpan"
                                            class="hidden save-status-btn text-indigo-500 hover:text-indigo-700 rounded transition duration-200"
                                            data-order-id="{{ $order->id }}">
                                            <i class="fas fa-save"></i> Save
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center p-4 text-gray-500">Tidak ada pesanan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
