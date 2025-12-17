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
        Schema::create('bag_gudangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bag_gudang')->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('alamat');
            $table->string('no_telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bag_gudangs');
    }
};
