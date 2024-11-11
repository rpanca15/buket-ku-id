<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders_status', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('product_count');
            $table->date('cod_date');
            $table->string('cod_location');
            $table->decimal('total', 10, 2);
            $table->foreignId('status_id')->constrained('orders_status')->default(1); // Set default pada model Order, bukan migrasi
            $table->timestamps();
        });

        Schema::create('orders_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('orders_detail');
        Schema::dropIfExists('orders_status');
    }
};
