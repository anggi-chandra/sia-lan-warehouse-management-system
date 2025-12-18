@extends('layouts.app')

@section('title', 'Data Gudang - Sistem Manajemen Gudang')

@section('content')
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Data Gudang</h1>
            <p class="text-primary/60 font-medium mt-1">Kelola data lokasi dan kapasitas gudang.</p>
        </div>
        <a href="{{ route('gudang.create') }}" class="inline-flex items-center justify-center rounded-xl bg-secondary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-secondary/30 hover:bg-secondary/90 transition-all">
            <i class="fas fa-plus mr-2"></i> Tambah Gudang
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-primary/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 text-xs uppercase tracking-wider text-primary/50">
                        <th class="px-8 py-6 font-bold">ID Gudang</th>
                        <th class="px-6 py-6 font-bold">Nama Gudang</th>
                        <th class="px-6 py-6 font-bold">Lokasi</th>
                        <th class="px-6 py-6 font-bold">Kapasitas</th>
                        <th class="px-8 py-6 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($gudangs as $gudang)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-4 font-bold text-secondary">
                            {{ $gudang->kode_gudang ?? $gudang->id }}
                        </td>
                        <td class="px-6 py-4 font-bold text-primary">
                            {{ $gudang->name }}
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-500">
                            {{ $gudang->location }}
                        </td>
                        <td class="px-6 py-4 text-sm font-bold text-primary">
                            {{ $gudang->capacity ?? '-' }} {{ $gudang->capacity ? 'm²' : '' }}
                        </td>
                        <td class="px-8 py-4 text-center">
                            <div class="inline-flex items-center gap-2 opacity-100 transition-opacity">
                                <a href="{{ route('gudang.show', $gudang->id) }}" class="p-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('gudang.edit', $gudang->id) }}" class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('gudang.destroy', $gudang->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                         <td colspan="5" class="text-center py-10 text-gray-400 font-medium">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-warehouse text-4xl mb-3 opacity-20"></i>
                                <p>Belum ada data gudang.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
