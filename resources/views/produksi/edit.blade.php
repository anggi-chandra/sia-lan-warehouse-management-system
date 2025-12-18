@extends('layouts.app')

@section('title', 'Edit Produksi - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-3xl mx-auto">
         <div class="mb-10 text-center">
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Edit Produksi</h1>
            <p class="text-primary/60 font-medium mt-1">Perbarui status atau detail produksi.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-8 relative overflow-hidden">
            <form action="{{ route('produksi.update', $produksi->id) }}" method="POST" class="space-y-6 relative z-10">
                @csrf
                @method('PUT')
                
                <div class="space-y-4">
                     <div>
                        <label class="block text-sm font-bold text-primary mb-2">ID Produksi</label>
                        <input type="text" name="kode_produksi" value="{{ old('kode_produksi', $produksi->kode_produksi) }}" class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm font-bold text-gray-500 cursor-not-allowed" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">Pilih Pesanan</label>
                        <select name="pesanan_id" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                             @foreach($pesanans as $pesanan)
                                <option value="{{ $pesanan->id }}" {{ old('pesanan_id', $produksi->pesanan_id) == $pesanan->id ? 'selected' : '' }}>
                                    {{ $pesanan->transaction_code }} - {{ $pesanan->customer->name ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                         @error('pesanan_id')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $produksi->tanggal_mulai ? $produksi->tanggal_mulai->format('Y-m-d') : '') }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                             @error('tanggal_mulai')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                         <div>
                            <label class="block text-sm font-bold text-primary mb-2">Target Selesai</label>
                            <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $produksi->tanggal_selesai ? $produksi->tanggal_selesai->format('Y-m-d') : '') }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                            @error('tanggal_selesai')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                         <div>
                            <label class="block text-sm font-bold text-primary mb-2">Jumlah Produksi</label>
                            <input type="number" name="jumlah" value="{{ old('jumlah', $produksi->jumlah) }}" placeholder="Contoh: 500" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                            @error('jumlah')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Status Produksi</label>
                             <select name="status" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                <option value="Pending" {{ old('status', $produksi->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Proses" {{ old('status', $produksi->status) == 'Proses' ? 'selected' : '' }}>Proses</option>
                                <option value="Selesai" {{ old('status', $produksi->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                             @error('status')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a href="{{ route('produksi.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-100 px-6 py-3 text-sm font-bold text-gray-600 hover:bg-gray-200 transition-all">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-primary/30 hover:bg-primary/90 transition-all">
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
