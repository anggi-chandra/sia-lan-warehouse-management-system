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
        Schema::table('productions', function (Blueprint $table) {
            // Drop old columns if they exist
            if (Schema::hasColumn('productions', 'product_id')) {
                $table->dropForeign(['product_id']);
                $table->dropColumn('product_id');
            }
            if (Schema::hasColumn('productions', 'production_code')) {
                $table->dropColumn('production_code');
            }
        });

        Schema::table('productions', function (Blueprint $table) {
            // Add new columns
            $table->string('kode_produksi')->unique()->after('id');
            $table->foreignId('pesanan_id')->nullable()->constrained('transactions')->onDelete('set null')->after('kode_produksi');
            $table->date('tanggal_mulai')->nullable()->after('pesanan_id');
            $table->date('tanggal_selesai')->nullable()->after('tanggal_mulai');
            $table->string('jumlah')->nullable()->after('tanggal_selesai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productions', function (Blueprint $table) {
            $table->dropForeign(['pesanan_id']);
            $table->dropColumn(['kode_produksi', 'pesanan_id', 'tanggal_mulai', 'tanggal_selesai', 'jumlah']);
            $table->string('production_code')->unique();
            $table->foreignId('product_id')->constrained('products');
        });
    }
};

