<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Menampilkan form checkout.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('user.checkout.index', compact('cart', 'total'));
    }

    /**
     * Memproses pesanan saat checkout.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cod_date' => 'required|date',
            'cod_location' => 'required|string|max:255',
        ]);

        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        DB::beginTransaction();
        try {
            // Buat pesanan baru
            $order = Order::create([
                'user_id' => Auth::id(),
                'status_id' => OrderStatus::where('name', 'Pending')->first()->id,
                'cod_date' => $request->cod_date,
                'cod_location' => $request->cod_location,
                'total' => $total,
            ]);

            // Tambahkan detail pesanan
            foreach ($cart as $productId => $productData) {
                $product = Product::findOrFail($productId);

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $productData['quantity'],
                    'price' => $productData['price'],
                ]);

                // Update stok produk
                $product->decrement('stock', $productData['quantity']);
            }

            // Hapus keranjang setelah pemesanan
            session()->forget('cart');

            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diproses.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memproses pesanan.']);
        }
    }
}
