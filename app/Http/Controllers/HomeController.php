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

    public function home()
    {
        return view('home');
    }
}
