<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Menampilkan daftar produk di keranjang.
     */
    public function index()
    {
        // Ambil data keranjang pengguna yang sedang login
        $cartItems = Cart::where('user_id', Auth::id())->get();

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
        $product = Product::findOrFail($id);

        // Ambil kuantitas dari request dan validasi (jika ada)
        $quantity = $request->input('quantity', 1); // default ke 1 jika tidak ada input

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Jika produk sudah ada di keranjang, tambahkan kuantitas
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Jika produk belum ada, tambahkan dengan kuantitas
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    /**
     * Menghapus produk dari keranjang.
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    /**
     * Mengupdate jumlah produk dalam keranjang.
     */
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Validasi kuantitas
            $quantity = $request->input('quantity', 1);
            $product = Product::find($id);

            if ($quantity <= 0) {
                return redirect()->route('cart.index')->with('error', 'Kuantitas harus lebih besar dari 0.');
            }

            if ($quantity > $product->stock) {
                return redirect()->route('cart.index')->with('error', 'Stok tidak cukup.');
            }

            $cart[$id]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui.');
    }
}
