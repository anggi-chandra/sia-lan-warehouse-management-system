@extends('layouts.app')

@section('title', 'Edit Gudang - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Edit Gudang</h1>
            <p class="text-primary/60 font-medium mt-1">Perbarui informasi gudang.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-8 relative overflow-hidden">
            <form action="{{ route('gudang.update', $gudang->id) }}" method="POST" class="space-y-6 relative z-10">
                @csrf
                @method('PUT')
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">ID Gudang</label>
                        <input type="text" name="kode_gudang" value="{{ old('kode_gudang', $gudang->kode_gudang) }}" class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm font-bold text-gray-500 cursor-not-allowed" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">Nama Gudang</label>
                        <input type="text" name="name" value="{{ old('name', $gudang->name) }}" placeholder="Gudang Utama" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                        @error('name')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">Lokasi</label>
                        <input type="text" name="location" value="{{ old('location', $gudang->location) }}" placeholder="Jakarta Barat" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                        @error('location')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">Kapasitas (m²)</label>
                        <input type="number" name="capacity" value="{{ old('capacity', $gudang->capacity) }}" placeholder="5000" min="0" step="0.01" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                        @error('capacity')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a href="{{ route('gudang.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-100 px-6 py-3 text-sm font-bold text-gray-600 hover:bg-gray-200 transition-all">
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
