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

        // Jika tidak ada keranjang, kembalikan pesan atau tampilkan halaman kosong
        if (!$cart) {
            return view('cart.index', [
                'cartItems' => [],
                'totalPrice' => 0
            ]);
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

    public function checkout(Request $request)
    {
        // Validate the input fields
        $validated = $request->validate([
            'cod_location' => 'required|string',
            'payment_method' => 'required|string',
            'cod_date' => 'required|date',
            'selected_items' => 'required|array', // Validate selected items (array of product IDs)
            'selected_items.*' => 'exists:cart_items,product_id', // Ensure selected items are valid
        ]);

        // Get the user's cart
        $cart = Cart::where('user_id', Auth::id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            Cache::put('error', 'Keranjang Anda kosong', now()->addSeconds(5));
            return redirect()->route('cart.index');
        }

        // Filter the selected items based on the IDs received in the request
        $selectedItems = $cart->items->whereIn('product_id', $validated['selected_items']);

        if ($selectedItems->isEmpty()) {
            Cache::put('error', 'Tidak ada item yang dipilih untuk checkout.', now()->addSeconds(5));
            return redirect()->route('cart.index');
        }

        // Calculate the total price of the selected items
        $totalPrice = $selectedItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Create the order
        $productCount = $selectedItems->sum('quantity');
        $order = Order::create([
            'user_id' => Auth::id(),
            'cod_location' => $validated['cod_location'],
            'cod_date' => $validated['cod_date'],
            'total' => $totalPrice,
            'product_count' => $productCount,
            'status_id' => 1,
        ]);

        // Add order details and update product stock
        foreach ($selectedItems as $item) {
            $order->details()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);

            // Update the product stock
            $product = $item->product;
            $product->stock -= $item->quantity;
            $product->save();
        }

        // Create a payment record
        Payment::create([
            'order_id' => $order->id,
            'amount' => $totalPrice,
            'method' => $validated['payment_method'],
        ]);

        // Remove items from the cart
        $cart->items()->whereIn('product_id', $validated['selected_items'])->delete();

        Cache::put('success', 'Order berhasil dibuat. Silakan lanjutkan ke halaman pembayaran.', now()->addSeconds(5));
        return redirect()->route('orders.index');
    }
}
