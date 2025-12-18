<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Gudang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-background relative overflow-hidden">
    
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[500px] h-[500px] bg-white/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[400px] h-[400px] bg-secondary/10 rounded-full blur-3xl"></div>

    <div class="w-full max-w-md space-y-8 px-4 relative z-10">
        <!-- Header -->
        <div class="text-center space-y-2">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-white shadow-sm text-accent mb-4 transform hover:scale-110 transition-transform">
                <i class="fas fa-box-open text-3xl"></i>
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight text-primary">Selamat Datang</h1>
            <p class="text-base font-medium text-primary/70">Silakan masuk ke akun Anda</p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-3xl border-0 shadow-xl p-10">
            <!-- Validation Errors -->
            @if($errors->any())
                <div class="mb-6 rounded-xl bg-red-50 p-4 text-sm font-bold text-red-600 border border-red-100 flex items-center">
                    <i class="fas fa-circle-exclamation mr-2"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label for="email" class="text-sm font-extrabold text-primary ml-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-primary/40">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required 
                            autofocus
                            class="flex h-12 w-full rounded-xl border border-gray-200 bg-gray-50 pl-10 pr-3 py-2 text-sm font-bold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all hover:bg-white"
                            placeholder="nama@email.com"
                        >
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label for="password" class="text-sm font-extrabold text-primary ml-1">Password</label>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-primary/40">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            class="flex h-12 w-full rounded-xl border border-gray-200 bg-gray-50 pl-10 pr-3 py-2 text-sm font-bold placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all hover:bg-white"
                            placeholder="••••••••"
                        >
                    </div>
                </div>

                <div class="flex items-center space-x-2 ml-1">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember" 
                        class="h-5 w-5 rounded border-gray-300 text-secondary focus:ring-secondary"
                    >
                    <label for="remember" class="text-sm font-bold text-primary/80">Ingat saya</label>
                </div>

                <button type="submit" class="w-full inline-flex h-12 items-center justify-center rounded-xl bg-secondary px-4 text-base font-extrabold text-white shadow-lg shadow-secondary/20 hover:bg-secondary/90 hover:scale-[1.02] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-secondary focus-visible:ring-offset-2 transition-all">
                    Masuk
                </button>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center text-sm font-bold text-primary/60">
            <a href="{{ route('landing') }}" class="hover:text-secondary transition-colors inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
            </a>
        </p>
    </div>
</body>
</html>
