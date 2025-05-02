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
        Schema::create('keberadaans', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_barang', ['meja', 'bangku'])->default('bangku');
            $table->foreignId('lantai_id');
            $table->date('tgl_beli');
            $table->foreignId('token')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keberadaans');
    }
};
