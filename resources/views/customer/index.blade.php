@extends('layouts.app')

@section('title', 'Data Customer - Sistem Manajemen Gudang')

@section('content')
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Data Customer</h1>
            <p class="text-primary/60 font-medium mt-1">Kelola data pelanggan dan informasi kontak.</p>
        </div>
        <button onclick="openModal()" class="inline-flex items-center justify-center rounded-xl bg-secondary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-secondary/30 hover:bg-secondary/90 transition-all cursor-pointer">
            <i class="fas fa-plus mr-2"></i> Tambah Customer
        </button>
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

        <!-- Pagination -->
        <div class="px-8 py-6 border-t border-gray-100">
            {{ $customers->links() }}
        </div>
    </div>

    @push('modals')
    <!-- CREATE MODAL -->
    <div id="createModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm" id="modalBackdrop" onclick="closeModal()"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <!-- Modal Panel -->
                <div class="relative overflow-hidden rounded-3xl bg-white text-left shadow-2xl sm:my-8 sm:w-full sm:max-w-2xl" id="modalPanel">
                    
                    <!-- Close Button -->
                    <button type="button" onclick="closeModal()" class="absolute right-6 top-6 text-gray-400 hover:text-gray-500 focus:outline-none transition-colors">
                        <span class="sr-only">Close</span>
                        <i class="fas fa-times text-xl"></i>
                    </button>

                    <div class="bg-white px-8 py-8">
                         <div class="text-center mb-6">
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 mb-4">
                                 <i class="fas fa-users text-2xl text-secondary"></i>
                            </div>
                            <h3 class="text-2xl font-extrabold text-primary leading-6" id="modal-title">Tambah Customer</h3>
                            <p class="text-sm text-gray-500 mt-2 font-medium">Tambahkan mitra bisnis baru ke dalam sistem.</p>
                        </div>

                        <form action="{{ route('customer.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-bold text-primary mb-2">ID Customer</label>
                                    <input type="text" name="customer_code" placeholder="Contoh: CUST001" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                </div>
            
                                <div>
                                    <label class="block text-sm font-bold text-primary mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" placeholder="PT. Sukses Makmur" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                </div>
            
                                <div>
                                    <label class="block text-sm font-bold text-primary mb-2">Nomor Telepon</label>
                                    <input type="text" name="phone" placeholder="081234567890" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                </div>
            
                                <div>
                                    <label class="block text-sm font-bold text-primary mb-2">Alamat Lengkap</label>
                                    <textarea name="address" rows="3" placeholder="Jl. Sudirman No. 123" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required></textarea>
                                </div>
                            </div>

                            <div class="mt-8 flex justify-end gap-3 pt-6 border-t border-gray-50">
                                <button type="button" onclick="closeModal()" class="inline-flex items-center justify-center rounded-xl bg-gray-100 px-6 py-3 text-sm font-bold text-gray-600 hover:bg-gray-200 transition-all cursor-pointer">
                                    Batal
                                </button>
                                <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-primary/30 hover:bg-primary/90 transition-all cursor-pointer">
                                    Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endpush

    <script>
        function openModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        // Close modal on ESC key press
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeModal();
            }
        });
    </script>
@endsection
