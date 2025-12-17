<div class="sidebar">
    <div class="user-profile">
        <div class="user-avatar">
            <div class="avatar-circle">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</div>
        </div>
        <div class="user-info">
            <div class="user-name">{{ Auth::user()->name ?? 'User' }}</div>
            <div class="user-role">{{ Auth::user()->bagAdmin ? 'Administrator' : 'User' }}</div>
        </div>
        <a href="{{ route('profile') }}" class="user-profile-link">Lihat Profil</a>
    </div>

    <div class="menu-group">
        <div class="menu-group-title">ADMIN</div>
        <div class="menu-group-subtitle">{{ Auth::user()->bagAdmin ? 'Administrator' : 'User' }}</div>
        <ul>
            <li><a href="{{ route('profile') }}" class="{{ Request::is('profile*') ? 'active' : '' }}">Lihat Profil</a></li>
        </ul>
    </div>

    <div class="menu-group">
        <div class="menu-group-title">DASHBOARD</div>
        <ul>
            <li><a href="{{ route('home') }}" class="{{ Request::is('dashboard') || Request::is('/') ? 'active' : '' }}">Dashboard</a></li>
        </ul>
    </div>

    <div class="menu-group">
        <div class="menu-group-title">MASTER DATA</div>
        <ul>
            <li><a href="{{ route('customer.index') }}" class="{{ Request::is('customer*') ? 'active' : '' }}">Data Customer</a></li>
            <li><a href="{{ route('bag-gudang.index') }}" class="{{ Request::is('bag-gudang*') ? 'active' : '' }}">Data Bag Gudang</a></li>
            <li><a href="{{ route('gudang.index') }}" class="{{ Request::is('gudang*') ? 'active' : '' }}">Data Gudang</a></li>
            <li><a href="{{ route('pengirim.index') }}" class="{{ Request::is('pengirim*') ? 'active' : '' }}">Data Pengirim</a></li>
        </ul>
    </div>

    <div class="menu-group">
        <div class="menu-group-title">OPERASIONAL</div>
        <ul>
            <li><a href="{{ route('persediaan.index') }}" class="{{ Request::is('persediaan*') ? 'active' : '' }}">Data Persediaan</a></li>
            <li><a href="{{ route('produksi.index') }}" class="{{ Request::is('produksi*') ? 'active' : '' }}">Data Produksi</a></li>
            <li><a href="{{ route('transaksi.index') }}" class="{{ Request::is('transaksi*') ? 'active' : '' }}">Data Transaksi</a></li>
        </ul>
    </div>

    <div class="menu-group">
        <div class="menu-group-title">ADMINISTRASI</div>
        <ul>
            <li><a href="{{ route('bag-admin.index') }}" class="{{ Request::is('bag-admin*') ? 'active' : '' }}">Data Bag Admin</a></li>
        </ul>
    </div>

    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="logout-btn">Keluar</button>
        </form>
    </div>
</div>
