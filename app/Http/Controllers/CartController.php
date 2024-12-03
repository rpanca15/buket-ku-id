<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CartController extends Controller
{
    /**
     * Menampilkan daftar produk di keranjang.
     */
    public function index()
    {
        // Ambil data keranjang pengguna yang sedang login
        $cart = Cart::where('user_id', Auth::id())->first();

        // Jika tidak ada keranjang, buat keranjang untuk user
        if (!$cart) {
            $cart = Cart::create(['user_id' => Auth::id()]);
            $cart = Cart::where('user_id', Auth::id())->first();
        }

        $cartItems = $cart->items;  // Menggunakan relasi 'items' pada model Cart

        // Hitung total harga untuk setiap item
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    /**
     * Menambahkan produk ke keranjang.
     */
    public function add(Request $request, $id)
    {
        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);

        // Validasi stock
        $availableStock = $product->stock;

        $cart = Auth::user()->cart;

        if (!$cart) {
            $cart = Cart::create(['user_id' => Auth::id()]);
        }

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        // Hitung total quantity yang akan ada di cart
        $totalQuantity = $quantity;
        if ($cartItem) {
            $totalQuantity += $cartItem->quantity;
        }

        // Cek apakah total quantity melebihi stock
        if ($totalQuantity > $availableStock) {
            Cache::put('error', 'Quantity melebihi stock yang tersedia. Stock tersisa: ' . $availableStock, now()->addSeconds(5));
            return redirect()->back();
        }

        // Jika validation passed, lanjutkan dengan penambahan ke cart
        if ($cartItem) {
            $cartItem->quantity = $totalQuantity;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        Cache::put('success', 'Produk berhasil ditambahkan ke keranjang.', now()->addSeconds(5));
        return redirect()->back();
    }

    /**
     * Menghapus produk dari keranjang.
     */
    public function remove($id)
    {
        // Cari keranjang pengguna yang sedang login
        $cart = Cart::where('user_id', Auth::id())->first();

        if (!$cart) {
            Cache::put('error', 'Keranjang tidak ditemukan.', now()->addSeconds(5));
            return redirect()->route('cart.index');
        }

        // Cari item di dalam keranjang berdasarkan product_id
        $cartItem = $cart->items()->where('product_id', $id)->first();

        if (!$cartItem) {
            Cache::put('error', 'Produk tidak ditemukan di keranjang.', now()->addSeconds(5));
            return redirect()->route('cart.index');
        }

        $cartItem->delete();

        Cache::put('success', 'Produk berhasil dihapus dari keranjang.', now()->addSeconds(5));
        return redirect()->route('cart.index');
    }


    /**
     * Mengupdate jumlah produk dalam keranjang.
     */
    public function update(Request $request, $productId)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cartItem = $cart->items()->where('product_id', $productId)->first();

        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Item tidak ditemukan');
        }

        $quantity = $request->input('quantity');
        if ($quantity < 1 || $quantity > $cartItem->product->stock) {
            return redirect()->route('cart.index')->with('success', 'Kuantitas tidak valid');
        }

        $cartItem->quantity = $quantity;
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Kuantitas diperbarui');
    }
}
