<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController;

class OrderController extends BaseController
{
    /**
     * Tampilkan daftar pesanan user berdasarkan status.
     */
    public function index(Request $request)
    {
        // Periksa apakah user terautentikasi menggunakan Auth
        if (!$user = Auth::user()) {
            return $this->sendError('User tidak terautentikasi.', [], 401);
        }

        $completed = Order::where('user_id', $user->id)
            ->whereHas('status', fn($query) => $query->where('status', 'Selesai'))
            ->orderBy('created_at', 'desc')
            ->get();

        $processing = Order::where('user_id', $user->id)
            ->whereHas('status', fn($query) => $query->where('status', 'Sedang diproses'))
            ->orderBy('created_at', 'desc')
            ->get();

        $pending = Order::where('user_id', $user->id)
            ->whereHas('status', fn($query) => $query->where('status', 'Belum diproses'))
            ->orderBy('created_at', 'desc')
            ->get();

        $orders = [
            'completed' => $completed,
            'processing' => $processing,
            'pending' => $pending,
        ];

        return $this->sendResponse($orders, 'Daftar pesanan berhasil diambil.');
    }

    /**
     * Simpan pesanan baru dari user.
     */
    // public function store(Request $request)
    // {
    //     // Periksa apakah user terautentikasi menggunakan Auth
    //     if (!$user = Auth::user()) {
    //         return $this->sendError('User tidak terautentikasi.', [], 401);
    //     }

    //     $validated = $request->validate([
    //         'cod_location' => 'required|string',
    //         'payment_method' => 'required|string',
    //         'cod_date' => 'required|date',
    //         'selected_items' => 'required|array',
    //         'selected_items.*' => 'exists:cart_items,product_id',
    //     ]);

    //     DB::beginTransaction();

    //     try {
    //         $cart = Cart::where('user_id', $user->id)->first();

    //         if (!$cart || $cart->items->isEmpty()) {
    //             return $this->sendError('Keranjang Anda kosong.', [], 400);
    //         }

    //         $selectedItems = $cart->items->whereIn('product_id', $validated['selected_items']);

    //         if ($selectedItems->isEmpty()) {
    //             return $this->sendError('Tidak ada item yang dipilih untuk checkout.', [], 400);
    //         }

    //         $totalPrice = $selectedItems->sum(fn($item) => $item->product->price * $item->quantity);

    //         $productCount = $selectedItems->sum('quantity');
    //         $order = Order::create([
    //             'user_id' => $user->id,
    //             'cod_location' => $validated['cod_location'],
    //             'cod_date' => $validated['cod_date'],
    //             'total' => $totalPrice,
    //             'product_count' => $productCount,
    //             'status_id' => 1,
    //         ]);

    //         foreach ($selectedItems as $item) {
    //             $order->details()->create([
    //                 'product_id' => $item->product_id,
    //                 'quantity' => $item->quantity,
    //                 'price' => $item->product->price,
    //             ]);

    //             $product = $item->product;
    //             $product->decrement('stock', $item->quantity);
    //         }

    //         Payment::create([
    //             'order_id' => $order->id,
    //             'amount' => $totalPrice,
    //             'method' => $validated['payment_method'],
    //             'status' => 'pending',
    //         ]);

    //         $cart->items()->whereIn('product_id', $validated['selected_items'])->delete();

    //         DB::commit();

    //         return $this->sendResponse($order, 'Pesanan berhasil dibuat. Silakan lanjutkan ke pembayaran.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return $this->sendError('Gagal membuat pesanan.', ['error' => $e->getMessage()], 500);
    //     }
    // }
    public function store(Request $request)
    {
        // Periksa apakah user terautentikasi menggunakan Auth
        if (!$user = Auth::user()) {
            return $this->sendError('User tidak terautentikasi.', [], 401);
        }

        $validated = $request->validate([
            'cod_location' => 'required|string',
            'payment_method' => 'required|string',
            'cod_date' => 'required|date',
            'selected_items' => 'required|array',
            'selected_items.*.product_id' => 'required|exists:products,id',
            'selected_items.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            // Proses total harga berdasarkan item yang dipilih langsung dari request
            $totalPrice = 0;
            $productCount = 0;

            foreach ($validated['selected_items'] as $item) {
                $product = \App\Models\Product::find($item['product_id']);

                if (!$product || $product->stock < $item['quantity']) {
                    return $this->sendError("Stok produk {$product->name} tidak mencukupi.", [], 400);
                }

                $totalPrice += $product->price * $item['quantity'];
                $productCount += $item['quantity'];
            }

            // Buat pesanan
            $order = Order::create([
                'user_id' => $user->id,
                'cod_location' => $validated['cod_location'],
                'cod_date' => $validated['cod_date'],
                'total' => $totalPrice,
                'product_count' => $productCount,
                'status_id' => 1, // Status "Belum Diproses"
            ]);

            // Tambahkan detail pesanan dan kurangi stok produk
            foreach ($validated['selected_items'] as $item) {
                $product = \App\Models\Product::find($item['product_id']);

                $order->details()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ]);

                $product->decrement('stock', $item['quantity']);
            }

            // Buat pembayaran
            Payment::create([
                'order_id' => $order->id,
                'amount' => $totalPrice,
                'method' => $validated['payment_method'],
                'status' => 'pending',
            ]);

            DB::commit();

            return $this->sendResponse($order, 'Pesanan berhasil dibuat. Silakan lanjutkan ke pembayaran.');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('Gagal membuat pesanan.', ['error' => $e->getMessage()], 500);
        }
    }


    /**
     * Tampilkan detail pembayaran untuk pesanan tertentu.
     */
    public function showPayment(Request $request, $orderId)
    {
        // Periksa apakah user terautentikasi menggunakan Auth
        if (!$user = Auth::user()) {
            return $this->sendError('User tidak terautentikasi.', [], 401);
        }

        $order = Order::with('payment')->where('user_id', $user->id)->find($orderId);

        if (!$order) {
            return $this->sendError('Pesanan tidak ditemukan.', [], 404);
        }

        $payment = $order->payment;

        if (!$payment || $payment->status !== 'pending') {
            return $this->sendError('Pembayaran sudah diproses atau tidak tersedia.', [], 400);
        }

        return $this->sendResponse([
            'order' => $order,
            'payment' => $payment,
        ], 'Detail pembayaran berhasil diambil.');
    }

    /**
     * Proses pembayaran untuk pesanan.
     */
    public function processPayment(Request $request, $orderId)
    {
        // Periksa apakah user terautentikasi menggunakan Auth
        if (!$user = Auth::user()) {
            return $this->sendError('User tidak terautentikasi.', [], 401);
        }

        $order = Order::with('payment')->where('user_id', $user->id)->find($orderId);

        if (!$order) {
            return $this->sendError('Pesanan tidak ditemukan.', [], 404);
        }

        $payment = $order->payment;

        if (!$payment || $payment->status !== 'pending') {
            return $this->sendError('Pembayaran sudah diproses atau tidak tersedia.', [], 400);
        }

        try {
            $payment->update(['status' => 'completed']);
            $order->update(['status_id' => 2]);

            return $this->sendResponse($order, 'Pembayaran berhasil diproses.');
        } catch (\Exception $e) {
            return $this->sendError('Gagal memproses pembayaran.', ['error' => $e->getMessage()], 500);
        }
    }
}
