@extends('layouts.app')

@section('title', 'Detail Admin - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-4xl mx-auto">
         <div class="mb-10 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-extrabold text-primary tracking-tight">Detail Administrator</h1>
                <p class="text-primary/60 font-medium mt-1">Informasi lengkap akun admin.</p>
            </div>
            <a href="{{ route('bag-admin.index') }}" class="inline-flex items-center justify-center rounded-xl bg-white border border-gray-200 px-5 py-2.5 text-sm font-bold text-gray-600 hover:bg-gray-50 transition-all">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 overflow-hidden">
            <!-- Header Banner -->
            <div class="bg-gradient-to-r from-secondary to-blue-500 px-8 py-10 text-white relative overflow-hidden">
                 <div class="absolute right-0 top-0 h-full w-1/3 bg-white/10 skew-x-12 transform translate-x-12"></div>
                 <div class="relative z-10 flex items-center gap-6">
                     <div class="h-20 w-20 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-3xl font-bold shadow-lg">
                        <i class="fas fa-user-shield"></i>
                     </div>
                     <div>
                         <h2 class="text-3xl font-extrabold">{{ $bagAdmin->nama_admin }}</h2>
                         <div class="mt-2 text-blue-100 font-medium flex items-center gap-3">
                             <i class="fas fa-id-badge opacity-70"></i> {{ $bagAdmin->kode_admin }}
                              <span class="w-1.5 h-1.5 rounded-full bg-blue-300"></span>
                             @if($bagAdmin->user)
                                <span class="bg-white/20 px-2 py-0.5 rounded text-white text-sm font-bold">Akun Aktif</span>
                            @else
                                <span class="bg-white/20 px-2 py-0.5 rounded text-white text-sm font-bold">Tidak Aktif</span>
                            @endif
                         </div>
                     </div>
                 </div>
            </div>

            <!-- Details -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                     <!-- Contact Info -->
                    <div class="space-y-6">
                         <h3 class="text-lg font-extrabold text-primary border-b border-gray-100 pb-2">Kontak & Alamat</h3>
                         
                         <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Email</label>
                            <p class="text-lg font-bold text-primary flex items-start gap-3">
                                <span class="h-8 w-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-sm shrink-0 mt-1"><i class="fas fa-envelope"></i></span>
                                {{ $bagAdmin->email }}
                            </p>
                        </div>

                         <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Nomor Telepon</label>
                             <p class="text-lg font-bold text-primary flex items-start gap-3">
                                <span class="h-8 w-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center text-sm shrink-0 mt-1"><i class="fas fa-phone"></i></span>
                                {{ $bagAdmin->no_telepon }}
                            </p>
                        </div>
                        
                         <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Alamat</label>
                             <p class="text-lg font-bold text-primary flex items-start gap-3">
                                <span class="h-8 w-8 rounded-lg bg-yellow-50 text-yellow-600 flex items-center justify-center text-sm shrink-0 mt-1"><i class="fas fa-map-marker-alt"></i></span>
                                {{ $bagAdmin->alamat }}
                            </p>
                        </div>
                    </div>

                    <!-- System Info -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-extrabold text-primary border-b border-gray-100 pb-2">Informasi Sistem</h3>
                        
                         <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Tanggal Terdaftar</label>
                            <p class="font-bold text-primary">
                                {{ $bagAdmin->created_at ? $bagAdmin->created_at->format('d F Y') : '-' }}
                            </p>
                        </div>

                        <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Terakhir Diperbarui</label>
                            <p class="font-bold text-primary">
                                {{ $bagAdmin->updated_at ? $bagAdmin->updated_at->format('d F Y') : '-' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 flex items-center justify-between">
                <form action="{{ route('bag-admin.destroy', $bagAdmin->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini? Akun user juga akan dihapus.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-red-50 px-6 py-3 text-sm font-bold text-red-600 hover:bg-red-100 transition-all">
                        <i class="fas fa-trash mr-2"></i> Hapus
                    </button>
                </form>
                <a href="{{ route('bag-admin.edit', $bagAdmin->id) }}" class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-primary/30 hover:bg-primary/90 transition-all">
                    <i class="fas fa-edit mr-2"></i> Edit Data
                </a>
            </div>
        </div>
    </div>
@endsection
