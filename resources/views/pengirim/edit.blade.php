@extends('layouts.app')

@section('title', 'Edit Pengirim - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Edit Pengirim</h1>
        <p>Perbarui data pengirim barang</p>
    </div>

    <div class="form-container">
        <form action="{{ route('pengirim.update', $pengirim->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_pengirim">ID Pengirim</label>
                <input type="text" id="kode_pengirim" name="kode_pengirim" value="{{ old('kode_pengirim', $pengirim->kode_pengirim) }}" placeholder="Contoh: PGR001" required>
                @error('kode_pengirim')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pesanan_id">Pesanan</label>
                <select id="pesanan_id" name="pesanan_id">
                    <option value="">Pilih Pesanan</option>
                    @foreach($pesanans as $pesanan)
                        <option value="{{ $pesanan->id }}" {{ old('pesanan_id', $pengirim->pesanan_id) == $pesanan->id ? 'selected' : '' }}>
                            {{ $pesanan->transaction_code }} - {{ $pesanan->customer->name ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
                @error('pesanan_id')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_pengirim">Nama Pengirim</label>
                <input type="text" id="nama_pengirim" name="nama_pengirim" value="{{ old('nama_pengirim', $pengirim->nama_pengirim) }}" required>
                @error('nama_pengirim')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status_pengiriman">Status Pengiriman</label>
                <select id="status_pengiriman" name="status_pengiriman" required>
                    <option value="Menunggu" {{ old('status_pengiriman', $pengirim->status_pengiriman) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Dalam Perjalanan" {{ old('status_pengiriman', $pengirim->status_pengiriman) == 'Dalam Perjalanan' ? 'selected' : '' }}>Dalam Perjalanan</option>
                    <option value="Terkirim" {{ old('status_pengiriman', $pengirim->status_pengiriman) == 'Terkirim' ? 'selected' : '' }}>Terkirim</option>
                </select>
                @error('status_pengiriman')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                <input type="date" id="tanggal_pengiriman" name="tanggal_pengiriman" value="{{ old('tanggal_pengiriman', $pengirim->tanggal_pengiriman ? $pengirim->tanggal_pengiriman->format('Y-m-d') : '') }}" required>
                @error('tanggal_pengiriman')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('pengirim.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection

