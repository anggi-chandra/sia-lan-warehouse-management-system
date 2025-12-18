@extends('layouts.app')

@section('title', 'Edit Transaksi - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-4xl mx-auto">
         <div class="mb-10 text-center">
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Edit Transaksi</h1>
            <p class="text-primary/60 font-medium mt-1">Perbarui detail transaksi penjualan.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-8 relative overflow-hidden">
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="space-y-8 relative z-10">
                @csrf
                @method('PUT')
                
                <!-- Section: Informasi Dasar -->
                <div>
                     <h3 class="text-lg font-extrabold text-primary mb-4 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-sm"><i class="fas fa-file-invoice"></i></span>
                        Informasi Dasar
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">ID Pesanan</label>
                            <input type="text" name="transaction_code" value="{{ old('transaction_code', $transaksi->transaction_code) }}" class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm font-bold text-gray-500 cursor-not-allowed" readonly>
                        </div>

                         <div>
                            <label class="block text-sm font-bold text-primary mb-2">Tanggal Transaksi</label>
                            <input type="date" name="date" value="{{ old('date', $transaksi->date ? $transaksi->date->format('Y-m-d') : '') }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                             @error('date')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Customer</label>
                            <select name="customer_id" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id', $transaksi->customer_id) == $customer->id ? 'selected' : '' }}>
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
                            <input type="text" name="admin_name" value="{{ old('admin_name', $transaksi->admin_name) }}" placeholder="Nama Admin" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                            @error('admin_name')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section: Detail Pesanan -->
                 <div class="border-t border-gray-100 pt-8">
                     <h3 class="text-lg font-extrabold text-primary mb-4 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-yellow-50 text-yellow-600 flex items-center justify-center text-sm"><i class="fas fa-box"></i></span>
                        Detail Pesanan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                         <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-primary mb-2">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{ old('nama_barang', $transaksi->nama_barang) }}" placeholder="Nama Barang" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                             @error('nama_barang')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Jenis Pesanan</label>
                            <input type="text" name="jenis_pesanan" value="{{ old('jenis_pesanan', $transaksi->jenis_pesanan) }}" placeholder="Contoh: Grosir" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                             @error('jenis_pesanan')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                         <div>
                            <label class="block text-sm font-bold text-primary mb-2">Jumlah Pesanan</label>
                            <input type="text" name="jumlah_pesanan" value="{{ old('jumlah_pesanan', $transaksi->jumlah_pesanan) }}" placeholder="Contoh: 100 Pcs" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                             @error('jumlah_pesanan')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section: Pembayaran -->
                 <div class="border-t border-gray-100 pt-8">
                     <h3 class="text-lg font-extrabold text-primary mb-4 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center text-sm"><i class="fas fa-wallet"></i></span>
                        Pembayaran
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Total Harga (Rp)</label>
                            <input type="number" name="total" value="{{ old('total', $transaksi->total) }}" placeholder="0" step="0.01" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                             @error('total')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                         <div>
                            <label class="block text-sm font-bold text-primary mb-2">Harga Satuan (Rp)</label>
                            <input type="number" name="harga_pesanan" value="{{ old('harga_pesanan', $transaksi->harga_pesanan) }}" placeholder="0" step="0.01" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                             @error('harga_pesanan')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Nominal DP (Rp)</label>
                            <input type="number" name="nominal_dp" value="{{ old('nominal_dp', $transaksi->nominal_dp) }}" placeholder="0" step="0.01" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                             @error('nominal_dp')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                     <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-5">
                         <div>
                            <label class="block text-sm font-bold text-primary mb-2">Metode Pembayaran</label>
                            <select name="jenis_payment" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                                <option value="Cash" {{ old('jenis_payment', $transaksi->jenis_payment) == 'Cash' ? 'selected' : '' }}>Cash</option>
                                <option value="Transfer" {{ old('jenis_payment', $transaksi->jenis_payment) == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                                <option value="Kredit" {{ old('jenis_payment', $transaksi->jenis_payment) == 'Kredit' ? 'selected' : '' }}>Kredit</option>
                            </select>
                             @error('jenis_payment')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                         <div>
                            <label class="block text-sm font-bold text-primary mb-2">Status Pelunasan</label>
                             <select name="status_pelunasan" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                                <option value="Lunas" {{ old('status_pelunasan', $transaksi->status_pelunasan) == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                <option value="Belum Lunas" {{ old('status_pelunasan', $transaksi->status_pelunasan) == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                <option value="DP" {{ old('status_pelunasan', $transaksi->status_pelunasan) == 'DP' ? 'selected' : '' }}>DP</option>
                            </select>
                             @error('status_pelunasan')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Status Transaksi</label>
                             <select name="status" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                                <option value="Pending" {{ old('status', $transaksi->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Proses" {{ old('status', $transaksi->status) == 'Proses' ? 'selected' : '' }}>Proses</option>
                                <option value="Selesai" {{ old('status', $transaksi->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                             @error('status')
                                <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a href="{{ route('transaksi.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-100 px-6 py-3 text-sm font-bold text-gray-600 hover:bg-gray-200 transition-all">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-primary/30 hover:bg-primary/90 transition-all">
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
