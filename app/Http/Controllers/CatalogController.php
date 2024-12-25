<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    protected $snacks;
    protected $graduations;
    protected $artificials;

    public function __construct()
    {
        $this->snacks = Product::with('category')->where('category_id', 1)->get();
        $this->graduations = Product::with('category')->where('category_id', 2)->get();
        $this->artificials = Product::with('category')->where('category_id', 3)->get();
    }

    public function index()
    {
        return view('catalogs.index', [
            'snacks' => $this->snacks->take(7),
            'graduations' => $this->graduations->take(7),
            'artificials' => $this->artificials->take(7)
        ]);
    }

    public function artificial()
    {
        return view('catalogs.artificial', [
            'artificials' => $this->artificials
        ]);
    }

    public function graduation()
    {
        return view('catalogs.graduation', [
            'graduations' => $this->graduations
        ]);
    }

    public function snack()
    {
        return view('catalogs.snack', [
            'snacks' => $this->snacks
        ]);
    }

    public function show($categoryName, $slug)
    {
        // Menemukan kategori berdasarkan slug
        $category = Category::where('name', strtolower($categoryName))->firstOrFail();

        // Menemukan produk berdasarkan slug dan relasi dengan kategori
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        if ($product->category->id !== $category->id) {
            abort(404);
        }

        return view('catalogs.show', compact('product'));
    }
}
