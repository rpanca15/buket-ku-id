@extends('layouts.admin')

@section('title')
    Dashboard | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto bg-x-grey px-6 py-4 flex flex-col h-screen">
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
                    <p class="text-[28px] text-[#2B3674] font-semibold">100</p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="text-lg text-[#7B7F83] text-sm">Pesanan Diproses</h3>
                    <p class="text-[28px] text-[#2B3674] font-semibold">75</p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="text-lg text-[#7B7F83] text-sm">Pesanan Selesai</h3>
                    <p class="text-[28px] text-[#2B3674] font-semibold">25</p>
                </div>
            </div>
        </div>

        <!-- Tabel Recent Orders -->
        <div class="mt-8 p-4 bg-white shadow rounded-lg max-h-[calc(100vh-300px)]">
            <h2 class="text-2xl text-[#2B3674] font-bold">Recent Orders</h2>
            <div class="max-h-[calc(100vh-300px)] overflow-auto">
                <table class="min-w-full mt-4 bg-white">
                    <thead>
                        <tr class="border-y-2">
                            <th class="p-4 text-left">Order ID</th>
                            <th class="p-4 text-left">Customer</th>
                            <th class="p-4 text-left">Total</th>
                            <th class="p-4 text-left">Status Pesanan</th>
                            <th class="p-4 text-left">Action</th>
                        </tr>
                    </thead>
                    <div class="max-h-[calc(100vh-300px)] overflow-auto">
                        <tbody>
                            <tr>
                                <td class="text-[#2B3674] p-4 font-semibold">1</td>
                                <td class="text-[#2B3674] p-4 font-semibold">User 1</td>
                                <td class="text-[#2B3674] p-4 font-semibold">Rp. 100.000</td>
                                <td class="text-[#2B3674] p-4 font-semibold">Pending</td>
                                <td class="p-4">
                                    <a href="#"
                                        class="text-[#2B3674] font-semibold hover:underline hover:text-blue-600">Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-[#2B3674] p-4 font-semibold">1</td>
                                <td class="text-[#2B3674] p-4 font-semibold">User 1</td>
                                <td class="text-[#2B3674] p-4 font-semibold">Rp. 100.000</td>
                                <td class="text-[#2B3674] p-4 font-semibold">Pending</td>
                                <td class="p-4">
                                    <a href="#"
                                        class="text-[#2B3674] font-semibold hover:underline hover:text-blue-600">Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-[#2B3674] p-4 font-semibold">1</td>
                                <td class="text-[#2B3674] p-4 font-semibold">User 1</td>
                                <td class="text-[#2B3674] p-4 font-semibold">Rp. 100.000</td>
                                <td class="text-[#2B3674] p-4 font-semibold">Pending</td>
                                <td class="p-4">
                                    <a href="#"
                                        class="text-[#2B3674] font-semibold hover:underline hover:text-blue-600">Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-[#2B3674] p-4 font-semibold">1</td>
                                <td class="text-[#2B3674] p-4 font-semibold">User 1</td>
                                <td class="text-[#2B3674] p-4 font-semibold">Rp. 100.000</td>
                                <td class="text-[#2B3674] p-4 font-semibold">Pending</td>
                                <td class="p-4">
                                    <a href="#"
                                        class="text-[#2B3674] font-semibold hover:underline hover:text-blue-600">Detail</a>
                                </td>
                            </tr>
                            <!-- Add more rows here -->
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
@endsection
