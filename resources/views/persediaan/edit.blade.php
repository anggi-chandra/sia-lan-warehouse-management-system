@extends('layouts.app')

@section('title', 'Edit Persediaan - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-3xl mx-auto">
         <div class="mb-10 text-center">
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Edit Persediaan</h1>
            <p class="text-primary/60 font-medium mt-1">Perbarui informasi stok barang.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-8 relative overflow-hidden">
            <form action="{{ route('persediaan.update', $persediaan->id) }}" method="POST" class="space-y-6 relative z-10">
                @csrf
                @method('PUT')
                
                <div class="space-y-4">
                     <div>
                        <label class="block text-sm font-bold text-primary mb-2">ID Persediaan</label>
                        <input type="text" name="kode_persediaan" value="{{ old('kode_persediaan', $persediaan->kode_persediaan) }}" class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm font-bold text-gray-500 cursor-not-allowed" readonly>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Lokasi Gudang</label>
                            <select name="gudang_id" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                @foreach($gudangs as $gudang)
                                    <option value="{{ $gudang->id }}" {{ old('gudang_id', $persediaan->gudang_id) == $gudang->id ? 'selected' : '' }}>{{ $gudang->name }}</option>
                                @endforeach
                            </select>
                            @error('gudang_id')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Bagian Gudang (PIC)</label>
                            <select name="bag_gudang_id" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                @foreach($bagGudangs as $bagGudang)
                                    <option value="{{ $bagGudang->id }}" {{ old('bag_gudang_id', $persediaan->bag_gudang_id) == $bagGudang->id ? 'selected' : '' }}>{{ $bagGudang->nama }}</option>
                                @endforeach
                            </select>
                             @error('bag_gudang_id')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">Nama Barang</label>
                        <input type="text" name="nama_barang" value="{{ old('nama_barang', $persediaan->nama_barang) }}" placeholder="Nama Barang" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                        @error('nama_barang')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                             <label class="block text-sm font-bold text-primary mb-2">Jumlah Stok</label>
                            <input type="number" name="stok" value="{{ old('stok', $persediaan->stok) }}" placeholder="0" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                            @error('stok')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Status Ketersediaan</label>
                             <select name="status" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                <option value="Tersedia" {{ old('status', $persediaan->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="Menipis" {{ old('status', $persediaan->status) == 'Menipis' ? 'selected' : '' }}>Menipis</option>
                                <option value="Habis" {{ old('status', $persediaan->status) == 'Habis' ? 'selected' : '' }}>Habis</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a href="{{ route('persediaan.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-100 px-6 py-3 text-sm font-bold text-gray-600 hover:bg-gray-200 transition-all">
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
