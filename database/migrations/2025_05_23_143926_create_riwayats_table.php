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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_shift_id');
            $table->enum('aksi', ['CREATE', 'UPDATE', 'DELETE']);
            $table->enum('entity', ['user', 'menu', 'discount', 'finance', 'order', 'setting']);
            $table->unsignedBigInteger('entity_id');
            $table->string('deskripsi');
            $table->timestamp('created_at');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_shift_id')->references('id')->on('user_shifts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
