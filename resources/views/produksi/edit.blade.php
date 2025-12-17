@extends('layouts.app')

@section('title', 'Edit Produksi - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Edit Produksi</h1>
        <p>Perbarui data produksi</p>
    </div>

    <div class="form-container">
        <form action="{{ route('produksi.update', $produksi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_produksi">ID Produksi</label>
                <input type="text" id="kode_produksi" name="kode_produksi" value="{{ old('kode_produksi', $produksi->kode_produksi) }}" placeholder="Contoh: PRD006" required>
                @error('kode_produksi')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pesanan_id">Pesanan</label>
                <select id="pesanan_id" name="pesanan_id">
                    <option value="">Pilih Pesanan</option>
                    @foreach($pesanans as $pesanan)
                        <option value="{{ $pesanan->id }}" {{ old('pesanan_id', $produksi->pesanan_id) == $pesanan->id ? 'selected' : '' }}>
                            {{ $pesanan->transaction_code }} - {{ $pesanan->customer->name ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
                @error('pesanan_id')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $produksi->tanggal_mulai ? $produksi->tanggal_mulai->format('Y-m-d') : '') }}" required>
                @error('tanggal_mulai')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $produksi->tanggal_selesai ? $produksi->tanggal_selesai->format('Y-m-d') : '') }}" required>
                @error('tanggal_selesai')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" id="jumlah" name="jumlah" value="{{ old('jumlah', $produksi->jumlah) }}" placeholder="Contoh: 500 unit" required>
                @error('jumlah')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="Pending" {{ old('status', $produksi->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Proses" {{ old('status', $produksi->status) == 'Proses' ? 'selected' : '' }}>Proses</option>
                    <option value="Selesai" {{ old('status', $produksi->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('produksi.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection

