@extends('layouts.app')

@section('title', 'Detail Transaksi - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Detail Transaksi</h1>
        <p>Informasi lengkap data transaksi</p>
    </div>

    <div class="detail-container" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2 style="margin: 0; font-size: 20px; font-weight: 600; color: #333;">Detail Transaksi</h2>
            <a href="{{ route('transaksi.index') }}" style="background-color: #6c757d; color: white; padding: 8px 20px; text-decoration: none; border-radius: 6px; font-size: 14px; display: inline-block;">Kembali</a>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
            <!-- Left Column -->
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">ID PESANAN</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $transaksi->transaction_code }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">ADMIN</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $transaksi->admin_name }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">JENIS PESANAN</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $transaksi->jenis_pesanan ?? '-' }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">JENIS PAYMENT</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $transaksi->jenis_payment ?? '-' }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">TOTAL PESANAN</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">NAMA BARANG</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $transaksi->nama_barang ?? '-' }}</div>
                </div>
            </div>

            <!-- Right Column -->
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">CUSTOMER</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $transaksi->customer->name ?? 'N/A' }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">TANGGAL TRANSAKSI</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $transaksi->date ? $transaksi->date->format('d M Y') : '-' }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">NOMINAL DP</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $transaksi->nominal_dp ? 'Rp ' . number_format($transaksi->nominal_dp, 0, ',', '.') : '-' }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">STATUS PELUNASAN</div>
                    <div>
                        @if($transaksi->status_pelunasan == 'Lunas')
                            <span style="background-color: #28a745; color: white; padding: 6px 16px; border-radius: 4px; font-size: 13px; font-weight: 500; display: inline-block;">{{ $transaksi->status_pelunasan }}</span>
                        @elseif($transaksi->status_pelunasan == 'DP')
                            <span style="background-color: #ffc107; color: #212529; padding: 6px 16px; border-radius: 4px; font-size: 13px; font-weight: 500; display: inline-block;">{{ $transaksi->status_pelunasan }}</span>
                        @else
                            <span style="background-color: #dc3545; color: white; padding: 6px 16px; border-radius: 4px; font-size: 13px; font-weight: 500; display: inline-block;">{{ $transaksi->status_pelunasan ?? '-' }}</span>
                        @endif
                    </div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">JUMLAH PESANAN</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $transaksi->jumlah_pesanan ?? '-' }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">HARGA PESANAN</div>
                    <div style="font-size: 16px; color: #212529; font-weight: 600;">{{ $transaksi->harga_pesanan ? 'Rp ' . number_format($transaksi->harga_pesanan, 0, ',', '.') : '-' }}</div>
                </div>

                <div style="background: #f0f4f8; padding: 15px; border-radius: 6px; border-left: 4px solid #007bff;">
                    <div style="font-size: 11px; color: #6c757d; margin-bottom: 8px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">STATUS</div>
                    <div>
                        @if($transaksi->status == 'Selesai')
                            <span style="background-color: #28a745; color: white; padding: 6px 16px; border-radius: 4px; font-size: 13px; font-weight: 500; display: inline-block;">{{ $transaksi->status }}</span>
                        @elseif($transaksi->status == 'Proses')
                            <span style="background-color: #007bff; color: white; padding: 6px 16px; border-radius: 4px; font-size: 13px; font-weight: 500; display: inline-block;">{{ $transaksi->status }}</span>
                        @else
                            <span style="background-color: #ffc107; color: #212529; padding: 6px 16px; border-radius: 4px; font-size: 13px; font-weight: 500; display: inline-block;">{{ $transaksi->status }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 30px; padding-top: 20px; border-top: 1px solid #e9ecef;">
            <a href="{{ route('transaksi.edit', $transaksi->id) }}" style="background-color: #007bff; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-block; font-size: 14px;">Edit Data</a>
            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: #dc3545; color: white; padding: 10px 24px; border-radius: 6px; border: none; font-weight: 500; cursor: pointer; font-size: 14px;">Hapus Data</button>
            </form>
        </div>
    </div>
@endsection

