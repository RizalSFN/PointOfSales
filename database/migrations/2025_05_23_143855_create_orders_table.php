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
            $table->foreignId('user_id')->constrained();
            $table->foreignId('user_shift_id')->constrained();
            $table->string('customer_name')->nullable();
            $table->dateTime('waktu');
            $table->decimal('sub_total');
            $table->decimal('sub_total_diskon')->nullable();
            $table->decimal('total')->nullable();
            $table->foreignId('metode_pembayaran_id')->constrained();
            $table->enum('jenis', ['dine in', 'take away']);
            $table->decimal('tunai')->nullable();
            $table->decimal('kembalian')->nullable();
            $table->enum('status', ['pending', 'selesai', 'batal']);
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
