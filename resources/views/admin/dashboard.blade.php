@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold">Dashboard Admin</h1>
    <p class="mt-2 text-gray-600">Selamat datang di dashboard admin! Di sini Anda bisa mengelola semua aspek dari pemesanan buket.</p>

    <div class="mt-4">
        <h2 class="text-xl font-semibold">Statistik Pesanan</h2>
        <div class="grid grid-cols-3 gap-4 mt-4">
            <div class="bg-white p-4 shadow rounded">
                <h3 class="text-lg font-medium">Total Pesanan</h3>
                <p class="text-2xl">100</p>
            </div>
            <div class="bg-white p-4 shadow rounded">
                <h3 class="text-lg font-medium">Pesanan Diproses</h3>
                <p class="text-2xl">75</p>
            </div>
            <div class="bg-white p-4 shadow rounded">
                <h3 class="text-lg font-medium">Pesanan Selesai</h3>
                <p class="text-2xl">25</p>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semibold">Recent Orders</h2>
        <table class="min-w-full mt-4 bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="border-b-2 border-gray-300 p-4 text-left">#</th>
                    <th class="border-b-2 border-gray-300 p-4 text-left">User</th>
                    <th class="border-b-2 border-gray-300 p-4 text-left">Total</th>
                    <th class="border-b-2 border-gray-300 p-4 text-left">Status</th>
                    <th class="border-b-2 border-gray-300 p-4 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh data. Ganti dengan data dinamis dari database -->
                <tr>
                    <td class="border-b border-gray-300 p-4">1</td>
                    <td class="border-b border-gray-300 p-4">User 1</td>
                    <td class="border-b border-gray-300 p-4">Rp. 100.000</td>
                    <td class="border-b border-gray-300 p-4">Pending</td>
                    <td class="border-b border-gray-300 p-4"><a href="#" class="text-blue-600">Detail</a></td>
                </tr>
                <tr>
                    <td class="border-b border-gray-300 p-4">2</td>
                    <td class="border-b border-gray-300 p-4">User 2</td>
                    <td class="border-b border-gray-300 p-4">Rp. 200.000</td>
                    <td class="border-b border-gray-300 p-4">Completed</td>
                    <td class="border-b border-gray-300 p-4"><a href="#" class="text-blue-600">Detail</a></td>
                </tr>
                <!-- Tambahkan data dinamis lainnya di sini -->
            </tbody>
        </table>
    </div>
</div>
@endsection
