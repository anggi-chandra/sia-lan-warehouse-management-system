<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Gudang;
use App\Models\Persediaan;
use App\Models\Transaction;
use App\Models\Produksi;
use App\Models\Pengirim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Statistics
        $totalCustomer = Customer::count();
        $totalGudang = Gudang::count();
        $totalPersediaan = Persediaan::count();
        
        // Total transaksi bulan ini
        $totalTransaksi = Transaction::whereYear('date', Carbon::now()->year)
            ->whereMonth('date', Carbon::now()->month)
            ->count();

        // Stok Menipis (asumsi stok < 200 adalah menipis, sesuaikan dengan kebutuhan)
        // Karena stok adalah string, kita perlu extract angka dari string
        $stokMenipis = Persediaan::all()->filter(function($item) {
            // Extract angka dari string stok (contoh: "150 unit" -> 150)
            $stokValue = preg_replace('/[^0-9]/', '', $item->stok ?? '0');
            return (int)$stokValue > 0 && (int)$stokValue < 200;
        })->take(5);

        // Produksi Aktif (status Proses)
        $produksiAktif = Produksi::where('status', 'Proses')
            ->with('pesanan.customer')
            ->limit(5)
            ->get();

        // Pengiriman Hari Ini
        $pengirimanHariIni = Pengirim::whereDate('tanggal_pengiriman', Carbon::today())
            ->with('pesanan.customer')
            ->limit(5)
            ->get();

        // Transaksi Terbaru (5 terakhir)
        $transaksiTerbaru = Transaction::with('customer')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('home', compact(
            'totalCustomer',
            'totalGudang',
            'totalPersediaan',
            'totalTransaksi',
            'stokMenipis',
            'produksiAktif',
            'pengirimanHariIni',
            'transaksiTerbaru'
        ));
    }
}

