@extends('layouts.app')

@section('title', 'Data Pengirim - Sistem Manajemen Gudang')

@section('content')
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Data Pengirim</h1>
            <p class="text-primary/60 font-medium mt-1">Kelola data kurir dan status pengiriman.</p>
        </div>
        <a href="{{ route('pengirim.create') }}" class="inline-flex items-center justify-center rounded-xl bg-secondary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-secondary/30 hover:bg-secondary/90 transition-all">
            <i class="fas fa-plus mr-2"></i> Tambah Pengirim
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-primary/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 text-xs uppercase tracking-wider text-primary/50">
                        <th class="px-8 py-6 font-bold">ID Pengiriman</th>
                         <th class="px-6 py-6 font-bold">Pesanan (Customer)</th>
                        <th class="px-6 py-6 font-bold">Nama Pengirim/Kurir</th>
                        <th class="px-6 py-6 font-bold text-center">Status</th>
                        <th class="px-6 py-6 font-bold">Estimasi/Tgl</th>
                        <th class="px-8 py-6 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($pengirims as $pengirim)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-4 font-bold text-secondary">
                            {{ $pengirim->kode_pengirim ?? $pengirim->id }}
                        </td>
                         <td class="px-6 py-4 text-sm font-bold text-primary">
                            @if($pengirim->pesanan)
                                <span class="bg-gray-100 px-2 py-1 rounded-md text-gray-600 mr-2">{{ $pengirim->pesanan->transaction_code }}</span> 
                                {{ $pengirim->pesanan->customer->name ?? 'N/A' }}
                            @else
                                <span class="text-gray-400 italic">Pesanan tidak ditemukan</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-bold text-primary">
                            {{ $pengirim->nama_pengirim }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($pengirim->status_pengiriman == 'Terkirim')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i> Terkirim
                                </span>
                            @elseif($pengirim->status_pengiriman == 'Dalam Perjalanan')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                                    <i class="fas fa-truck mr-1"></i> Perjalanan
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-800">
                                     <i class="fas fa-clock mr-1"></i> Menunggu
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-bold text-primary">
                            {{ $pengirim->tanggal_pengiriman ? $pengirim->tanggal_pengiriman->format('d M Y') : '-' }}
                        </td>
                        <td class="px-8 py-4 text-center">
                            <div class="inline-flex items-center gap-2 opacity-100 transition-opacity">
                                <a href="{{ route('pengirim.show', $pengirim->id) }}" class="p-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pengirim.edit', $pengirim->id) }}" class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pengirim.destroy', $pengirim->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                         <td colspan="6" class="text-center py-10 text-gray-400 font-medium">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-truck-loading text-4xl mb-3 opacity-20"></i>
                                <p>Belum ada data pengiriman.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
