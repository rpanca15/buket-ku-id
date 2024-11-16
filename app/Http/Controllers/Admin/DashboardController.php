<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order; // Model untuk tabel orders

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data statistik pesanan
        $totalOrders = Order::count();
        $processedOrders = Order::where('status_id', '2')->count();
        $completedOrders = Order::where('status_id', '3')->count();

        $recentOrders = Order::with('user', 'status')->orderBy('created_at', 'desc')->take(5)->get();

        // Mengirim data ke view dashboard
        return view('admin.dashboard', [
            'totalOrders' => $totalOrders,
            'processedOrders' => $processedOrders,
            'completedOrders' => $completedOrders,
            'recentOrders' => $recentOrders
        ]);
    }
}
