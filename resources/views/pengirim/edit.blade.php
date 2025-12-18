@extends('layouts.app')

@section('title', 'Edit Pengirim - Sistem Manajemen Gudang')

@section('content')
    <div class="max-w-3xl mx-auto">
         <div class="mb-10 text-center">
            <h1 class="text-3xl font-extrabold text-primary tracking-tight">Edit Pengiriman</h1>
            <p class="text-primary/60 font-medium mt-1">Perbarui status atau detail pengiriman.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-8 relative overflow-hidden">
            <form action="{{ route('pengirim.update', $pengirim->id) }}" method="POST" class="space-y-6 relative z-10">
                @csrf
                @method('PUT')
                
                <div class="space-y-4">
                     <div>
                        <label class="block text-sm font-bold text-primary mb-2">ID Pengiriman</label>
                        <input type="text" name="kode_pengirim" value="{{ old('kode_pengirim', $pengirim->kode_pengirim) }}" class="w-full rounded-xl border border-gray-200 bg-gray-100 px-4 py-3 text-sm font-bold text-gray-500 cursor-not-allowed" readonly>
                    </div>

                    <div>
                         <label class="block text-sm font-bold text-primary mb-2">Pilih Pesanan / Transaksi</label>
                        <select name="transaction_id" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                             @foreach($transactions as $transaction)
                                <option value="{{ $transaction->id }}" {{ old('transaction_id', $pengirim->transaction_id) == $transaction->id ? 'selected' : '' }}>
                                    {{ $transaction->transaction_code }} - {{ $transaction->customer->name ?? 'N/A' }}
                                </option>
                            @endforeach
                        </select>
                         @error('transaction_id')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2">Nama Pengirim / Kurir</label>
                         <input type="text" name="nama_pengirim" value="{{ old('nama_pengirim', $pengirim->nama_pengirim) }}" placeholder="Nama Kurir" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                         @error('nama_pengirim')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                     <div>
                         <label class="block text-sm font-bold text-primary mb-2">Status Pengiriman</label>
                         <select name="status_pengiriman" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                            <option value="Menunggu Kurir" {{ old('status_pengiriman', $pengirim->status_pengiriman) == 'Menunggu Kurir' ? 'selected' : '' }}>Menunggu Kurir</option>
                            <option value="Dalam Perjalanan" {{ old('status_pengiriman', $pengirim->status_pengiriman) == 'Dalam Perjalanan' ? 'selected' : '' }}>Dalam Perjalanan</option>
                            <option value="Terkirim" {{ old('status_pengiriman', $pengirim->status_pengiriman) == 'Terkirim' ? 'selected' : '' }}>Terkirim</option>
                             <option value="Dibatalkan" {{ old('status_pengiriman', $pengirim->status_pengiriman) == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                        @error('status_pengiriman')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                         <label class="block text-sm font-bold text-primary mb-2">Tanggal Pengiriman</label>
                        <input type="date" name="tanggal_pengiriman" value="{{ old('tanggal_pengiriman', $pengirim->tanggal_pengiriman ? $pengirim->tanggal_pengiriman->format('Y-m-d') : '') }}" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all" required>
                        @error('tanggal_pengiriman')
                            <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a href="{{ route('pengirim.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-100 px-6 py-3 text-sm font-bold text-gray-600 hover:bg-gray-200 transition-all">
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
