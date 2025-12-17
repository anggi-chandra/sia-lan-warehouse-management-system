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
        Schema::create('persediaans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_persediaan')->unique();
            $table->foreignId('gudang_id')->constrained('gudangs')->onDelete('cascade');
            $table->foreignId('bag_gudang_id')->constrained('bag_gudangs')->onDelete('cascade');
            $table->string('nama_barang');
            $table->string('stok');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persediaans');
    }
};
