<div class="flex-1 flex flex-col h-full">
    <!-- Brand -->
    <div class="h-20 flex items-center px-8 border-b border-white/10">
        <div class="flex items-center gap-3 text-white font-extrabold text-xl tracking-tight">
            <i class="fas fa-boxes-stacked text-secondary text-2xl"></i>
            <span>SIA LAN</span>
        </div>
    </div>

    <!-- User Profile Summary -->
    <div class="px-6 py-8 border-b border-white/10 bg-primary/50">
        <div class="flex items-center gap-4">
            <div class="h-12 w-12 rounded-full bg-secondary flex items-center justify-center text-white font-bold text-lg shadow-lg">
                {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
            </div>
            <div class="flex-1 overflow-hidden">
                <h3 class="text-white font-bold truncate">{{ Auth::user()->name ?? 'User' }}</h3>
                <p class="text-xs text-white/50 font-medium truncate">{{ Auth::user()->bagAdmin ? 'Administrator' : 'Staff Gudang' }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-8">
        
        <!-- Group: Start -->
        <div>
            <div class="px-4 mb-2 text-xs font-bold uppercase tracking-wider text-white/40">Utama</div>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ Request::is('dashboard') || Request::is('home') ? 'bg-secondary text-white shadow-md shadow-secondary/20' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-home w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ Request::is('profile*') ? 'bg-secondary text-white shadow-md shadow-secondary/20' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-user-circle w-5 text-center"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Group: Master Data -->
        <div>
            <div class="px-4 mb-2 text-xs font-bold uppercase tracking-wider text-white/40">Master Data</div>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('customer.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ Request::routeIs('customer.*') ? 'bg-secondary text-white shadow-md shadow-secondary/20' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span>Customer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('bag-gudang.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ Request::routeIs('bag-gudang.*') ? 'bg-secondary text-white shadow-md shadow-secondary/20' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-warehouse w-5 text-center"></i>
                        <span>Bagian Gudang</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('gudang.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ Request::routeIs('gudang.*') ? 'bg-secondary text-white shadow-md shadow-secondary/20' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-building w-5 text-center"></i>
                        <span>Lokasi Gudang</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengirim.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ Request::routeIs('pengirim.*') ? 'bg-secondary text-white shadow-md shadow-secondary/20' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-truck w-5 text-center"></i>
                        <span>Pengirim</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Group: Operasional -->
        <div>
            <div class="px-4 mb-2 text-xs font-bold uppercase tracking-wider text-white/40">Operasional</div>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('persediaan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ Request::routeIs('persediaan.*') ? 'bg-secondary text-white shadow-md shadow-secondary/20' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-box w-5 text-center"></i>
                        <span>Stok Barang</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('produksi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ Request::routeIs('produksi.*') ? 'bg-secondary text-white shadow-md shadow-secondary/20' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-industry w-5 text-center"></i>
                        <span>Produksi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaksi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ Request::routeIs('transaksi.*') ? 'bg-secondary text-white shadow-md shadow-secondary/20' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-exchange-alt w-5 text-center"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
            </ul>
        </div>

         <!-- Group: Administrasi -->
         <div>
            <div class="px-4 mb-2 text-xs font-bold uppercase tracking-wider text-white/40">System</div>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('bag-admin.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all {{ Request::routeIs('bag-admin.*') ? 'bg-secondary text-white shadow-md shadow-secondary/20' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-user-shield w-5 text-center"></i>
                        <span>Admin</span>
                    </a>
                </li>
            </ul>
        </div>

    </nav>

    <!-- Logout -->
    <div class="p-6 border-t border-white/10">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl text-sm font-bold bg-white/5 text-white hover:bg-red-500/10 hover:text-red-400 transition-all border border-white/5 hover:border-red-500/20">
                <i class="fas fa-sign-out-alt"></i>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</div>
