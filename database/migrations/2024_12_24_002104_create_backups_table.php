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
        Schema::create('backups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['database', 'project']);
            $table->string('file_path');
            $table->bigInteger('size');
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->enum('restore_status', ['restoring', 'restored', 'restore_failed'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backups');
    }
};
