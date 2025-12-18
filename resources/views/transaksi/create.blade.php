@extends('layouts.app')

@section('title', 'Tambah Transaksi - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-extrabold text-primary tracking-tight">Buat Transaksi Baru</h1>
                <p class="text-primary/60 font-medium mt-1">Catat transaksi penjualan dan informasi pelanggan.</p>
            </div>
            <a href="{{ route('transaksi.index') }}" class="inline-flex items-center justify-center rounded-xl bg-white border border-gray-200 px-6 py-3 text-sm font-bold text-gray-600 hover:bg-gray-50 transition-all">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <form action="{{ route('transaksi.store') }}" method="POST" class="relative">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- LEFT COLUMN: INPUTS (Customer & Items) -->
                <div class="lg:col-span-8 space-y-8">
                    
                    <!-- Card 1: Informasi Dasar -->
                    <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-8">
                         <h3 class="text-lg font-extrabold text-primary mb-6 flex items-center gap-3 border-b border-gray-100 pb-4">
                            <span class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-lg"><i class="fas fa-file-invoice"></i></span>
                            Informasi Transaksi
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-primary mb-2">ID Pesanan</label>
                                <input type="text" name="transaction_code" value="{{ old('transaction_code') }}" placeholder="Contoh: PSN001" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                @error('transaction_code')
                                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                             <div>
                                <label class="block text-sm font-bold text-primary mb-2">Tanggal</label>
                                <input type="date" name="date" value="{{ old('date') }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                @error('date')
                                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-primary mb-2">Customer</label>
                                <select name="customer_id" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                    <option value="" disabled selected>-- Pilih Customer --</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-primary mb-2">Admin Penanggung Jawab</label>
                                <input type="text" name="admin_name" value="{{ old('admin_name') }}" placeholder="Nama Admin" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                @error('admin_name')
                                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Detail Pesanan -->
                    <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-8">
                         <h3 class="text-lg font-extrabold text-primary mb-6 flex items-center gap-3 border-b border-gray-100 pb-4">
                            <span class="w-10 h-10 rounded-xl bg-yellow-50 text-yellow-600 flex items-center justify-center text-lg"><i class="fas fa-box"></i></span>
                            Detail Pesanan
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                             <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-primary mb-2">Nama Barang</label>
                                <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Nama Barang" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                                 @error('nama_barang')
                                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-primary mb-2">Jenis Pesanan</label>
                                <input type="text" name="jenis_pesanan" value="{{ old('jenis_pesanan') }}" placeholder="Contoh: Grosir" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                                 @error('jenis_pesanan')
                                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                             <div>
                                <label class="block text-sm font-bold text-primary mb-2">Jumlah Pesanan</label>
                                <input type="text" id="jumlah_pesanan" name="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" placeholder="Qty (e.g 100)" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                                 @error('jumlah_pesanan')
                                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: PAYMENT & ACTIONS (Sticky) -->
                <div class="lg:col-span-4">
                    <div class="sticky top-6 space-y-6">
                        
                        <!-- Total Price Card -->
                        <div class="bg-primary rounded-3xl shadow-xl shadow-primary/20 p-8 text-white relative overflow-hidden">
                            <!-- Background Decoration -->
                            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                            <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-24 h-24 bg-secondary/30 rounded-full blur-2xl"></div>

                            <div class="relative z-10">
                                <h4 class="text-white/80 font-medium text-sm mb-2">Total Pembayaran</h4>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-2xl font-semibold">Rp</span>
                                    <input type="text" id="display_total" value="0" class="bg-transparent border-none text-4xl font-extrabold text-white focus:ring-0 p-0 w-full placeholder-white/50 tracking-tight" readonly placeholder="0">
                                </div>
                                <input type="hidden" id="total_harga" name="total" value="{{ old('total') }}">
                                <p class="text-white/60 text-xs mt-2">*Otomatis dihitung dari Qty x Harga Satuan</p>
                            </div>
                        </div>

                        <!-- Payment Details Card -->
                        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-6">
                            <h3 class="text-lg font-extrabold text-primary mb-6 flex items-center gap-2">
                                <i class="fas fa-wallet text-secondary"></i> Rincian Pembayaran
                            </h3>
                            
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Harga Satuan (Rp)</label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-3.5 text-gray-400 font-bold">Rp</span>
                                        <input type="text" id="harga_pesanan" name="harga_pesanan" value="{{ old('harga_pesanan') }}" placeholder="0" class="w-full rounded-xl border border-gray-200 bg-gray-50 pl-12 pr-4 py-3 text-lg font-bold text-primary focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                                    </div>
                                     @error('harga_pesanan')
                                        <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Nominal DP</label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-3.5 text-gray-400 font-bold">Rp</span>
                                        <input type="text" id="nominal_dp" name="nominal_dp" value="{{ old('nominal_dp') }}" placeholder="0" class="w-full rounded-xl border border-gray-200 bg-gray-50 pl-12 pr-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                                    </div>
                                     @error('nominal_dp')
                                        <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                     <div>
                                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Metode</label>
                                        <select name="jenis_payment" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="Cash" {{ old('jenis_payment') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                            <option value="Transfer" {{ old('jenis_payment') == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                                            <option value="Kredit" {{ old('jenis_payment') == 'Kredit' ? 'selected' : '' }}>Kredit</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Pelunasan</label>
                                         <select name="status_pelunasan" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="Lunas" {{ old('status_pelunasan') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                            <option value="Belum Lunas" {{ old('status_pelunasan') == 'Belum Lunas' ? 'selected' : '' }}>Belum</option>
                                            <option value="DP" {{ old('status_pelunasan') == 'DP' ? 'selected' : '' }}>DP</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Status Transaksi</label>
                                     <select name="status" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Proses" {{ old('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mt-8">
                                <button type="submit" class="w-full inline-flex items-center justify-center rounded-xl bg-primary px-6 py-4 text-base font-bold text-white shadow-lg shadow-primary/30 hover:bg-primary/90 hover:-translate-y-1 transition-all">
                                    <i class="fas fa-save mr-2"></i> Simpan Transaksi
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahInput = document.getElementById('jumlah_pesanan');
            const hargaInput = document.getElementById('harga_pesanan');
            const totalInput = document.getElementById('total_harga');
            const displayTotal = document.getElementById('display_total');

            function formatCompact(number) {
                if (number >= 1000000000) {
                    return (number / 1000000000).toLocaleString('id-ID', { maximumFractionDigits: 2 }) + ' M';
                } else if (number >= 1000000) {
                    return (number / 1000000).toLocaleString('id-ID', { maximumFractionDigits: 2 }) + ' jt';
                }
                return new Intl.NumberFormat('id-ID').format(number);
            }

            function calculateTotal() {
                // Get value and strip non-numeric except dot for decimals (if any)
                // For '100 Pcs', match first number
                let jumlahStr = jumlahInput.value;
                let jumlahMatch = jumlahStr.match(/(\d+(\.\d+)?)/);
                let jumlah = jumlahMatch ? parseFloat(jumlahMatch[0]) : 0;

                // Handle dots in price input
                let hargaStr = hargaInput.value.replace(/\./g, '');
                let harga = parseFloat(hargaStr) || 0;
                
                let total = 0;
                if (jumlah > 0 && harga > 0) {
                    total = jumlah * harga;
                } 
                
                totalInput.value = total;
                displayTotal.value = formatCompact(total);
            }

            // Listen to inputs
            jumlahInput.addEventListener('input', calculateTotal);
            
            // Format Currency Inputs (add dots)
            function formatCurrencyInput(e) {
                let value = e.target.value.replace(/\D/g, ''); // Remove all non-digits
                let formatted = new Intl.NumberFormat('id-ID').format(value);
                e.target.value = value ? formatted : '';
                calculateTotal(); // Recalculate total when price changes
            }

            hargaInput.addEventListener('input', formatCurrencyInput);
            document.getElementById('nominal_dp').addEventListener('input', formatCurrencyInput);

            // Initial calculation
            calculateTotal();
        });
    </script>
@endsection
