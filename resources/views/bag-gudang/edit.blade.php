@extends('layouts.app')

@section('title', 'Edit Bag Gudang - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Edit Bag Gudang</h1>
        <p>Edit data pengelola gudang</p>
    </div>

    <div class="form-container">
        <form action="{{ route('bag-gudang.update', $bagGudang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_bag_gudang">ID Bag Gudang</label>
                <input type="text" name="kode_bag_gudang" id="kode_bag_gudang" value="{{ old('kode_bag_gudang', $bagGudang->kode_bag_gudang) }}" placeholder="Contoh: BG006" required>
                @error('kode_bag_gudang')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $bagGudang->nama) }}" placeholder="Nama Bag Gudang" required>
                @error('nama')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $bagGudang->email) }}" placeholder="Email" required>
                @error('email')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" placeholder="Alamat lengkap" required>{{ old('alamat', $bagGudang->alamat) }}</textarea>
                @error('alamat')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_telepon">No. Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon', $bagGudang->no_telepon) }}" placeholder="Nomor telepon" required>
                @error('no_telepon')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password <small style="color: #6c757d;">(Kosongkan jika tidak ingin mengubah password)</small></label>
                <div style="position: relative;">
                    <input type="password" name="password" id="password" placeholder="Password baru" style="padding-right: 40px;">
                    <button type="button" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; padding: 5px;">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('bag-gudang.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5a7 7 0 0 1-1.808-.19l1.907 1.907A6 6 0 0 0 8 9.5v-1a6 6 0 0 0-1.464.098l2.41 2.41z"/><path d="M11.297 9.176a3 3 0 0 0-4.081-4.081l4.081 4.081z"/><path d="M2.853 18.39A13 13 0 0 1 1.172 8l3.993 3.993c.03-.04.062-.078.098-.115l4.435 4.435c.146-.059.286-.128.418-.207m5.66-13.66 1.415 1.415L15.812 8l-1.415-1.415L11.297 9.176zm-7.071 7.072 1.415 1.415L8.812 8l-1.415-1.415L4.242 11.707z"/>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>';
            }
        });
    </script>
@endsection
