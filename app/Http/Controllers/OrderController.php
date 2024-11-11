<?php

namespace App\Http\Controllers;

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
        $statuses = OrderStatus::all();
        $products = Product::all();
        return view('admin.orders.create', compact('statuses', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_id' => 'required|exists:orders_status,id',
            'cod_date' => 'required|date',
            'cod_location' => 'required|string|max:255',
            'products' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $selectedProducts = collect($request->products)->filter(function ($product) {
                return isset($product['quantity']) && $product['quantity'] > 0;
            });

            if ($selectedProducts->isEmpty()) {
                return back()->withErrors(['error' => 'Pilih setidaknya satu produk.'])->withInput();
            }

            $order = Order::create([
                'user_id' => Auth::id(),
                'status_id' => $request->status_id,
                'cod_date' => $request->cod_date,
                'cod_location' => $request->cod_location,
                'product_count' => $selectedProducts->count(),
                'total' => 0,
            ]);

            $total = 0;

            foreach ($selectedProducts as $productId => $productData) {
                $product = Product::findOrFail($productId);

                if ($product->stock < $productData['quantity']) {
                    throw new \Exception("Stok tidak mencukupi untuk produk {$product->name}");
                }

                $subtotal = $product->price * $productData['quantity'];
                $total += $subtotal;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $productData['quantity'],
                    'price' => $product->price,
                ]);

                $product->decrement('stock', $productData['quantity']);
            }

            $order->update(['total' => $total]);

            DB::commit();
            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function show($id)
    {
        $order = Order::with('user', 'status', 'details.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::with('details.product')->findOrFail($id);
        $statuses = OrderStatus::all();
        $products = Product::all();
        return view('admin.orders.edit', compact('order', 'statuses', 'products'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status_id' => 'required|exists:orders_status,id',
            'cod_date' => 'required|date',
            'cod_location' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            $order = Order::findOrFail($id);

            // Kembalikan stok produk lama sebelum dihapus
            foreach ($order->details as $detail) {
                $product = $detail->product;
                $product->increment('stock', $detail->quantity);
            }

            $order->details()->delete();

            $order->update([
                'status_id' => $validated['status_id'],
                'cod_date' => $validated['cod_date'],
                'cod_location' => $validated['cod_location'],
            ]);

            $total = 0;

            foreach ($validated['products'] as $productData) {
                $product = Product::findOrFail($productData['product_id']);

                if ($product->stock < $productData['quantity']) {
                    throw new \Exception("Stok tidak mencukupi untuk produk {$product->name}");
                }

                $subtotal = $product->price * $productData['quantity'];
                $total += $subtotal;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productData['product_id'],
                    'quantity' => $productData['quantity'],
                    'price' => $product->price,
                ]);

                $product->decrement('stock', $productData['quantity']);
            }

            $order->update(['total' => $total]);

            DB::commit();
            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal memperbarui pesanan.'])->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);

            foreach ($order->details as $detail) {
                $detail->product->increment('stock', $detail->quantity);
            }

            $order->delete();

            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal menghapus pesanan.']);
        }
    }
}
