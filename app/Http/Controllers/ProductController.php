<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.products.index', compact('products')); // Jika admin
        }
        return view('products.index', compact('products')); // Jika user atau guest
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255|min:5',
            'description' => 'required|string|min:10',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/product', $image->hashName());

        Product::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validasi data yang diterima
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Cek apakah ada file gambar baru yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());
            Storage::delete('public/products/'.$product->image);

            $product->update([
                'image'         => $image->hashName(),
                'name'         => $request->name,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock,
                'category_id'   => $request->category_id
            ]);
        } else {
            $product->update([
                'name'         => $request->name,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock,
                'category_id'   => $request->category_id
            ]);
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Storage::delete('public/products/'. $product->image);
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
