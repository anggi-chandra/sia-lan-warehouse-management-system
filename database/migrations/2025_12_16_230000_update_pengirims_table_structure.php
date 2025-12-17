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
        Schema::table('pengirims', function (Blueprint $table) {
            // Drop old columns if they exist
            if (Schema::hasColumn('pengirims', 'alamat')) {
                $table->dropColumn('alamat');
            }
            if (Schema::hasColumn('pengirims', 'kontak')) {
                $table->dropColumn('kontak');
            }
            if (Schema::hasColumn('pengirims', 'email')) {
                $table->dropColumn('email');
            }
        });

        Schema::table('pengirims', function (Blueprint $table) {
            // Add new columns
            $table->string('kode_pengirim')->unique()->after('id');
            $table->foreignId('pesanan_id')->nullable()->constrained('transactions')->onDelete('set null')->after('kode_pengirim');
            $table->string('status_pengiriman')->default('Menunggu')->after('nama_pengirim');
            $table->date('tanggal_pengiriman')->nullable()->after('status_pengiriman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengirims', function (Blueprint $table) {
            $table->dropForeign(['pesanan_id']);
            $table->dropColumn(['kode_pengirim', 'pesanan_id', 'status_pengiriman', 'tanggal_pengiriman']);
            $table->text('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->string('email')->nullable();
        });
    }
};

