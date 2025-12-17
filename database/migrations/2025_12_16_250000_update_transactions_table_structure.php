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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('jenis_pesanan')->nullable()->after('admin_name');
            $table->string('jenis_payment')->nullable()->after('jenis_pesanan');
            $table->decimal('nominal_dp', 15, 2)->nullable()->after('jenis_payment');
            $table->string('status_pelunasan')->nullable()->after('nominal_dp');
            $table->string('jumlah_pesanan')->nullable()->after('status_pelunasan');
            $table->string('nama_barang')->nullable()->after('jumlah_pesanan');
            $table->decimal('harga_pesanan', 15, 2)->nullable()->after('nama_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn([
                'jenis_pesanan',
                'jenis_payment',
                'nominal_dp',
                'status_pelunasan',
                'jumlah_pesanan',
                'nama_barang',
                'harga_pesanan'
            ]);
        });
    }
};

