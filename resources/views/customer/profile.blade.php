<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Profil Saya - TokoKita</title>
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
            max-width: 900px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            background: white;
            border-radius: 20px;
            padding: 25px 30px;
            margin-bottom: 25px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .back-btn {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: #f8f9fa;
            border: none;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .back-btn:hover {
            background: #e0e0e0;
        }

        .header-title {
            font-size: 28px;
            font-weight: 600;
            color: #2c3e50;
        }

        .edit-profile-btn {
            background: #e3f2fd;
            color: #4a90e2;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .edit-profile-btn:hover {
            background: #4a90e2;
            color: white;
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 25px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .profile-avatar-container {
            position: relative;
            display: inline-block;
            margin-bottom: 25px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            box-shadow: 0 4px 20px rgba(74, 144, 226, 0.3);
            border: 5px solid white;
        }

        .avatar-badge {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #4caf50;
            border: 4px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .profile-name {
            font-size: 26px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .profile-email {
            font-size: 15px;
            color: #666;
            margin-bottom: 20px;
        }

        .profile-stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #4a90e2;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 13px;
            color: #999;
        }

        /* Menu Section */
        .menu-section {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-left: 5px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 18px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 8px;
        }

        .menu-item:hover {
            background: #f8f9fa;
        }

        .menu-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .menu-icon.blue {
            background: #e3f2fd;
        }

        .menu-icon.orange {
            background: #fff3e0;
        }

        .menu-icon.green {
            background: #e8f5e9;
        }

        .menu-icon.purple {
            background: #f3e5f5;
        }

        .menu-icon.red {
            background: #ffebee;
        }

        .menu-content {
            flex: 1;
        }

        .menu-title {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 3px;
        }

        .menu-subtitle {
            font-size: 13px;
            color: #999;
        }

        .menu-arrow {
            font-size: 18px;
            color: #999;
        }

        /* Logout Button */
        .logout-section {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        }

        .btn-logout {
            width: 100%;
            background: linear-gradient(135deg, #f44336 0%, #e57373 100%);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(244, 67, 54, 0.3);
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(244, 67, 54, 0.4);
        }

        .btn-logout:active {
            transform: translateY(0);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s;
        }

        .modal.show {
            display: flex;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 450px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            animation: slideUp 0.3s;
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

        .modal-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .modal-text {
            font-size: 15px;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
        }

        .btn-cancel {
            flex: 1;
            padding: 14px;
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            color: #666;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            border-color: #666;
        }

        .btn-confirm {
            flex: 1;
            padding: 14px;
            background: #f44336;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-confirm:hover {
            background: #d32f2f;
        }

        /* Toast */
        .toast {
            position: fixed;
            top: 30px;
            right: 30px;
            background: white;
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            display: none;
            align-items: center;
            gap: 12px;
            z-index: 2000;
            animation: slideInRight 0.3s;
        }

        .toast.show {
            display: flex;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(400px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .toast-icon {
            font-size: 24px;
        }

        .toast-message {
            font-size: 14px;
            font-weight: 500;
            color: #2c3e50;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .header {
                padding: 20px;
            }

            .header-title {
                font-size: 24px;
            }

            .profile-card {
                padding: 30px 20px;
            }

            .profile-avatar {
                width: 100px;
                height: 100px;
                font-size: 42px;
            }

            .profile-name {
                font-size: 22px;
            }

            .profile-stats {
                gap: 25px;
            }

            .stat-value {
                font-size: 20px;
            }

            .menu-section {
                padding: 20px;
            }

            .menu-item {
                padding: 15px;
            }

            .toast {
                right: 15px;
                left: 15px;
            }

            .modal-content {
                padding: 30px 25px;
            }
        }

        @media (max-width: 480px) {
            .back-btn {
                width: 40px;
                height: 40px;
            }

            .edit-profile-btn {
                padding: 8px 16px;
                font-size: 13px;
            }

            .profile-stats {
                flex-direction: column;
                gap: 15px;
            }

            .modal-actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <button class="back-btn" onclick="goBack()">←</button>
                <h1 class="header-title">Profil Saya</h1>
            </div>
            <div class="logo">🏪 TokoKita</div>
        </div>

        <!-- Profile Card -->
        <div class="profile-card">
            <div class="profile-avatar-container">
                <div class="profile-avatar">👤</div>
                <div class="avatar-badge">✓</div>
            </div>
            <h2 class="profile-name">{{ $user->name }}</h2>
            <p class="profile-email">{{ $user->email }}</p>

            <div class="profile-stats">
                <div class="stat-item">
                    <div class="stat-value">24</div>
                    <div class="stat-label">Keranjang</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">8</div>
                    <div class="stat-label">Pesanan</div>
                </div>
            </div>
        </div>

        <!-- Logout Section -->
        <div class="logout-section">
            <button class="btn-logout" onclick="showLogoutModal()">
                <i class="fa-solid fa-door-open"></i>
                <span>Keluar dari Akun</span>
            </button>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal" id="logoutModal">
        <div class="modal-content">
            <div class="modal-icon">👋</div>
            <h3 class="modal-title">Keluar dari Akun?</h3>
            <p class="modal-text">Apakah Anda yakin ingin keluar? Anda perlu login kembali untuk mengakses akun Anda.
            </p>
            <div class="modal-actions">
                <button class="btn-cancel" onclick="closeLogoutModal()">Batal</button>

                <button class="btn-confirm logoutbtn">Keluar</button>

            </div>
        </div>
    </div>

    <!-- Toast -->
    <div class="toast" id="toast">
        <span class="toast-icon">✓</span>
        <span class="toast-message" id="toastMessage">Aksi berhasil!</span>
    </div>
</body>
<script>
    function goBack() {
        history.back()
    }

    function showLogoutModal() {
        document.getElementById('logoutModal').classList.add('show');
    }

    function closeLogoutModal() {
        document.getElementById('logoutModal').classList.remove('show');
    }

    function confirmLogout() {
        closeLogoutModal();
        showToast('👋 Berhasil keluar dari akun');

        // Simulate logout process
        setTimeout(() => {
            // In real app, clear session and redirect to login
            // window.location.href = '/login';
            alert('Anda telah keluar dari akun.\nDalam aplikasi nyata, akan redirect ke halaman login.');
        }, 1500);
    }

    // Close modal when clicking outside
    document.getElementById('logoutModal').addEventListener('click', (e) => {
        if (e.target.id === 'logoutModal') {
            closeLogoutModal();
        }
    });

    document.querySelector('.logoutbtn').addEventListener('click', () => {
        window.location = "/logout"
    })
</script>

</html>
