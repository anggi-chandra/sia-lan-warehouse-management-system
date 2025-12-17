<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Gudang - SIA LAN</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Landing Page Styles */
        .landing-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .landing-page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="100" height="100" patternUnits="userSpaceOnUse"><path d="M 100 0 L 0 0 0 100" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .landing-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        /* Navigation */
        .landing-nav {
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .landing-logo {
            font-size: 24px;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .landing-nav-buttons {
            display: flex;
            gap: 15px;
        }

        .btn-landing {
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-landing-outline {
            background: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-landing-outline:hover {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .btn-landing-solid {
            background: white;
            color: #667eea;
            border: 2px solid white;
        }

        .btn-landing-solid:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Hero Section */
        .hero-section {
            text-align: center;
            padding: 80px 0 100px;
            color: white;
        }

        .hero-title {
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
            animation: fadeInUp 0.8s ease;
        }

        .hero-subtitle {
            font-size: 22px;
            margin-bottom: 40px;
            opacity: 0.95;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            animation: fadeInUp 1s ease;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
            animation: fadeInUp 1.2s ease;
        }

        /* Features Section */
        .features-section {
            background: white;
            padding: 80px 0;
            margin-top: -50px;
            border-radius: 50px 50px 0 0;
            position: relative;
            z-index: 2;
        }

        .section-title {
            text-align: center;
            font-size: 36px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .section-subtitle {
            text-align: center;
            font-size: 18px;
            color: #7f8c8d;
            margin-bottom: 60px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .feature-card {
            background: #f8f9fa;
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-color: #667eea;
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 20px;
            display: block;
        }

        .feature-title {
            font-size: 22px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .feature-description {
            font-size: 15px;
            color: #7f8c8d;
            line-height: 1.6;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            padding: 80px 0;
            text-align: center;
            color: white;
        }

        .cta-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .cta-subtitle {
            font-size: 20px;
            opacity: 0.9;
            margin-bottom: 40px;
        }

        /* Footer */
        .landing-footer {
            background: #1a252f;
            padding: 30px 0;
            text-align: center;
            color: #95a5a6;
            font-size: 14px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 36px;
            }

            .hero-subtitle {
                font-size: 18px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-landing {
                width: 100%;
                max-width: 300px;
            }

            .landing-nav {
                flex-direction: column;
                gap: 20px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="landing-page">
        <div class="landing-container">
            <!-- Navigation -->
            <nav class="landing-nav">
                <a href="#" class="landing-logo">📦 SIA LAN Warehouse</a>
                <div class="landing-nav-buttons">
                    <a href="{{ route('login') }}" class="btn-landing btn-landing-outline">Masuk</a>
                </div>
            </nav>

            <!-- Hero Section -->
            <div class="hero-section">
                <h1 class="hero-title">Kelola Gudang Anda<br>Dengan Lebih Mudah</h1>
                <p class="hero-subtitle">
                    Sistem Manajemen Gudang yang terintegrasi untuk mengelola persediaan, 
                    transaksi, produksi, dan pengiriman dengan efisien dan akurat.
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('login') }}" class="btn-landing btn-landing-solid">Mulai Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="features-section">
            <div class="landing-container">
                <h2 class="section-title">Fitur Unggulan</h2>
                <p class="section-subtitle">
                    Solusi lengkap untuk manajemen gudang modern
                </p>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <span class="feature-icon">📊</span>
                        <h3 class="feature-title">Manajemen Persediaan</h3>
                        <p class="feature-description">
                            Pantau stok barang secara real-time dengan sistem yang terintegrasi 
                            dan mudah digunakan.
                        </p>
                    </div>

                    <div class="feature-card">
                        <span class="feature-icon">🔄</span>
                        <h3 class="feature-title">Transaksi Terintegrasi</h3>
                        <p class="feature-description">
                            Kelola semua transaksi masuk dan keluar dengan sistem yang 
                            otomatis dan akurat.
                        </p>
                    </div>

                    <div class="feature-card">
                        <span class="feature-icon">🏭</span>
                        <h3 class="feature-title">Manajemen Produksi</h3>
                        <p class="feature-description">
                            Pantau proses produksi dari awal hingga selesai dengan 
                            detail yang lengkap.
                        </p>
                    </div>

                    <div class="feature-card">
                        <span class="feature-icon">🚚</span>
                        <h3 class="feature-title">Tracking Pengiriman</h3>
                        <p class="feature-description">
                            Lacak status pengiriman barang dengan mudah dan dapatkan 
                            notifikasi real-time.
                        </p>
                    </div>

                    <div class="feature-card">
                        <span class="feature-icon">👥</span>
                        <h3 class="feature-title">Manajemen Customer</h3>
                        <p class="feature-description">
                            Kelola data customer dengan sistem yang terorganisir dan 
                            mudah diakses.
                        </p>
                    </div>

                    <div class="feature-card">
                        <span class="feature-icon">📈</span>
                        <h3 class="feature-title">Dashboard Analytics</h3>
                        <p class="feature-description">
                            Lihat ringkasan data penting dalam satu dashboard yang 
                            informatif dan mudah dipahami.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <div class="landing-container">
                <h2 class="cta-title">Siap Memulai?</h2>
                <p class="cta-subtitle">
                    Daftar sekarang dan rasakan kemudahan mengelola gudang Anda
                </p>
                <a href="{{ route('login') }}" class="btn-landing btn-landing-solid">Masuk ke Sistem</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="landing-footer">
            <div class="landing-container">
                <p>&copy; {{ date('Y') }} SIA LAN Warehouse Management System. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>

