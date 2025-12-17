@extends('layouts.app')

@section('title', 'Tambah Gudang - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Tambah Gudang</h1>
        <p>Tambahkan data gudang baru</p>
    </div>

    <div class="form-container">
        <form action="{{ route('gudang.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_gudang">ID Gudang</label>
                <input type="text" id="kode_gudang" name="kode_gudang" value="{{ old('kode_gudang') }}" placeholder="Contoh: GDG007" required>
                @error('kode_gudang')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Nama Gudang</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Gudang" required>
                @error('name')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Lokasi" required>
                @error('location')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="capacity">Kapasitas</label>
                <input type="text" id="capacity" name="capacity" value="{{ old('capacity') }}" placeholder="Kapasitas (contoh: 5000 m²)">
                @error('capacity')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('gudang.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
