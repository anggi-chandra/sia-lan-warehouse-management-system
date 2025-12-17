@extends('layouts.app')

@section('title', 'Data Bag Admin - Sistem Manajemen Gudang')

@section('content')
    <div class="page-header">
        <h1>Data Bag Admin</h1>
        <p>Kelola data administrator sistem</p>
    </div>

    <div class="table-container">
        <div class="table-header">
            <h2>Daftar Bag Admin</h2>
            <a href="{{ route('bag-admin.create') }}" class="btn-add">Tambah Bag Admin</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Admin</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bagAdmins as $bagAdmin)
                <tr>
                    <td>{{ $bagAdmin->kode_admin }}</td>
                    <td>{{ $bagAdmin->nama_admin }}</td>
                    <td>{{ $bagAdmin->email }}</td>
                    <td>{{ $bagAdmin->no_telepon }}</td>
                    <td>
                        @if($bagAdmin->user)
                            <span class="status-aktif">Aktif</span>
                        @else
                            <span class="status-tidak-aktif">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('bag-admin.show', $bagAdmin->id) }}" class="btn-view"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
</svg></a>
                        <a href="{{ route('bag-admin.edit', $bagAdmin->id) }}" class="btn-edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a>
                        <form action="{{ route('bag-admin.destroy', $bagAdmin->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini? Akun user juga akan dihapus.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data bag admin</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <style>
        .status-aktif {
            background-color: #28a745;
            color: white;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-tidak-aktif {
            background-color: #dc3545;
            color: white;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
    </style>
@endsection
