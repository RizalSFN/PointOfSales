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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('user_shift_id')->constrained();
            $table->string('nama');
            $table->enum('tipe', ['menu', 'category', 'total', 'custom']);
            $table->boolean('is_percentage');
            $table->decimal('minimal_transaksi')->nullable();
            $table->date('berlaku_dari');
            $table->date('berlaku_sampai');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
