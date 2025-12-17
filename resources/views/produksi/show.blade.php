@extends('layouts.app')

@section('title', 'Detail Produksi - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Detail Produksi</h1>
        <p>Informasi lengkap data produksi</p>
    </div>

    <div class="detail-container" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2 style="margin: 0; font-size: 20px; font-weight: 600; color: #333;">Detail Produksi</h2>
            <a href="{{ route('produksi.index') }}" style="background-color: #6c757d; color: white; padding: 8px 20px; text-decoration: none; border-radius: 6px; font-size: 14px; display: inline-block;">Kembali</a>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
            <!-- Left Column -->
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">ID PRODUKSI</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $produksi->kode_produksi ?? $produksi->id }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">PESANAN</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">
                        @if($produksi->pesanan)
                            {{ $produksi->pesanan->transaction_code }} - {{ $produksi->pesanan->customer->name ?? 'N/A' }}
                        @else
                            -
                        @endif
                    </div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">TANGGAL MULAI</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $produksi->tanggal_mulai ? $produksi->tanggal_mulai->format('d M Y') : '-' }}</div>
                </div>
            </div>

            <!-- Right Column -->
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">TANGGAL SELESAI</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $produksi->tanggal_selesai ? $produksi->tanggal_selesai->format('d M Y') : '-' }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">JUMLAH</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $produksi->jumlah ?? '-' }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">STATUS</div>
                    <div>
                        @if($produksi->status == 'Selesai')
                            <span style="background-color: #28a745; color: white; padding: 6px 16px; border-radius: 4px; font-size: 13px; font-weight: 500; display: inline-block;">{{ $produksi->status }}</span>
                        @elseif($produksi->status == 'Proses')
                            <span style="background-color: #007bff; color: white; padding: 6px 16px; border-radius: 4px; font-size: 13px; font-weight: 500; display: inline-block;">{{ $produksi->status }}</span>
                        @else
                            <span style="background-color: #ffc107; color: #212529; padding: 6px 16px; border-radius: 4px; font-size: 13px; font-weight: 500; display: inline-block;">{{ $produksi->status }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 30px; padding-top: 20px; border-top: 1px solid #e9ecef;">
            <a href="{{ route('produksi.edit', $produksi->id) }}" style="background-color: #007bff; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-block; font-size: 14px;">Edit Data</a>
            <form action="{{ route('produksi.destroy', $produksi->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: #dc3545; color: white; padding: 10px 24px; border-radius: 6px; border: none; font-weight: 500; cursor: pointer; font-size: 14px;">Hapus Data</button>
            </form>
        </div>
    </div>
@endsection

