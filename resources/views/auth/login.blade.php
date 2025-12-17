<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Gudang</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Login Page Enhanced Styles */
        .login-page {
            min-height: 100vh !important;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 25%, #00d4ff 50%, #0a7ea8 75%, #0052d4 100%) !important;
            background-size: 400% 400% !important;
            animation: gradientShift 15s ease infinite !important;
            position: relative;
            overflow: hidden;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 20px;
            margin: 0;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Removed all background effects - keeping only sliding diagonals */

        /* Sliding Diagonals Effect */
        .sliding-diagonals {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .diagonal {
            position: absolute;
            width: 200%;
            height: 4px;
            background: linear-gradient(
                90deg,
                transparent 0%,
                rgba(255, 255, 255, 0.3) 15%,
                rgba(17, 153, 142, 0.7) 30%,
                rgba(56, 239, 125, 0.8) 50%,
                rgba(0, 212, 255, 0.7) 70%,
                rgba(255, 255, 255, 0.3) 85%,
                transparent 100%
            );
            transform: rotate(45deg);
            transform-origin: center;
            box-shadow: 0 0 15px rgba(17, 153, 142, 0.5), 0 0 30px rgba(0, 212, 255, 0.3);
        }

        .diagonal-1 {
            top: -100px;
            left: -50%;
            animation: slideDiagonal1 8s linear infinite;
        }

        .diagonal-2 {
            top: 0;
            left: -50%;
            animation: slideDiagonal2 10s linear infinite;
            animation-delay: -2s;
        }

        .diagonal-3 {
            top: 100px;
            left: -50%;
            animation: slideDiagonal3 12s linear infinite;
            animation-delay: -4s;
        }

        .diagonal-4 {
            top: 200px;
            left: -50%;
            animation: slideDiagonal4 9s linear infinite;
            animation-delay: -1s;
        }

        .diagonal-5 {
            top: 300px;
            left: -50%;
            animation: slideDiagonal5 11s linear infinite;
            animation-delay: -3s;
        }

        @keyframes slideDiagonal1 {
            0% {
                transform: translateX(0) translateY(0) rotate(45deg);
            }
            100% {
                transform: translateX(100vw) translateY(100vh) rotate(45deg);
            }
        }

        @keyframes slideDiagonal2 {
            0% {
                transform: translateX(0) translateY(0) rotate(45deg);
            }
            100% {
                transform: translateX(100vw) translateY(100vh) rotate(45deg);
            }
        }

        @keyframes slideDiagonal3 {
            0% {
                transform: translateX(0) translateY(0) rotate(45deg);
            }
            100% {
                transform: translateX(100vw) translateY(100vh) rotate(45deg);
            }
        }

        @keyframes slideDiagonal4 {
            0% {
                transform: translateX(0) translateY(0) rotate(45deg);
            }
            100% {
                transform: translateX(100vw) translateY(100vh) rotate(45deg);
            }
        }

        @keyframes slideDiagonal5 {
            0% {
                transform: translateX(0) translateY(0) rotate(45deg);
            }
            100% {
                transform: translateX(100vw) translateY(100vh) rotate(45deg);
            }
        }

        .login-page::before {
            animation: patternMove 10s linear infinite, pulseOverlay 6s ease-in-out infinite;
        }

        @keyframes pulseOverlay {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }

        @keyframes floatMove {
            0% { 
                transform: translate(0, 0) rotate(0deg) scale(1);
            }
            20% { 
                transform: translate(50px, -60px) rotate(72deg) scale(1.1);
            }
            40% { 
                transform: translate(100px, -30px) rotate(144deg) scale(0.9);
            }
            60% { 
                transform: translate(80px, 20px) rotate(216deg) scale(1.05);
            }
            80% { 
                transform: translate(30px, 40px) rotate(288deg) scale(0.95);
            }
            100% { 
                transform: translate(0, 0) rotate(360deg) scale(1);
            }
        }

        .login-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 450px;
            margin: 0 !important;
            padding: 0 !important;
        }

        .login-form {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.2);
            animation: slideUp 0.6s ease-out;
            position: relative;
            overflow: hidden;
        }

        .login-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #11998e 0%, #38ef7d 25%, #00d4ff 50%, #0a7ea8 75%, #0052d4 100%);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 50%, #00d4ff 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
            box-shadow: 0 10px 30px rgba(17, 153, 142, 0.5), 0 0 20px rgba(0, 212, 255, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .login-title {
            color: #2c3e50;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .login-subtitle {
            color: #7f8c8d;
            font-size: 14px;
            margin-top: 0;
        }

        .login-form .form-group {
            margin-bottom: 25px;
        }

        .login-form .form-group label {
            display: block;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .login-form .form-group input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
            background: #FFFFFF;
        }

        .login-form .form-group input:focus {
            outline: none;
            border-color: #00d4ff;
            background: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(0, 212, 255, 0.2), 0 0 15px rgba(56, 239, 125, 0.1);
        }

        .login-form .form-group input::placeholder {
            color: #95a5a6;
        }

        .error-message {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #e74c3c;
            font-size: 14px;
            animation: shake 0.5s;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        .login-actions {
            margin-top: 30px;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 50%, #00d4ff 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(17, 153, 142, 0.5), 0 0 30px rgba(0, 212, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .login-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(17, 153, 142, 0.6), 0 0 40px rgba(0, 212, 255, 0.4);
            background: linear-gradient(135deg, #38ef7d 0%, #00d4ff 50%, #0a7ea8 100%);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .login-info {
            color: #7f8c8d;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .back-to-landing {
            color: #00d4ff;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .back-to-landing:hover {
            color: #38ef7d;
        }

        .back-to-landing::before {
            content: '←';
            font-size: 18px;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-form {
                padding: 40px 30px;
                border-radius: 15px;
            }

            .login-title {
                font-size: 24px;
            }

            .login-icon {
                width: 60px;
                height: 60px;
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="login-page">
        <!-- Sliding Diagonals Background Effect -->
        <div class="sliding-diagonals">
            <div class="diagonal diagonal-1"></div>
            <div class="diagonal diagonal-2"></div>
            <div class="diagonal diagonal-3"></div>
            <div class="diagonal diagonal-4"></div>
            <div class="diagonal diagonal-5"></div>
        </div>
        
        <div class="login-content">
            <div class="login-form">
                <div class="login-header">
                    <div class="login-icon">📦</div>
                    <h2 class="login-title">Masuk ke Akun Anda</h2>
                    <p class="login-subtitle">Selamat datang kembali!</p>
                </div>

                @if($errors->any())
                    <div class="error-message">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            value="{{ old('email') }}" 
                            placeholder="Masukkan email Anda" 
                            required
                            autocomplete="email"
                        >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            placeholder="Masukkan password Anda" 
                            required
                            autocomplete="current-password"
                        >
                    </div>
                    <div class="form-actions login-actions">
                        <button type="submit" class="btn-primary login-btn">Masuk</button>
                    </div>
                </form>

                <div class="login-footer">
                    <div class="login-info">
                        <p>Demo Sistem Manajemen Gudang</p>
                    </div>
                    <a href="{{ route('landing') }}" class="back-to-landing">Kembali ke Halaman Utama</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
