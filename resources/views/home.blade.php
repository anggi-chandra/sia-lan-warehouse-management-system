@extends('layouts.app')

@section('title', 'Dashboard - Sistem Manajemen Gudang')

@section('content')
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Dashboard Overview</h1>
            <p class="text-primary/60 font-medium mt-1">Selamat datang kembali, {{ Auth::user()->name }}!</p>
        </div>
        <div class="hidden md:block">
            <span class="inline-flex items-center px-4 py-2 rounded-lg bg-white border border-primary/10 text-sm font-bold text-primary shadow-sm">
                <i class="fas fa-calendar-day mr-2 text-secondary"></i> {{ date('d F Y') }}
            </span>
        </div>
    </div>

    <!-- STATISTICS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Customer -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-primary/5 hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <i class="fas fa-users text-8xl text-secondary"></i>
            </div>
            <div class="relative z-10">
                <p class="text-sm font-bold text-primary/50 uppercase tracking-wider">Total Customer</p>
                <div class="flex items-end gap-2 mt-2">
                    <h3 class="text-4xl font-extrabold text-primary">{{ $totalCustomer }}</h3>
                    <span class="mb-1 text-sm font-bold text-green-500 bg-green-50 px-2 py-0.5 rounded-full"><i class="fas fa-arrow-up mr-1"></i>Aktif</span>
                </div>
            </div>
        </div>

        <!-- Gudang -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-primary/5 hover:shadow-md transition-shadow relative overflow-hidden group">
             <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <i class="fas fa-warehouse text-8xl text-accent"></i>
            </div>
            <div class="relative z-10">
                <p class="text-sm font-bold text-primary/50 uppercase tracking-wider">Lokasi Gudang</p>
                 <div class="flex items-end gap-2 mt-2">
                    <h3 class="text-4xl font-extrabold text-primary">{{ $totalGudang }}</h3>
                </div>
            </div>
        </div>

        <!-- Persediaan -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-primary/5 hover:shadow-md transition-shadow relative overflow-hidden group">
             <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <i class="fas fa-boxes text-8xl text-blue-400"></i>
            </div>
            <div class="relative z-10">
                <p class="text-sm font-bold text-primary/50 uppercase tracking-wider">Item Barang</p>
                 <div class="flex items-end gap-2 mt-2">
                    <h3 class="text-4xl font-extrabold text-primary">{{ $totalPersediaan }}</h3>
                </div>
            </div>
        </div>

        <!-- Transaksi -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-primary/5 hover:shadow-md transition-shadow relative overflow-hidden group">
             <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                <i class="fas fa-exchange-alt text-8xl text-purple-400"></i>
            </div>
            <div class="relative z-10">
                <p class="text-sm font-bold text-primary/50 uppercase tracking-wider">Transaksi Bulan Ini</p>
                 <div class="flex items-end gap-2 mt-2">
                    <h3 class="text-4xl font-extrabold text-primary">{{ $totalTransaksi }}</h3>
                     <span class="mb-1 text-sm font-bold text-secondary bg-blue-50 px-2 py-0.5 rounded-full">New</span>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT GRID -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-10">
        
        <!-- Quick Info Column -->
        <div class="xl:col-span-1 space-y-6">
            <!-- Stok Menipis -->
            <div class="bg-white rounded-3xl shadow-sm border border-primary/5 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-red-50/50">
                    <h3 class="font-extrabold text-primary flex items-center gap-2">
                        <i class="fas fa-circle-exclamation text-red-500"></i> Stok Menipis
                    </h3>
                </div>
                <div class="p-4">
                    <ul class="space-y-3">
                        @forelse($stokMenipis as $item)
                            <li class="flex items-center justify-between p-3 rounded-xl bg-gray-50 border border-gray-100">
                                <span class="font-bold text-primary">{{ $item->nama_barang ?? 'N/A' }}</span>
                                <span class="font-bold text-red-500 bg-red-50 px-3 py-1 rounded-lg text-sm">{{ $item->stok ?? '0' }} unit</span>
                            </li>
                        @empty
                            <li class="text-center py-4 text-primary/50 font-medium">Aman! Tidak ada stok yang menipis.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Produksi Aktif -->
            <div class="bg-white rounded-3xl shadow-sm border border-primary/5 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-blue-50/50">
                    <h3 class="font-extrabold text-primary flex items-center gap-2">
                        <i class="fas fa-cog fa-spin text-secondary"></i> Produksi Aktif
                    </h3>
                </div>
                <div class="p-4">
                    <ul class="space-y-3">
                        @forelse($produksiAktif as $produksi)
                            <li class="p-3 rounded-xl bg-gray-50 border border-gray-100">
                                <div class="flex justify-between items-start mb-1">
                                    <span class="font-bold text-secondary text-sm">{{ $produksi->kode_produksi ?? 'N/A' }}</span>
                                    <span class="text-xs font-bold px-2 py-0.5 rounded-md bg-blue-100 text-blue-700">{{ $produksi->status }}</span>
                                </div>
                                <div class="text-sm font-bold text-primary">{{ $produksi->pesanan && $produksi->pesanan->customer ? $produksi->pesanan->customer->name : 'N/A' }}</div>
                            </li>
                        @empty
                             <li class="text-center py-4 text-primary/50 font-medium">Tidak ada produksi aktif saat ini.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="xl:col-span-2">
             <div class="bg-white rounded-3xl shadow-sm border border-primary/5 flex flex-col h-full">
                <div class="px-8 py-6 border-b border-gray-100 flex items-center justify-between">
                     <h3 class="font-extrabold text-xl text-primary">Transaksi Terbaru</h3>
                     <a href="{{ route('transaksi.index') }}" class="text-sm font-bold text-secondary hover:underline">Lihat Semua</a>
                </div>
                <div class="p-0 flex-1 overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-gray-100 text-xs uppercase tracking-wider text-primary/50">
                                <th class="px-8 py-4 font-bold">ID Transaksi</th>
                                <th class="px-6 py-4 font-bold">Customer</th>
                                <th class="px-6 py-4 font-bold">Tanggal</th>
                                <th class="px-6 py-4 font-bold text-right">Total</th>
                                <th class="px-8 py-4 font-bold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($transaksiTerbaru as $transaction)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-8 py-4 font-bold text-secondary">
                                    {{ $transaction->transaction_code }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-primary">
                                    {{ $transaction->customer->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-500">
                                    {{ $transaction->date ? $transaction->date->format('d M Y') : '-' }}
                                </td>
                                <td class="px-6 py-4 font-bold text-primary text-right">
                                    Rp {{ number_format($transaction->total, 0, ',', '.') }}
                                </td>
                                <td class="px-8 py-4 text-center">
                                     @if($transaction->status == 'Selesai')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-800">
                                            Selesai
                                        </span>
                                    @elseif($transaction->status == 'Proses')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                                            Proses
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800">
                                            Pending
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-10 text-gray-400 font-medium">
                                    Belum ada data transaksi terbaru
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
