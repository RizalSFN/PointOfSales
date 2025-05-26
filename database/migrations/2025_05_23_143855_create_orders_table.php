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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_shift_id');
            $table->string('customer_name')->nullable();
            $table->date('tanggal');
            $table->decimal('sub_total');
            $table->decimal('sub_total_diskon');
            $table->unsignedBigInteger('metode_pembayaran_id');
            $table->decimal('tunai')->nullable();
            $table->decimal('kembalian')->nullable();
            $table->enum('status', ['pending', 'selesai', 'batal']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_shift_id')->references('id')->on('user_shifts');
            $table->foreign('metode_pembayaran_id')->references('id')->on('metode_pembayarans');
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
