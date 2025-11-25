<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/admin.css') }}>
    <title>Dashboard Admin - TokoKita</title>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">🏪</div>
            <div class="sidebar-title">TokoKita</div>
        </div>
        <div class="sidebar-menu">
            <div class="menu-item active" data-page="dashboard">
                <span class="menu-icon">📊</span>
                <span class="menu-text">Dashboard</span>
            </div>
            <div class="menu-item" data-page="products">
                <span class="menu-icon">📦</span>
                <span class="menu-text">Produk</span>
            </div>
            <div class="menu-item" data-page="orders">
                <span class="menu-icon">🛒</span>
                <span class="menu-text">Pesanan</span>
            </div>
            <div class="menu-item" data-page="reports">
                <span class="menu-icon">📈</span>
                <span class="menu-text">Laporan</span>
            </div>
            <div class="menu-item" data-page="settings">
                <span class="menu-icon">⚙️</span>
                <span class="menu-text">Pengaturan</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <div class="toggle-sidebar" id="toggleSidebar">☰</div>
                <h1 class="page-title" id="pageTitle">Dashboard</h1>
            </div>
            <div class="header-right">
                <div class="notification-icon">
                    🔔
                    <span class="notification-badge">3</span>
                </div>
                <div class="user-profile">
                    <div class="user-avatar">👤</div>
                    <div class="user-name">Admin UMKM</div>
                </div>
            </div>
        </div>

        <!-- Dashboard Page -->
        <div class="content page active" id="dashboardPage">
            <div class="stats-grid">
                <div class="stat-card blue">
                    <div class="stat-info">
                        <h3>127</h3>
                        <p>Total Produk</p>
                    </div>
                    <div class="stat-icon">📦</div>
                </div>
                <div class="stat-card orange">
                    <div class="stat-info">
                        <h3>8</h3>
                        <p>Stok Hampir Habis</p>
                    </div>
                    <div class="stat-icon">⚠️</div>
                </div>
                <div class="stat-card green">
                    <div class="stat-info">
                        <h3>Rp 2,4 Jt</h3>
                        <p>Penjualan Hari Ini</p>
                    </div>
                    <div class="stat-icon">💰</div>
                </div>
                <div class="stat-card purple">
                    <div class="stat-info">
                        <h3>45</h3>
                        <p>Pesanan Aktif</p>
                    </div>
                    <div class="stat-icon">🛒</div>
                </div>
            </div>

            <div class="chart-section">
                <div class="chart-header">
                    <h2 class="chart-title">Grafik Penjualan Mingguan</h2>
                </div>
                <div class="chart-container">
                    <div class="chart-bar" style="height: 60%;"></div>
                    <div class="chart-bar" style="height: 80%;"></div>
                    <div class="chart-bar" style="height: 45%;"></div>
                    <div class="chart-bar" style="height: 90%;"></div>
                    <div class="chart-bar" style="height: 70%;"></div>
                    <div class="chart-bar" style="height: 55%;"></div>
                    <div class="chart-bar" style="height: 85%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-icon">⚠️</div>
        <h3 class="modal-title">Hapus Produk?</h3>
        <p class="modal-text">Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.</p>
        
        <div class="modal-product">
            <div class="modal-product-image" id="modalProductImage">🍪</div>
            <div class="modal-product-info">
                <div class="modal-product-name" id="modalProductName">Kue Kering Premium</div>
                <div style="font-size: 14px; color: #666;">Stok: <span id="modalProductStock">125</span> pcs</div>
            </div>
        </div>

        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
            <button class="btn-danger" onclick="confirmDelete()">🗑️ Hapus</button>
        </div>
    </div>
</div>