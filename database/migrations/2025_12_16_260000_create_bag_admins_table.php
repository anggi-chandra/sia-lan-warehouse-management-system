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
        Schema::create('bag_admins', function (Blueprint $table) {
            $table->id();
            $table->string('kode_admin')->unique();
            $table->string('nama_admin');
            $table->string('email')->unique();
            $table->text('alamat');
            $table->string('no_telepon');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bag_admins');
    }
};

