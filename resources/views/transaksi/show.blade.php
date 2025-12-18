@extends('layouts.app')

@section('title', 'Detail Transaksi - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-4xl mx-auto">
         <div class="mb-10 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-extrabold text-primary tracking-tight">Detail Transaksi</h1>
                <p class="text-primary/60 font-medium mt-1">Rincian lengkap pesanan dan pembayaran.</p>
            </div>
            <a href="{{ route('transaksi.index') }}" class="inline-flex items-center justify-center rounded-xl bg-white border border-gray-200 px-5 py-2.5 text-sm font-bold text-gray-600 hover:bg-gray-50 transition-all">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 overflow-hidden">
            <!-- Header Banner -->
            <div class="bg-gradient-to-r from-secondary to-blue-500 px-8 py-10 text-white relative overflow-hidden">
                 <div class="absolute right-0 top-0 h-full w-1/3 bg-white/10 skew-x-12 transform translate-x-12"></div>
                 <div class="relative z-10 flex items-center gap-6">
                     <div class="h-20 w-20 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-3xl font-bold shadow-lg">
                        <i class="fas fa-receipt"></i>
                     </div>
                     <div>
                         <h2 class="text-3xl font-extrabold">{{ $transaksi->transaction_code }}</h2>
                         <div class="mt-2 text-blue-100 font-medium flex items-center gap-3">
                             <span>{{ $transaksi->date ? $transaksi->date->format('d F Y') : '-' }}</span>
                              <span class="w-1.5 h-1.5 rounded-full bg-blue-300"></span>
                             @if($transaksi->status == 'Selesai')
                                <span class="bg-white/20 px-2 py-0.5 rounded text-white text-sm font-bold">Selesai</span>
                            @elseif($transaksi->status == 'Proses')
                                <span class="bg-white/20 px-2 py-0.5 rounded text-white text-sm font-bold">Proses</span>
                            @else
                                <span class="bg-white/20 px-2 py-0.5 rounded text-white text-sm font-bold">Pending</span>
                            @endif
                         </div>
                     </div>
                 </div>
            </div>

            <!-- Details -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                     <!-- Customer Info -->
                    <div class="space-y-6">
                         <h3 class="text-lg font-extrabold text-primary border-b border-gray-100 pb-2">Informasi Pelanggan</h3>
                         
                         <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Nama Customer</label>
                            <p class="text-lg font-bold text-primary flex items-start gap-3">
                                <span class="h-8 w-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-sm shrink-0 mt-1"><i class="fas fa-user"></i></span>
                                {{ $transaksi->customer->name ?? 'N/A' }}
                            </p>
                        </div>

                         <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Admin Penanggung Jawab</label>
                             <p class="text-lg font-bold text-primary flex items-start gap-3">
                                <span class="h-8 w-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center text-sm shrink-0 mt-1"><i class="fas fa-user-shield"></i></span>
                                {{ $transaksi->admin_name }}
                            </p>
                        </div>
                    </div>

                    <!-- Payment Info -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-extrabold text-primary border-b border-gray-100 pb-2">Rincian Pembayaran</h3>
                        
                        <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Total Tagihan</label>
                            <p class="text-4xl font-extrabold text-primary">
                                Rp {{ number_format($transaksi->total, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Metode Bayar</label>
                                <p class="font-bold text-gray-700">{{ $transaksi->jenis_payment ?? '-' }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Status Pelunasan</label>
                                 @if($transaksi->status_pelunasan == 'Lunas')
                                    <span class="text-green-600 font-bold">Lunas</span>
                                @elseif($transaksi->status_pelunasan == 'DP')
                                    <span class="text-yellow-600 font-bold">DP (Rp {{ number_format($transaksi->nominal_dp, 0, ',', '.') }})</span>
                                @else
                                    <span class="text-red-500 font-bold">{{ $transaksi->status_pelunasan ?? '-' }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="mt-10">
                    <h3 class="text-lg font-extrabold text-primary border-b border-gray-100 pb-2 mb-6">Detail Barang Pesanan</h3>
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Nama Barang</label>
                                <p class="font-bold text-primary text-lg">{{ $transaksi->nama_barang ?? '-' }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Jenis Pesanan</label>
                                <p class="font-bold text-gray-700">{{ $transaksi->jenis_pesanan ?? '-' }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Jumlah</label>
                                <p class="font-bold text-gray-700">{{ $transaksi->jumlah_pesanan ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 flex items-center justify-between">
                <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-50 px-6 py-3 text-sm font-bold text-red-600 hover:bg-red-100 transition-all">
                        <i class="fas fa-trash mr-2"></i> Hapus
                    </button>
                </form>
                <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-primary/30 hover:bg-primary/90 transition-all">
                    <i class="fas fa-edit mr-2"></i> Edit Data
                </a>
            </div>
        </div>
    </div>
@endsection
