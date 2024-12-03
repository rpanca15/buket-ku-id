<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
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
            'status' => 'pending',
            'paid_at' => now(),
        ]);

        // Remove items from the cart
        $cart->items()->whereIn('product_id', $validated['selected_items'])->delete();

        Cache::put('success', 'Order berhasil dibuat. Silakan lanjutkan ke halaman pembayaran.', now()->addSeconds(5));
        return redirect()->route('order.index');
    }

    /**
     * Tampilkan halaman pembayaran untuk order.
     */
    public function showPayment($orderId)
    {
        $order = Order::findOrFail($orderId);
        $payment = Payment::where('order_id', $orderId)->first();

        // Pastikan hanya pembayaran dengan status pending yang dapat dibayar
        if ($payment->status !== 'pending') {
            Cache::put('error', 'Pembayaran sudah diproses atau gagal.', now()->addSeconds(5));
            return redirect()->route('order.index');
        }

        return view('orders.payment', compact('order', 'payment'));
    }

    /**
     * Proses pembayaran untuk order.
     */
    public function processPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $payment = Payment::where('order_id', $orderId)->first();

        // Pastikan pembayaran belum diproses
        if ($payment->status !== 'pending') {
            Cache::put('error', 'Pembayaran sudah diproses atau gagal.', now()->addSeconds(5));
            return redirect()->route('order.index');
        }

        // Update status pembayaran
        $payment->status = 'completed';
        $payment->save();

        $order->update(['status_id' => 2]);

        // Menyimpan informasi sukses
        Cache::put('success', 'Pembayaran berhasil diproses.', now()->addSeconds(5));

        return redirect()->route('order.index');
    }
}
