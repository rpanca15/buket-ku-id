<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil produk terbaru (misalnya 4 produk terbaru)
        $products = Product::with('category')
            ->latest() // Mengurutkan berdasarkan created_at terbaru
            ->take(4) // Ambil 4 produk terbaru
            ->get();

        return view('index', compact('products'));
    }

    public function search(Request $request)
    {
        // Validasi input pencarian
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        // Ambil query pencarian dari input pengguna
        $searchQuery = $request->input('search');

        // Cari produk berdasarkan nama atau deskripsi yang mengandung query pencarian
        $results = Product::with('category')
            ->where('name', 'like', '%' . $searchQuery . '%') // Mencari nama produk yang mengandung query
            ->orWhere('description', 'like', '%' . $searchQuery . '%') // Atau mencari deskripsi produk yang mengandung query
            ->get();

        // Tampilkan hasil pencarian ke tampilan
        return view('search', compact('results'));
    }

    public function home()
    {
        return view('home');
    }
}
