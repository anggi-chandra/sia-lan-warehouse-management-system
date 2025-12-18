@extends('layouts.app')

@section('title', 'Detail Persediaan - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-4xl mx-auto">
         <div class="mb-10 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-extrabold text-primary tracking-tight">Detail Persediaan</h1>
                <p class="text-primary/60 font-medium mt-1">Informasi lengkap stok barang.</p>
            </div>
            <a href="{{ route('persediaan.index') }}" class="inline-flex items-center justify-center rounded-xl bg-white border border-gray-200 px-5 py-2.5 text-sm font-bold text-gray-600 hover:bg-gray-50 transition-all">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 overflow-hidden">
            <!-- Header Banner -->
            <div class="bg-gradient-to-r from-secondary to-blue-500 px-8 py-10 text-white relative overflow-hidden">
                 <div class="absolute right-0 top-0 h-full w-1/3 bg-white/10 skew-x-12 transform translate-x-12"></div>
                 <div class="relative z-10 flex items-center gap-6">
                     <div class="h-20 w-20 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-3xl font-bold shadow-lg">
                        <i class="fas fa-box-open"></i>
                     </div>
                     <div>
                         <h2 class="text-3xl font-extrabold">{{ $persediaan->nama_barang }}</h2>
                         <p class="text-blue-100 font-medium mt-1 flex items-center gap-2">
                             <i class="fas fa-barcode opacity-70"></i> {{ $persediaan->kode_persediaan }}
                         </p>
                     </div>
                 </div>
            </div>

            <!-- Details -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Stock Info -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-extrabold text-primary border-b border-gray-100 pb-2">Status & Stok</h3>
                        
                        <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Jumlah Stok</label>
                            <p class="text-4xl font-extrabold text-primary">
                                {{ $persediaan->stok }} <span class="text-lg text-gray-400 font-medium">Unit</span>
                            </p>
                        </div>

                         <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Status Ketersediaan</label>
                             @if($persediaan->status == 'Tersedia')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i> Tersedia
                                </span>
                            @elseif($persediaan->status == 'Menipis')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-exclamation-triangle mr-1"></i> Menipis
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-red-100 text-red-800">
                                     <i class="fas fa-times-circle mr-1"></i> Habis
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Location Info -->
                    <div class="space-y-6">
                         <h3 class="text-lg font-extrabold text-primary border-b border-gray-100 pb-2">Lokasi & Penanggung Jawab</h3>
                         
                         <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Gudang</label>
                            <p class="text-lg font-bold text-primary flex items-start gap-3">
                                <span class="h-8 w-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-sm shrink-0 mt-1"><i class="fas fa-warehouse"></i></span>
                                {{ $persediaan->gudang->name ?? 'N/A' }}
                            </p>
                        </div>
                        
                        <div>
                             <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">PIC / Bagian Gudang</label>
                            <p class="text-lg font-bold text-primary flex items-start gap-3">
                                <span class="h-8 w-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center text-sm shrink-0 mt-1"><i class="fas fa-user-shield"></i></span>
                                {{ $persediaan->bagGudang->nama ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 flex items-center justify-between">
                <form action="{{ route('persediaan.destroy', $persediaan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-50 px-6 py-3 text-sm font-bold text-red-600 hover:bg-red-100 transition-all">
                        <i class="fas fa-trash mr-2"></i> Hapus
                    </button>
                </form>
                <a href="{{ route('persediaan.edit', $persediaan->id) }}" class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-primary/30 hover:bg-primary/90 transition-all">
                    <i class="fas fa-edit mr-2"></i> Edit Data
                </a>
            </div>
        </div>
    </div>
@endsection
