@extends('layouts.app')

@section('title', 'Data Customer - Sistem Manajemen Gudang')

@section('content')
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Data Customer</h1>
            <p class="text-primary/60 font-medium mt-1">Kelola data pelanggan dan informasi kontak.</p>
        </div>
        <a href="{{ route('customer.create') }}" class="inline-flex items-center justify-center rounded-xl bg-secondary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-secondary/30 hover:bg-secondary/90 transition-all">
            <i class="fas fa-plus mr-2"></i> Tambah Customer
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-primary/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 text-xs uppercase tracking-wider text-primary/50">
                        <th class="px-8 py-6 font-bold">ID Customer</th>
                        <th class="px-6 py-6 font-bold">Nama</th>
                        <th class="px-6 py-6 font-bold">Alamat</th>
                        <th class="px-6 py-6 font-bold">No. Telepon</th>
                        <th class="px-8 py-6 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($customers as $customer)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-4 font-bold text-secondary">
                            {{ $customer->customer_code }}
                        </td>
                        <td class="px-6 py-4 font-bold text-primary">
                            {{ $customer->name }}
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-500 max-w-xs truncate">
                            {{ $customer->address }}
                        </td>
                        <td class="px-6 py-4 text-sm font-bold text-primary">
                            {{ $customer->phone }}
                        </td>
                        <td class="px-8 py-4 text-center">
                            <div class="inline-flex items-center gap-2 opacity-100 transition-opacity">
                                <a href="{{ route('customer.show', $customer->id) }}" class="p-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('customer.edit', $customer->id) }}" class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                                <i class="fas fa-inbox text-4xl mb-3 opacity-20"></i>
                                <p>Belum ada data customer.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
