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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->text('deskripsi');
            $table->enum('status', ['pending', 'diproses', 'ditolak', 'selesai']);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('kategori_id')->references('id')->on('kategori_pengaduan');
            $table->decimal('longtitude');
            $table->decimal('latitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
