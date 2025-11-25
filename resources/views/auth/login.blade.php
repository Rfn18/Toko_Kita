<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoKita - Masuk & Daftar</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #e3f2fd 0%, #f8f9fa 100%);
        min-height: 100vh;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 480px;
    }

    .auth-card {
        background: white;
        border-radius: 25px;
        padding: 50px 40px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
    }

    /* Logo Section */
    .logo-section {
        text-align: center;
        margin-bottom: 40px;
    }

    .logo {
        font-size: 60px;
        margin-bottom: 15px;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .container-logo {
        text-align: center;
        margin-bottom: 40px;
    }

    .logo-text {
        font-size: 28px;
        font-weight: bold;
        background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .logo-tagline {
        font-size: 14px;
        color: #999;
        margin-top: 5px;
    }

    /* Title */
    .auth-title {
        font-size: 32px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .auth-subtitle {
        font-size: 15px;
        color: #666;
        margin-bottom: 35px;
    }

    /* Form Group */
    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .input-wrapper {
        position: relative;
    }

    .form-input {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s;
        background: white;
    }

    .form-input:focus {
        outline: none;
        border-color: #4a90e2;
        box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
    }

    .form-input.error {
        border-color: #ff6b6b;
    }

    .input-icon {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: #999;
    }

    .form-input.with-icon {
        padding-left: 50px;
    }

    .password-toggle {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        cursor: pointer;
        user-select: none;
    }

    .form-input.with-toggle {
        padding-right: 50px;
    }

    /* Forgot Password */
    .forgot-password {
        text-align: right;
        margin-top: -15px;
        margin-bottom: 25px;
    }

    .forgot-password a {
        font-size: 14px;
        color: #4a90e2;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s;
    }

    .forgot-password a:hover {
        color: #357abd;
    }

    /* Checkbox */
    .checkbox-group {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 25px;
    }

    .checkbox-input {
        width: 20px;
        height: 20px;
        cursor: pointer;
        accent-color: #4a90e2;
    }

    .checkbox-label {
        font-size: 14px;
        color: #666;
        line-height: 1.5;
    }

    .checkbox-label a {
        color: #4a90e2;
        text-decoration: none;
        font-weight: 500;
    }

    /* Buttons */
    .btn-primary {
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(74, 144, 226, 0.4);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    /* Divider */
    .divider {
        display: flex;
        align-items: center;
        margin: 30px 0;
    }

    .divider-line {
        flex: 1;
        height: 1px;
        background: #e0e0e0;
    }

    .divider-text {
        padding: 0 15px;
        font-size: 14px;
        color: #999;
        font-weight: 500;
    }

    /* Social Button */
    .btn-social {
        width: 100%;
        padding: 14px;
        background: white;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .btn-social:hover {
        border-color: #4a90e2;
        background: #f8f9fa;
    }

    .social-icon {
        font-size: 20px;
    }

    /* Footer Link */
    .auth-footer {
        text-align: center;
        margin-top: 30px;
        font-size: 15px;
        color: #666;
    }

    .auth-footer a {
        color: #4a90e2;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s;
    }

    .auth-footer a:hover {
        color: #357abd;
    }

    /* Success Message */
    .success-message {
        background: #e8f5e9;
        border: 2px solid #4caf50;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 25px;
        display: none;
        align-items: center;
        gap: 10px;
        color: #2e7d32;
    }

    .success-message.show {
        display: flex;
    }

    .success-icon {
        font-size: 24px;
    }

    /* Error Message */
    .error-message {
        background: #ffebee;
        border: 2px solid #ff6b6b;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 25px;
        display: none;
        align-items: center;
        gap: 10px;
        color: #c62828;
    }

    .error-message.show {
        display: flex;
    }

    /* Loading State */
    .btn-primary.loading {
        position: relative;
        color: transparent;
    }

    .btn-primary.loading::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        left: 50%;
        margin-left: -10px;
        margin-top: -10px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }


    @media (min-width: 786px) {
        body {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .logo-section {
            position: sticky;
            top: 50%;
            height: 100dvh;
        }
    }

    /* Responsive */
    @media (max-width: 480px) {
        .auth-card {
            padding: 40px 30px;
        }

        .auth-title {
            font-size: 28px;
        }

        .logo {
            font-size: 50px;
        }

        .logo-text {
            font-size: 24px;
        }
    }

    /* Illustration */
    .illustration {
        text-align: center;
        margin-bottom: 20px;
        font-size: 100px;
        opacity: 0.9;
    }
</style>

<body>
    <div class="logo-section">
        <div class="illustration">👋</div>
        <h1 class="auth-title">Masuk</h1>
        <p class="auth-subtitle">Selamat datang kembali! Silakan masuk ke akun Anda.</p>
    </div>
    <div class="container">
        <!-- Login Page -->
        <div class="page active" id="loginPage">
            <div class="auth-card">
                <div class="container-logo">
                    <div class="logo">🏪</div>
                    <div class="logo-text">TokoKita</div>
                    <div class="logo-tagline">Platform UMKM Modern</div>
                </div>

                <div class="success-message" id="loginSuccess">
                    <span class="success-icon">✓</span>
                    <span>Pendaftaran berhasil! Silakan masuk.</span>
                </div>

                <div class="error-message" id="loginError">
                    <span class="success-icon">⚠️</span>
                    <span>Email atau password salah!</span>
                </div>

                <form id="loginForm" action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="input-wrapper">
                            <span class="input-icon">📧</span>
                            <input type="text" class="form-input with-icon" placeholder="contoh@email.com"
                                id="loginEmail" name="email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-wrapper">
                            <span class="input-icon">🔒</span>
                            <input type="password" class="form-input with-icon with-toggle"
                                placeholder="Masukkan password Anda" id="loginPassword" name="password" required>
                            <span class="password-toggle" data-target="loginPassword">👁️</span>
                        </div>
                    </div>

                    <div class="forgot-password">
                        <a href="#" id="forgotPasswordLink">Lupa Password?</a>
                    </div>

                    <button type="submit" class="btn-primary" id="loginBtn">
                        Masuk
                    </button>
                </form>

                <div class="divider">
                    <div class="divider-line"></div>
                    <div class="divider-text">atau</div>
                    <div class="divider-line"></div>
                </div>

                <button class="btn-social">
                    <span class="social-icon">🔍</span>
                    Masuk dengan Google
                </button>

                <button class="btn-social">
                    <span class="social-icon">📱</span>
                    Masuk dengan WhatsApp
                </button>

                <div class="auth-footer">
                    Belum punya akun? <a href="{{ route('register') }}" id="toRegister">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
