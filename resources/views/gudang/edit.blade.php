@extends('layouts.app')

@section('title', 'Edit Gudang - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Edit Gudang</h1>
        <p>Perbarui data lokasi gudang</p>
    </div>

    <div class="form-container">
        <form action="{{ route('gudang.update', $gudang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_gudang">ID Gudang</label>
                <input type="text" id="kode_gudang" name="kode_gudang" value="{{ old('kode_gudang', $gudang->kode_gudang) }}" placeholder="Contoh: GDG001" required>
                @error('kode_gudang')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Nama Gudang</label>
                <input type="text" id="name" name="name" value="{{ old('name', $gudang->name) }}" required>
                @error('name')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" id="location" name="location" value="{{ old('location', $gudang->location) }}" required>
                @error('location')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="capacity">Kapasitas (m²)</label>
                <input type="number" id="capacity" name="capacity" value="{{ old('capacity', $gudang->capacity) }}" min="0" step="0.01">
                @error('capacity')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('gudang.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
