@extends('layouts.app')

@section('title', 'Edit Customer - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Edit Customer</h1>
        <p>Edit data pelanggan</p>
    </div>

    <div class="form-container">
        <form action="{{ route('customer.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_code">ID Customer</label>
                <input type="text" name="customer_code" id="customer_code" class="form-control" required value="{{ old('customer_code', $customer->customer_code) }}">
                @error('customer_code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $customer->name) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea name="address" id="address" class="form-control" required>{{ old('address', $customer->address) }}</textarea>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">No. Telepon</label>
                <input type="text" name="phone" id="phone" class="form-control" required value="{{ old('phone', $customer->phone) }}">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Update</button>
                <a href="{{ route('customer.index') }}" class="btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
