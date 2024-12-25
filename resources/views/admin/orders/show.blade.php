@extends('layouts.admin')

@section('title')
    Order Details | Buket_ku.id
@endsection

@section('content')
    <div class="container mx-auto px-6 py-4">
        <div class="min-w-full relative mb-6">
            <h1 class="text-3xl font-bold text-center">Order Details</h1>
            <a href="javascript:history.back()" title="Kembali" class="text-black-700 group rounded-lg absolute top-2">
                <i class="fas fa-arrow-left text-xl group-hover:opacity-60"></i>
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="grid md:grid-cols-2 gap-6">
                {{-- Customer Information --}}
                <div>
                    <h2 class="text-xl font-semibold mb-4 border-b pb-2">Customer Information</h2>
                    <div class="space-y-2">
                        <p><strong>Name:</strong> {{ $order->user->name }}</p>
                        <p><strong>Email:</strong> {{ $order->user->email }}</p>
                    </div>
                </div>

                {{-- Order Information --}}
                <div>
                    <h2 class="text-xl font-semibold mb-4 border-b pb-2">Order Details</h2>
                    <div class="space-y-2">
                        <p><strong>Order ID:</strong> {{ $order->id }}</p>
                        <p><strong>Status:</strong>
                            <span
                                class="badge 
                                @switch($order->status->status)
                                    @case('Pending') bg-yellow-100 text-yellow-800 @break
                                    @case('Processing') bg-blue-100 text-blue-800 @break
                                    @case('Completed') bg-green-100 text-green-800 @break
                                    @case('Cancelled') bg-red-100 text-red-800 @break
                                    @default bg-gray-100 text-gray-800
                                @endswitch
                            ">{{ $order->status->status }}</span>
                        </p>
                        <p><strong>COD Date:</strong> {{ \Carbon\Carbon::parse($order->cod_date)->format('d M Y') }}</p>
                        <p><strong>COD Location:</strong> {{ $order->cod_location }}</p>
                    </div>
                </div>
            </div>

            {{-- Payment Status --}}
            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-4 border-b pb-2">Payment Status</h2>
                <div class="space-y-2">
                    <p><strong>Status Pembayaran:</strong>
                        <span
                            class="badge 
                            @switch($order->payment->status)
                                @case('pending') bg-yellow-100 text-yellow-800 @break
                                @case('completed') bg-green-100 text-green-800 @break
                                @default bg-gray-100 text-gray-800
                            @endswitch
                        ">{{ $order->payment->status }}</span>
                    </p>
                    @if ($order->payment->status === 'completed')
                        <p><strong>Tanggal Pembayaran:</strong>
                            {{ \Carbon\Carbon::parse($order->payment->updated_at)->format('d M Y') }}
                        </p>
                    @endif
                    <p><strong>Metode Pembayaran:</strong>
                        {{ $order->payment->method }}
                    </p>
                </div>
            </div>

            {{-- Order Items --}}
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4 border-b pb-2">Order Items</h2>
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="text-left p-3">Product</th>
                            <th class="text-center p-3">Quantity</th>
                            <th class="text-right p-3">Price</th>
                            <th class="text-right p-3">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->details as $detail)
                            <tr class="border-b">
                                <td class="p-3">
                                    {{ $detail->product->name }}
                                    @if ($detail->notes)
                                        <small class="block text-gray-500">Notes: {{ $detail->notes }}</small>
                                    @endif
                                </td>
                                <td class="text-center p-3">{{ $detail->quantity }}</td>
                                <td class="text-right p-3">Rp{{ number_format($detail->price, 2, ',', '.') }}</td>
                                <td class="text-right p-3">
                                    Rp{{ number_format($detail->quantity * $detail->price, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="font-bold">
                            <td colspan="3" class="text-right p-3">Total</td>
                            <td class="text-right p-3">Rp{{ number_format($order->total, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
