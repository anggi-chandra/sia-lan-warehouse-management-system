@extends('layouts.app')

@section('title', 'Tambah Persediaan - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Tambah Persediaan</h1>
        <p>Tambahkan data stok barang baru</p>
    </div>

    <div class="form-container">
        <form action="{{ route('persediaan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_persediaan">ID Persediaan</label>
                <input type="text" id="kode_persediaan" name="kode_persediaan" value="{{ old('kode_persediaan') }}" placeholder="Contoh: PSD007" required>
                @error('kode_persediaan')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bag_gudang_id">Bag Gudang</label>
                <select id="bag_gudang_id" name="bag_gudang_id" required>
                    <option value="">Pilih Bag Gudang</option>
                    @foreach($bagGudangs as $bagGudang)
                        <option value="{{ $bagGudang->id }}" {{ old('bag_gudang_id') == $bagGudang->id ? 'selected' : '' }}>{{ $bagGudang->nama }}</option>
                    @endforeach
                </select>
                @error('bag_gudang_id')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gudang_id">Gudang</label>
                <select id="gudang_id" name="gudang_id" required>
                    <option value="">Pilih Gudang</option>
                    @foreach($gudangs as $gudang)
                        <option value="{{ $gudang->id }}" {{ old('gudang_id') == $gudang->id ? 'selected' : '' }}>{{ $gudang->name }}</option>
                    @endforeach
                </select>
                @error('gudang_id')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Nama Barang" required>
                @error('nama_barang')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" id="stok" name="stok" value="{{ old('stok') }}" placeholder="Jumlah Stok (contoh: 500 batang)" required>
                @error('stok')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Menipis" {{ old('status') == 'Menipis' ? 'selected' : '' }}>Menipis</option>
                    <option value="Habis" {{ old('status') == 'Habis' ? 'selected' : '' }}>Habis</option>
                </select>
                @error('status')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('persediaan.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
