@extends('layouts.app')

@section('title', 'Data Bag Admin - Sistem Manajemen Gudang')

@section('content')
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Data Bag Admin</h1>
            <p class="text-primary/60 font-medium mt-1">Kelola data administrator sistem.</p>
        </div>
        <button onclick="openModal()" class="inline-flex items-center justify-center rounded-xl bg-secondary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-secondary/30 hover:bg-secondary/90 transition-all cursor-pointer">
            <i class="fas fa-plus mr-2"></i> Tambah Admin
        </button>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-primary/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 text-xs uppercase tracking-wider text-primary/50">
                        <th class="px-8 py-6 font-bold">ID Admin</th>
                        <th class="px-6 py-6 font-bold">Nama Lengkap</th>
                        <th class="px-6 py-6 font-bold">Email</th>
                        <th class="px-6 py-6 font-bold">No. Telepon</th>
                        <th class="px-6 py-6 font-bold text-center">Status Akun</th>
                        <th class="px-8 py-6 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($bagAdmins as $bagAdmin)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-4 font-bold text-secondary">
                            {{ $bagAdmin->kode_admin }}
                        </td>
                        <td class="px-6 py-4 font-bold text-primary">
                            {{ $bagAdmin->nama_admin }}
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-500">
                            {{ $bagAdmin->email }}
                        </td>
                         <td class="px-6 py-4 text-sm font-medium text-gray-500">
                            {{ $bagAdmin->no_telepon }}
                        </td>
                        <td class="px-6 py-4 text-center">
                             @if($bagAdmin->user)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i> Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-500">
                                     <i class="fas fa-minus-circle mr-1"></i> Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-4 text-center">
                            <div class="inline-flex items-center gap-2 opacity-100 transition-opacity">
                                <a href="{{ route('bag-admin.show', $bagAdmin->id) }}" class="p-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('bag-admin.edit', $bagAdmin->id) }}" class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('bag-admin.destroy', $bagAdmin->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini? Akun user juga akan dihapus.');">
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
                                <i class="fas fa-user-shield text-4xl mb-3 opacity-20"></i>
                                <p>Belum ada data admin.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-8 py-6 border-t border-gray-100">
            {{ $bagAdmins->links() }}
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
                                 <i class="fas fa-user-shield text-2xl text-secondary"></i>
                            </div>
                            <h3 class="text-2xl font-extrabold text-primary leading-6" id="modal-title">Tambah Admin Baru</h3>
                            <p class="text-sm text-gray-500 mt-2 font-medium">Buat akun administrator baru untuk akses sistem.</p>
                        </div>

                        <form action="{{ route('bag-admin.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                 <div>
                                    <label class="block text-sm font-bold text-primary mb-2">ID Admin</label>
                                    <input type="text" name="kode_admin" placeholder="Contoh: ADM001" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                </div>
            
                                <div>
                                    <label class="block text-sm font-bold text-primary mb-2">Nama Lengkap</label>
                                    <input type="text" name="nama_admin" placeholder="Contoh: Budi Santoso" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                </div>
            
                                <div>
                                    <label class="block text-sm font-bold text-primary mb-2">Email</label>
                                    <input type="email" name="email" placeholder="email@contoh.com" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                </div>
            
                                 <div>
                                    <label class="block text-sm font-bold text-primary mb-2">No. Telepon</label>
                                    <input type="text" name="no_telepon" placeholder="08..." class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                </div>
            
                                <div class="col-span-1 md:col-span-2">
                                    <label class="block text-sm font-bold text-primary mb-2">Alamat Lengkap</label>
                                    <textarea name="alamat" rows="2" placeholder="Alamat lengkap..." class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required></textarea>
                                </div>
            
                                 <div class="col-span-1 md:col-span-2">
                                    <label class="block text-sm font-bold text-primary mb-2">Password Akun</label>
                                    <div class="relative">
                                        <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all pr-12" required>
                                        <button type="button" id="togglePassword" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
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

        // Initialize toggle password specifically for this modal
        // Since id is unique, we add listener here
        document.addEventListener('DOMContentLoaded', function() {
              const toggleBtn = document.getElementById('togglePassword');
              if(toggleBtn){
                  toggleBtn.addEventListener('click', function() {
                    const passwordInput = document.getElementById('password');
                    const icon = this.querySelector('i');
                    
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
              }
        });

        // Close modal on ESC key press
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeModal();
            }
        });
    </script>
@endsection
