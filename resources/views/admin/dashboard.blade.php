@extends('layouts.admin')

@section('title')
    Dashboard | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4 flex flex-col h-screen">
        <div>
            <h1 class="text-4xl font-bold">Dashboard Admin</h1>
            <p class="mt-2 text-[#909193] text-[16px]">Selamat datang di dashboard admin! Di sini Anda bisa mengelola semua
                aspek dari pemesanan buket.</p>
        </div>

        <!-- Statistik -->
        <div class="mt-4">
            <h2 class="text-xl font-bold">Statistik Pesanan</h2>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="text-lg text-[#7B7F83] text-sm">Total Pesanan</h3>
                    <p class="text-[28px] text-[#2B3674] font-semibold">{{ $totalOrders }}</p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="text-lg text-[#7B7F83] text-sm">Pesanan Diproses</h3>
                    <p class="text-[28px] text-[#2B3674] font-semibold">{{ $processedOrders }}</p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="text-lg text-[#7B7F83] text-sm">Pesanan Selesai</h3>
                    <p class="text-[28px] text-[#2B3674] font-semibold">{{ $completedOrders }}</p>
                </div>
            </div>
        </div>

        <!-- Tabel Recent Orders -->
        <div class="mt-8 p-4 bg-white shadow rounded-lg min-h-[calc(100vh-300px)] flex flex-col gap-4">
            <h2 class="text-2xl text-[#2B3674] font-bold">Recent Orders</h2>
            <div class="overflow-hidden">
                <table class="min-w-full bg-white table-fixed">
                    <thead class="border-y-2">
                        <tr>
                            <th class="p-4 text-left w-1/5">Order ID</th>
                            <th class="p-4 text-left w-1/5">Customer</th>
                            <th class="p-4 text-left w-1/5">Total</th>
                            <th class="p-4 text-left w-1/5">Status Pesanan</th>
                            <th class="p-4 text-left w-[80px]">Action</th>
                        </tr>
                    </thead>
                </table>
                <div class="overflow-y-auto max-h-[calc(100vh-400px)]">
                    <table class="min-w-full bg-white table-fixed">
                        <tbody>
                            @foreach ($recentOrders as $order)
                                <tr>
                                    <td class="text-[#2B3674] p-4 font-semibold w-1/5">{{ $order->id }}</td>
                                    <td class="text-[#2B3674] p-4 font-semibold w-1/5">{{ $order->user->name ?? 'Unknown' }}</td>
                                    <td class="text-[#2B3674] p-4 font-semibold w-1/5">Rp. {{ number_format($order->total) }}</td>
                                    <td class="text-[#2B3674] p-4 font-semibold w-1/5">{{ $order->status->status }}</td>
                                    <td class="p-4 w-[80px]">
                                        <a href="{{ route('orders.show', $order->id) }}"
                                            class="text-[#2B3674] font-semibold hover:underline hover:text-blue-600">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
