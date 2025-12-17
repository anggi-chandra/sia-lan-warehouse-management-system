@extends('layouts.app')

@section('title', 'Detail Bag Gudang - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Detail Bag Gudang</h1>
        <p>Informasi lengkap pengelola gudang</p>
    </div>

    <div class="detail-container" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2 style="margin: 0; font-size: 20px; font-weight: 600; color: #333;">Detail Bag Gudang</h2>
            <a href="{{ route('bag-gudang.index') }}" style="background-color: #6c757d; color: white; padding: 8px 20px; text-decoration: none; border-radius: 6px; font-size: 14px; display: inline-block;">Kembali</a>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
            <!-- Left Column -->
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">ID BAG GUDANG</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $bagGudang->kode_bag_gudang }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">NAMA</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $bagGudang->nama }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">EMAIL</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $bagGudang->email }}</div>
                </div>
            </div>

            <!-- Right Column -->
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">ALAMAT</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $bagGudang->alamat }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">NO. TELEPON</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $bagGudang->no_telepon }}</div>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 30px; padding-top: 20px; border-top: 1px solid #e9ecef;">
            <a href="{{ route('bag-gudang.edit', $bagGudang->id) }}" style="background-color: #007bff; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-block; font-size: 14px;">Edit Data</a>
            <form action="{{ route('bag-gudang.destroy', $bagGudang->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: #dc3545; color: white; padding: 10px 24px; border-radius: 6px; border: none; font-weight: 500; cursor: pointer; font-size: 14px;">Hapus Data</button>
            </form>
        </div>
    </div>
@endsection
