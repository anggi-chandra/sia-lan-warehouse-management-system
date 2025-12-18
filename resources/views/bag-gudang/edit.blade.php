@extends('layouts.app')

@section('title', 'Edit Bagian Gudang - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Edit Personel Gudang</h1>
            <p class="text-primary/60 font-medium mt-1">Perbarui data staf gudang.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-8 relative overflow-hidden">
            <form action="{{ route('bag-gudang.update', $bagGudang->id) }}" method="POST" class="space-y-6 relative z-10">
                @csrf
                @method('PUT')
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">ID Personel</label>
                        <input type="text" name="kode_bag_gudang" value="{{ old('kode_bag_gudang', $bagGudang->kode_bag_gudang) }}" class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm font-bold text-gray-500 cursor-not-allowed" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $bagGudang->nama) }}" placeholder="Nama Staf" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                        @error('nama')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                     <div>
                        <label class="block text-sm font-bold text-primary mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $bagGudang->email) }}" placeholder="staf@gudang.com" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                        @error('email')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">Nomor Telepon</label>
                        <input type="text" name="no_telepon" value="{{ old('no_telepon', $bagGudang->no_telepon) }}" placeholder="081234567890" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                        @error('no_telepon')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" placeholder="Alamat domisili" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>{{ old('alamat', $bagGudang->alamat) }}</textarea>
                        @error('alamat')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a href="{{ route('bag-gudang.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-100 px-6 py-3 text-sm font-bold text-gray-600 hover:bg-gray-200 transition-all">
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
