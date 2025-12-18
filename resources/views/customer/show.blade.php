@extends('layouts.app')

@section('title', 'Detail Customer - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-10 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-extrabold text-primary tracking-tight">Detail Customer</h1>
                <p class="text-primary/60 font-medium mt-1">Informasi lengkap tentang pelanggan.</p>
            </div>
            <a href="{{ route('customer.index') }}" class="inline-flex items-center justify-center rounded-xl bg-white border border-gray-200 px-5 py-2.5 text-sm font-bold text-gray-600 hover:bg-gray-50 transition-all">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 overflow-hidden">
            <!-- Header Banner -->
            <div class="bg-gradient-to-r from-secondary to-blue-500 px-8 py-10 text-white relative overflow-hidden">
                 <div class="absolute right-0 top-0 h-full w-1/3 bg-white/10 skew-x-12 transform translate-x-12"></div>
                 <div class="relative z-10 flex items-center gap-6">
                     <div class="h-20 w-20 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-3xl font-bold shadow-lg">
                         {{ substr($customer->name, 0, 1) }}
                     </div>
                     <div>
                         <h2 class="text-3xl font-extrabold">{{ $customer->name }}</h2>
                         <p class="text-blue-100 font-medium mt-1 flex items-center gap-2">
                             <i class="fas fa-barcode opacity-70"></i> {{ $customer->customer_code }}
                         </p>
                     </div>
                 </div>
            </div>

            <!-- Details -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-extrabold text-primary border-b border-gray-100 pb-2">Kontak & Lokasi</h3>
                        
                        <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Nomor Telepon</label>
                            <p class="text-lg font-bold text-primary flex items-center gap-3">
                                <span class="h-8 w-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center text-sm"><i class="fas fa-phone"></i></span>
                                {{ $customer->phone }}
                            </p>
                        </div>

                        <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Alamat</label>
                            <p class="text-lg font-bold text-primary flex items-start gap-3">
                                <span class="h-8 w-8 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center text-sm shrink-0 mt-1"><i class="fas fa-map-marker-alt"></i></span>
                                {{ $customer->address }}
                            </p>
                        </div>
                    </div>

                    <!-- System Info -->
                    <div class="space-y-6">
                         <h3 class="text-lg font-extrabold text-primary border-b border-gray-100 pb-2">Informasi Sistem</h3>
                         
                         <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Status Pelanggan</label>
                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-green-500"></span>
                                <span class="font-bold text-primary">Aktif</span>
                            </div>
                        </div>

                         <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Terdaftar Sejak</label>
                            <p class="font-bold text-primary">
                                {{ $customer->created_at ? $customer->created_at->format('d F Y') : '-' }}
                            </p>
                        </div>
                        
                        <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Terakhir Diperbarui</label>
                            <p class="font-bold text-primary">
                                {{ $customer->updated_at ? $customer->updated_at->format('d F Y H:i') : '-' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 flex items-center justify-between">
                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-50 px-6 py-3 text-sm font-bold text-red-600 hover:bg-red-100 transition-all">
                        <i class="fas fa-trash mr-2"></i> Hapus
                    </button>
                </form>
                <a href="{{ route('customer.edit', $customer->id) }}" class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-primary/30 hover:bg-primary/90 transition-all">
                    <i class="fas fa-edit mr-2"></i> Edit Data
                </a>
            </div>
        </div>
    </div>
@endsection
