<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('product_count'); // Jumlah produk dalam pesanan
            $table->date('cod_date'); // Tanggal COD
            $table->string('cod_location'); // Lokasi COD
            $table->decimal('total', 10, 2); // Total harga
            $table->foreignId('status_id')->constrained('orders_status')->default(1); // Status pesanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
