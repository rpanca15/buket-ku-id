<?php

namespace App\Http\Controllers;

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
        $cart = session()->get('cart', []);
        return view('user.cart.index', compact('cart'));
    }

    /**
     * Menambahkan produk ke keranjang.
     */
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
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
            $cart[$id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui.');
    }
}
