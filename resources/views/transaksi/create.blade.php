@extends('layouts.app')

@section('title', 'Tambah Transaksi - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Tambah Transaksi</h1>
        <p>Tambahkan data transaksi baru</p>
    </div>

    <div class="form-container">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <!-- Left Column -->
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div class="form-group">
                        <label for="transaction_code">ID Pesanan</label>
                        <input type="text" id="transaction_code" name="transaction_code" value="{{ old('transaction_code') }}" placeholder="Contoh: PSN008" required>
                        @error('transaction_code')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="admin_name">Admin</label>
                        <input type="text" id="admin_name" name="admin_name" value="{{ old('admin_name') }}" placeholder="Nama Admin" required>
                        @error('admin_name')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_pesanan">Jenis Pesanan</label>
                        <input type="text" id="jenis_pesanan" name="jenis_pesanan" value="{{ old('jenis_pesanan') }}" placeholder="Jenis Pesanan">
                        @error('jenis_pesanan')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_payment">Jenis Payment</label>
                        <select id="jenis_payment" name="jenis_payment">
                            <option value="">Pilih Jenis Payment</option>
                            <option value="Cash" {{ old('jenis_payment') == 'Cash' ? 'selected' : '' }}>Cash</option>
                            <option value="Transfer" {{ old('jenis_payment') == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                            <option value="Kredit" {{ old('jenis_payment') == 'Kredit' ? 'selected' : '' }}>Kredit</option>
                        </select>
                        @error('jenis_payment')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="total">Total Pesanan</label>
                        <input type="number" id="total" name="total" value="{{ old('total') }}" placeholder="Total Pesanan" step="0.01" required>
                        @error('total')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Nama Barang">
                        @error('nama_barang')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div class="form-group">
                        <label for="customer_id">Customer</label>
                        <select id="customer_id" name="customer_id" required>
                            <option value="">Pilih Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">Tanggal Transaksi</label>
                        <input type="date" id="date" name="date" value="{{ old('date') }}" required>
                        @error('date')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nominal_dp">Nominal DP</label>
                        <input type="number" id="nominal_dp" name="nominal_dp" value="{{ old('nominal_dp') }}" placeholder="Nominal DP" step="0.01">
                        @error('nominal_dp')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status_pelunasan">Status Pelunasan</label>
                        <select id="status_pelunasan" name="status_pelunasan">
                            <option value="">Pilih Status</option>
                            <option value="Lunas" {{ old('status_pelunasan') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                            <option value="Belum Lunas" {{ old('status_pelunasan') == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                            <option value="DP" {{ old('status_pelunasan') == 'DP' ? 'selected' : '' }}>DP</option>
                        </select>
                        @error('status_pelunasan')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah_pesanan">Jumlah Pesanan</label>
                        <input type="text" id="jumlah_pesanan" name="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" placeholder="Jumlah Pesanan">
                        @error('jumlah_pesanan')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_pesanan">Harga Pesanan</label>
                        <input type="number" id="harga_pesanan" name="harga_pesanan" value="{{ old('harga_pesanan') }}" placeholder="Harga Pesanan" step="0.01">
                        @error('harga_pesanan')
                            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Proses" {{ old('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                    <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('transaksi.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection

