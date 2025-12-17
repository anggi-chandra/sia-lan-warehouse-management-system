@extends('layouts.app')

@section('title', 'Edit Persediaan - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Edit Persediaan</h1>
        <p>Perbarui data stok barang</p>
    </div>

    <div class="form-container">
        <form action="{{ route('persediaan.update', $persediaan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_persediaan">ID Persediaan</label>
                <input type="text" id="kode_persediaan" name="kode_persediaan" value="{{ old('kode_persediaan', $persediaan->kode_persediaan) }}" required>
                @error('kode_persediaan')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="gudang_id">Gudang</label>
                    <select id="gudang_id" name="gudang_id" required>
                        <option value="">Pilih Gudang</option>
                        @foreach($gudangs as $gudang)
                            <option value="{{ $gudang->id }}" {{ old('gudang_id', $persediaan->gudang_id) == $gudang->id ? 'selected' : '' }}>{{ $gudang->name }}</option>
                        @endforeach
                    </select>
                    @error('gudang_id')
                        <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bag_gudang_id">Bagian Gudang</label>
                    <select id="bag_gudang_id" name="bag_gudang_id" required>
                        <option value="">Pilih Bagian Gudang</option>
                        @foreach($bagGudangs as $bagGudang)
                            <option value="{{ $bagGudang->id }}" {{ old('bag_gudang_id', $persediaan->bag_gudang_id) == $bagGudang->id ? 'selected' : '' }}>{{ $bagGudang->nama }}</option>
                        @endforeach
                    </select>
                    @error('bag_gudang_id')
                        <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $persediaan->nama_barang) }}" required>
                @error('nama_barang')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" id="stok" name="stok" value="{{ old('stok', $persediaan->stok) }}" required>
                    @error('stok')
                        <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="Tersedia" {{ old('status', $persediaan->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Menipis" {{ old('status', $persediaan->status) == 'Menipis' ? 'selected' : '' }}>Menipis</option>
                        <option value="Habis" {{ old('status', $persediaan->status) == 'Habis' ? 'selected' : '' }}>Habis</option>
                    </select>
                    @error('status')
                        <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('persediaan.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
