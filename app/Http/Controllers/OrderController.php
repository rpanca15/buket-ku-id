<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'status', 'details.product')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $statuses = OrderStatus::all(); // Ambil semua status pesanan
        $products = Product::all(); // Ambil semua produk yang tersedia

        return view('admin.orders.create', compact('statuses', 'products'));
    }

    /**
     * Menyimpan pesanan baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'status_id' => 'required|exists:orders_status,id',
            'cod_date' => 'required|date',
            'cod_location' => 'required|string|max:255',
            'products' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            // Filter produk yang memiliki quantity > 0
            $selectedProducts = collect($request->products)->filter(function ($product) {
                return isset($product['quantity']) && $product['quantity'] > 0;
            });

            // Jika tidak ada produk yang dipilih, kembalikan error
            if ($selectedProducts->isEmpty()) {
                return back()->withErrors(['error' => 'Pilih setidaknya satu produk.'])->withInput();
            }

            // Buat order baru
            $order = Order::create([
                'user_id' => Auth::id(),
                'status_id' => $request->status_id,
                'cod_date' => $request->cod_date,
                'cod_location' => $request->cod_location,
                'product_count' => $selectedProducts->count(),
                'total' => 0, // Total akan diupdate nanti
            ]);

            $total = 0;

            // Buat order details untuk setiap produk yang dipilih
            foreach ($selectedProducts as $productId => $productData) {
                $product = Product::findOrFail($productId);

                // Validasi stok
                if ($product->stock < $productData['quantity']) {
                    throw new \Exception("Stok tidak mencukupi untuk produk {$product->name}");
                }

                $subtotal = $product->price * $productData['quantity'];
                $total += $subtotal;

                // Buat order detail
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $productData['quantity'],
                    'price' => $product->price,
                ]);

                // Update stok produk
                $product->update([
                    'stock' => $product->stock - $productData['quantity']
                ]);
            }

            // Update total order
            $order->update(['total' => $total]);

            DB::commit();
            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Menampilkan detail pesanan.
     */
    public function show($id)
    {
        $order = Order::with('user', 'status', 'details.product')->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Menampilkan form untuk mengedit pesanan.
     */
    public function edit($id)
    {
        $order = Order::with('details.product')->findOrFail($id);
        $statuses = OrderStatus::all();
        $products = Product::all();

        return view('admin.orders.edit', compact('order', 'statuses', 'products'));
    }

    /**
     * Mengupdate pesanan yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status_id' => 'required|exists:orders_status,id',
            'cod_date' => 'required|date',
            'cod_location' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $order = Order::findOrFail($id);

            // Update pesanan
            $order->update([
                'status_id' => $validated['status_id'],
                'cod_date' => $validated['cod_date'],
                'cod_location' => $validated['cod_location'],
            ]);

            // Hapus detail pesanan lama
            $order->details()->delete();

            $total = 0;
            // Menambahkan detail pesanan baru
            foreach ($validated['products'] as $productData) {
                $product = Product::find($productData['product_id']);
                $total += $productData['price'] * $productData['quantity'];

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productData['product_id'],
                    'quantity' => $productData['quantity'],
                    'price' => $productData['price'],
                ]);
            }

            // Update total harga pesanan
            $order->update(['total' => $total]);

            DB::commit();
            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal memperbarui pesanan.']);
        }
    }

    /**
     * Menghapus pesanan.
     */
    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal menghapus pesanan.']);
        }
    }
}
