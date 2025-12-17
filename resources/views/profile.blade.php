@extends('layouts.app')

@section('title', 'Profil User - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Profil User</h1>
        <p>Kelola informasi profil Anda</p>
    </div>

    <div class="table-container">
        <div class="table-header">
            <h2>Informasi Profil</h2>
        </div>
        <div style="padding: 30px;">
            @if(session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="detail-grid">
                @if($bagAdmin)
                <div class="detail-item">
                    <label>ID Admin</label>
                    <p>{{ $bagAdmin->kode_admin }}</p>
                </div>
                @endif
                <div class="detail-item">
                    <label>Nama Lengkap</label>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="detail-item">
                    <label>Email</label>
                    <p>{{ $user->email }}</p>
                </div>
                @if($bagAdmin)
                <div class="detail-item">
                    <label>Nomor Telepon</label>
                    <p>{{ $bagAdmin->no_telepon }}</p>
                </div>
                <div class="detail-item">
                    <label>Alamat</label>
                    <p>{{ $bagAdmin->alamat }}</p>
                </div>
                @endif
                <div class="detail-item">
                    <label>Jabatan</label>
                    <p>{{ $bagAdmin ? 'Administrator' : 'User' }}</p>
                </div>
                <div class="detail-item">
                    <label>Status</label>
                    <p><span class="status-tersedia">Aktif</span></p>
                </div>
                <div class="detail-item">
                    <label>Tanggal Bergabung</label>
                    <p>{{ $user->created_at ? $user->created_at->format('d F Y') : '-' }}</p>
                </div>
            </div>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #ecf0f1;">
                <h3 style="color: #2c3e50; margin-bottom: 20px;">Ubah Password</h3>
                @if($errors->any())
                    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('profile.update-password') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" name="old_password" placeholder="Masukkan password lama" required>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="new_password" placeholder="Masukkan password baru" required>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="new_password_confirmation" placeholder="Konfirmasi password baru" required>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn-primary">Ubah Password</button>
                        <button type="reset" class="btn-secondary">Reset</button>
                    </div>
                </form>
            </div>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #ecf0f1;">
                <h3 style="color: #2c3e50; margin-bottom: 20px;">Keluar dari Sistem</h3>
                <p style="color: #7f8c8d; margin-bottom: 15px;">Anda akan keluar dari sistem dan harus login
                    kembali untuk mengakses aplikasi.</p>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-danger" style="display: inline-block; text-decoration: none; border: none; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
