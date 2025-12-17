@extends('layouts.app')

@section('title', 'Tambah Customer - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Tambah Customer</h1>
        <p>Tambahkan data customer baru</p>
    </div>

    <div class="form-container">
        <form action="{{ route('customer.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_code">ID Customer</label>
                <input type="text" name="customer_code" id="customer_code" value="{{ old('customer_code') }}" placeholder="Contoh: CUST008" required>
                @error('customer_code')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nama Customer" required>
                @error('name')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea name="address" id="address" rows="3" placeholder="Alamat lengkap" required>{{ old('address') }}</textarea>
                @error('address')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">No. Telepon</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Nomor telepon" required>
                @error('phone')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('customer.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
