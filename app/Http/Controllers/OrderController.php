<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Tampilkan halaman status pesanan.
     */
    public function index()
    {
        // Ambil pesanan berdasarkan status
        $completed = Order::where('user_id', Auth::id())
            ->whereHas('status', function ($query) {
                $query->where('status', 'Selesai');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $processing = Order::where('user_id', Auth::id())
            ->whereHas('status', function ($query) {
                $query->where('status', 'Sedang diproses');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $pending = Order::where('user_id', Auth::id())
            ->whereHas('status', function ($query) {
                $query->where('status', 'Belum diproses');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', compact('completed', 'processing', 'pending'));
    }
}
