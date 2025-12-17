@extends('layouts.app')

@section('title', 'Dashboard - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Dashboard</h1>
        <p>Selamat datang di Sistem Manajemen Gudang</p>
    </div>

    <!-- STATISTICS CARDS -->
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Customer</h3>
            <div class="value">{{ $totalCustomer }}</div>
            <p>Customer Aktif</p>
        </div>
        <div class="stat-card">
            <h3>Total Gudang</h3>
            <div class="value">{{ $totalGudang }}</div>
            <p>Lokasi Gudang</p>
        </div>
        <div class="stat-card">
            <h3>Total Persediaan</h3>
            <div class="value">{{ $totalPersediaan }}</div>
            <p>Item Barang</p>
        </div>
        <div class="stat-card">
            <h3>Total Transaksi</h3>
            <div class="value">{{ $totalTransaksi }}</div>
            <p>Transaksi Bulan Ini</p>
        </div>
    </div>

    <!-- QUICK INFO -->
    <div class="info-boxes">
        <div class="info-box warning">
            <h3>Stok Menipis</h3>
            <ul>
                @forelse($stokMenipis as $item)
                    <li>{{ $item->nama_barang ?? 'N/A' }} - {{ $item->stok ?? '0' }} {{ $item->stok ? 'unit' : '' }}</li>
                @empty
                    <li>Tidak ada stok menipis</li>
                @endforelse
            </ul>
        </div>
        <div class="info-box info">
            <h3>Produksi Aktif</h3>
            <ul>
                @forelse($produksiAktif as $produksi)
                    <li>
                        {{ $produksi->kode_produksi ?? 'N/A' }} - 
                        {{ $produksi->pesanan && $produksi->pesanan->customer ? $produksi->pesanan->customer->name : 'N/A' }} 
                        ({{ $produksi->status }})
                    </li>
                @empty
                    <li>Tidak ada produksi aktif</li>
                @endforelse
            </ul>
        </div>
        <div class="info-box success">
            <h3>Pengiriman Hari Ini</h3>
            <ul>
                @forelse($pengirimanHariIni as $pengirim)
                    <li>
                        {{ $pengirim->kode_pengirim ?? 'N/A' }} - 
                        {{ $pengirim->pesanan && $pengirim->pesanan->customer ? $pengirim->pesanan->customer->name : 'N/A' }} 
                        ({{ $pengirim->status_pengiriman }})
                    </li>
                @empty
                    <li>Tidak ada pengiriman hari ini</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- RECENT TRANSACTIONS TABLE -->
    <div class="table-container">
        <div class="table-header">
            <h2>Transaksi Terbaru</h2>
            <a href="{{ route('transaksi.index') }}" class="btn-view">Lihat Semua</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Customer</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksiTerbaru as $transaction)
                <tr>
                    <td>{{ $transaction->transaction_code }}</td>
                    <td>{{ $transaction->customer->name ?? 'N/A' }}</td>
                    <td>{{ $transaction->date ? $transaction->date->format('Y-m-d') : '-' }}</td>
                    <td>Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                    <td>
                        @if($transaction->status == 'Selesai')
                            <span class="status-selesai">{{ $transaction->status }}</span>
                        @elseif($transaction->status == 'Proses')
                            <span class="status-proses">{{ $transaction->status }}</span>
                        @else
                            <span class="status-pending">{{ $transaction->status }}</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data transaksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <style>
        .status-selesai,
        .status-tersedia,
        .status-terkirim {
            background-color: #28a745;
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }
        .status-proses,
        .status-perjalanan {
            background-color: #007bff;
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }
        .status-pending {
            background-color: #ffc107;
            color: #212529;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }
    </style>
@endsection
