<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Gudang')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background antialiased font-sans overflow-hidden">
    
    <div class="flex h-screen w-full">
        <!-- SIDEBAR -->
        <aside class="w-72 flex-shrink-0 bg-primary text-white border-r border-primary/20 hidden md:flex flex-col">
            @include('partials.sidebar')
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 flex flex-col min-h-0 overflow-y-auto bg-background transition-all duration-300">
            
            <!-- Mobile Toggle (Visible only on mobile) -->
            <div class="md:hidden p-4 bg-primary text-white flex items-center justify-between">
                <span class="font-bold text-lg">WMS Warehouse</span>
                <button class="text-white hover:text-accent focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <div class="flex-1 p-6 md:p-10 max-w-7xl mx-auto w-full">
                @yield('content')
            </div>

            <!-- Footer for Dashboard -->
            <footer class="py-6 text-center text-sm font-bold text-primary/40">
                &copy; {{ date('Y') }} Warehouse Management System
            </footer>
        </main>
    </div>

    @stack('modals')
</body>
</html>
