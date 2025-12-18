<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Gudang - SIA LAN</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-foreground antialiased font-sans">
    
    <div class="flex min-h-screen flex-col overflow-x-hidden">
        
        <!-- Navigation (Transparent) -->
        <header class="w-full absolute top-0 z-50 py-4">
            <div class="container mx-auto flex items-center justify-between px-6">
                <a href="#" class="flex items-center space-x-2 font-extrabold text-primary hover:opacity-80 transition-opacity">
                    <i class="fas fa-boxes-stacked text-2xl text-secondary"></i>
                    <span class="text-xl tracking-tight">SIA LAN Warehouse</span>
                </a>
                <nav class="flex items-center">
                    <a href="{{ route('login') }}" class="rounded-full bg-white/30 backdrop-blur-sm px-6 py-2 text-sm font-bold text-primary hover:bg-white/50 transition-colors border border-white/20">
                        Masuk
                    </a>
                </nav>
            </div>
        </header>

        <main class="flex-1">
            <!-- Hero Section with Wave -->
            <section class="relative pt-32 pb-48 md:pt-40 md:pb-64">
                <div class="container mx-auto px-4 relative z-10 text-center">
                    <div class="inline-flex items-center rounded-full bg-white/30 backdrop-blur-sm border border-white/20 px-4 py-1.5 text-sm font-bold text-primary mb-8 shadow-sm">
                        <i class="fas fa-star text-accent mr-2"></i> Sistem Manajemen Gudang v1.0
                    </div>
                    
                    <h1 class="text-5xl font-extrabold tracking-tight sm:text-7xl text-primary mb-6 leading-tight">
                        Temukan Kemudahan <br>
                        <span class="text-secondary">Mengelola Gudang</span>
                    </h1>
                    
                    <p class="text-lg font-medium text-primary/80 leading-relaxed max-w-2xl mx-auto mb-10">
                        Kelola gudang Anda dengan cara yang menyenangkan, efisien, dan penuh warna. 
                        Data akurat, keputusan tepat.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex h-14 items-center justify-center rounded-full bg-secondary px-8 text-lg font-bold text-white shadow-lg shadow-secondary/30 transition-transform hover:scale-105 hover:bg-secondary/90">
                            Mulai Sekarang <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Bottom Wave SVG -->
                <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none rotate-180">
                    <svg class="relative block w-[calc(100%+1.3px)] h-[150px] md:h-[200px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-white"></path>
                    </svg>
                </div>
            </section>

            <!-- Features Section -->
            <section id="features" class="relative bg-white pb-20 pt-10">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-extrabold tracking-tight text-primary mb-4">Fitur Unggulan</h2>
                        <p class="text-primary/70 font-medium max-w-xl mx-auto text-lg">
                            Didesain untuk kemudahan operasional Anda.
                        </p>
                    </div>

                    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 max-w-6xl mx-auto">
                        @php
                            $features = [
                                ['icon' => 'fas fa-chart-line', 'title' => 'Stok Real-time', 'desc' => 'Pantau jumlah barang masuk dan keluar langsung.'],
                                ['icon' => 'fas fa-exchange-alt', 'title' => 'Transaksi', 'desc' => 'Catat setiap transaksi dengan mudah dan cepat.'],
                                ['icon' => 'fas fa-industry', 'title' => 'Produksi', 'desc' => 'Kelola alur produksi barang dengan teratur.'],
                                ['icon' => 'fas fa-truck-fast', 'title' => 'Pengiriman', 'desc' => 'Lacak status kiriman barang ke pelanggan.'],
                                ['icon' => 'fas fa-users', 'title' => 'Pelanggan', 'desc' => 'Simpan data kontak pelanggan Anda.'],
                                ['icon' => 'fas fa-file-invoice', 'title' => 'Laporan', 'desc' => 'Ringkasan data penting dalam satu tampilan.'],
                            ];
                        @endphp

                        @foreach($features as $feature)
                        <div class="group bg-white rounded-3xl border-2 border-[#E5E7EB] hover:border-accent p-8 transition-colors duration-300">
                            <div class="h-14 w-14 bg-blue-50 rounded-2xl flex items-center justify-center text-accent text-2xl mb-6 shadow-sm group-hover:bg-accent group-hover:text-white transition-colors duration-300">
                                <i class="{{ $feature['icon'] }}"></i>
                            </div>
                            <h3 class="text-xl font-extrabold text-primary mb-3">{{ $feature['title'] }}</h3>
                            <p class="text-primary/70 font-medium leading-relaxed">{{ $feature['desc'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Footer Wave -->
                 <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
                     <!-- Using same wave but maybe flipped or same direction? Let's use it as a footer topper -->
                </div>
            </section>

            <!-- CTA/Footer Section -->
            <section class="bg-primary pt-32 pb-12 relative overflow-hidden">
                 <!-- Wave Top of Footer -->
                <div class="absolute top-0 left-0 w-full overflow-hidden leading-none">
                    <svg class="relative block w-[calc(100%+1.3px)] h-[80px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-white"></path>
                    </svg>
                </div>

                <div class="container mx-auto px-4 text-center relative z-10">
                    <h2 class="text-3xl font-extrabold tracking-tight text-white mb-8">
                        Siap Menggunakan?
                    </h2>
                    <a href="{{ route('login') }}" class="inline-flex h-14 items-center justify-center rounded-full bg-accent px-10 text-lg font-bold text-primary shadow-lg transition-transform hover:scale-105 hover:bg-accent/90">
                        Masuk Dashboard
                    </a>
                    
                    <div class="mt-20 border-t border-white/10 pt-8">
                         <p class="text-sm text-white/60 font-medium">
                            &copy; {{ date('Y') }} SIA LAN Warehouse. Designed with ❤️
                        </p>
                    </div>
                </div>
                
                <!-- Decorative Circles in Footer -->
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-secondary/20 rounded-full blur-3xl"></div>
                <div class="absolute top-1/2 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl"></div>
            </section>
        </main>
    </div>
</body>
</html>
