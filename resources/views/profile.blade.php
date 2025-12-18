@extends('layouts.app')

@section('title', 'Profil User - Sistem Manajemen Gudang')

@section('content')
    <div class="mb-10">
        <h1 class="text-3xl font-extrabold text-primary tracking-tight">Profil User</h1>
        <p class="text-primary/60 font-medium mt-1">Kelola informasi profil Anda di sini.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-xl bg-green-50 p-4 border border-green-100 flex items-center gap-3 text-green-700 shadow-sm">
            <i class="fas fa-check-circle text-xl"></i>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Profile Card -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5">
                    <i class="fas fa-id-card text-9xl text-primary"></i>
                </div>
                
                <div class="flex flex-col sm:flex-row items-center gap-6 mb-8 border-b border-gray-100 pb-8 relative z-10">
                    <div class="h-24 w-24 rounded-full bg-secondary flex items-center justify-center text-white font-extrabold text-3xl shadow-lg ring-4 ring-white">
                        {{ substr($user->name ?? 'U', 0, 1) }}
                    </div>
                    <div class="text-center sm:text-left">
                        <h2 class="text-2xl font-extrabold text-primary">{{ $user->name }}</h2>
                        <p class="text-primary/60 font-medium flex items-center justify-center sm:justify-start gap-2 mt-1">
                            <i class="fas fa-envelope"></i> {{ $user->email }}
                        </p>
                        <span class="inline-flex mt-3 items-center px-3 py-1 rounded-full text-xs font-bold bg-secondary/10 text-secondary border border-secondary/20">
                            {{ $bagAdmin ? 'Administrator' : 'User Standard' }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12 relative z-10">
                     @if($bagAdmin)
                    <div>
                        <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">ID Admin</label>
                        <p class="font-bold text-primary text-lg">{{ $bagAdmin->kode_admin }}</p>
                    </div>
                    @endif
                    
                     @if($bagAdmin)
                    <div>
                        <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Nomor Telepon</label>
                        <p class="font-bold text-primary text-lg">{{ $bagAdmin->no_telepon }}</p>
                    </div>
                    <div class="md:col-span-2">
                         <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Alamat</label>
                         <p class="font-bold text-primary text-lg">{{ $bagAdmin->alamat }}</p>
                    </div>
                    @endif
                    
                    <div>
                         <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Status Akun</label>
                         <div class="flex items-center gap-2">
                             <span class="h-3 w-3 rounded-full bg-green-500"></span>
                             <p class="font-bold text-primary">Aktif</p>
                         </div>
                    </div>
                     <div>
                         <label class="text-xs font-bold uppercase tracking-wider text-primary/40 mb-1 block">Bergabung Sejak</label>
                         <p class="font-bold text-primary">{{ $user->created_at ? $user->created_at->format('d F Y') : '-' }}</p>
                    </div>
                </div>
            </div>

             <!-- Change Password -->
             <div class="bg-white rounded-3xl shadow-sm border border-primary/5 p-8 relative overflow-hidden">
                 <div class="mb-6">
                    <h3 class="text-xl font-extrabold text-primary flex items-center gap-2">
                        <i class="fas fa-lock text-accent"></i> Ubah Password
                    </h3>
                    <p class="text-primary/60 text-sm mt-1">Pastikan password baru Anda aman dan mudah diingat.</p>
                 </div>

                @if($errors->any())
                    <div class="mb-6 rounded-xl bg-red-50 p-4 border border-red-100 text-sm text-red-700">
                        <ul class="list-disc list-inside font-bold">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profile.update-password') }}" method="POST" class="space-y-5 relative z-10">
                    @csrf
                     <div>
                        <label class="block text-sm font-bold text-primary mb-2">Password Lama</label>
                        <input type="password" name="old_password" placeholder="••••••••" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Password Baru</label>
                            <input type="password" name="new_password" placeholder="••••••••" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-primary mb-2">Konfirmasi Password</label>
                            <input type="password" name="new_password_confirmation" placeholder="••••••••" class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all">
                        </div>
                    </div>
                     <div class="flex items-center gap-4 mt-2">
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-primary/30 hover:bg-primary/90 transition-all">
                            Simpan Password
                        </button>
                    </div>
                </form>
             </div>
        </div>

        <!-- Sidebar / Actions -->
        <div class="lg:col-span-1 space-y-6">
             <!-- Logout Card -->
             <div class="bg-gradient-to-br from-red-50 to-white rounded-3xl shadow-sm border border-red-100 p-8 text-center">
                 <div class="h-16 w-16 mx-auto rounded-full bg-red-100 flex items-center justify-center text-red-500 text-2xl mb-4">
                     <i class="fas fa-sign-out-alt"></i>
                 </div>
                 <h3 class="text-xl font-extrabold text-red-600 mb-2">Logout Sesi</h3>
                 <p class="text-red-600/70 text-sm font-medium mb-6">Akhiri sesi Anda di perangkat ini dengan aman.</p>
                 
                 <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full inline-flex items-center justify-center rounded-xl bg-red-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-red-500/30 hover:bg-red-700 transition-all">
                        Keluar Sekarang
                    </button>
                </form>
             </div>
        </div>
    </div>
@endsection
