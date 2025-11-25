<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/admin.css') }}>
    <title>Toko Kita</title>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">🏪</div>
            <div class="sidebar-title">TokoKita</div>
        </div>
        <div class="sidebar-menu">
            <div class="menu-item " data-page="dashboard">
                <span class="menu-icon">📊</span>
                <span class="menu-text">Dashboard</span>
            </div>
            <div class="menu-item active" data-page="products">
                <span class="menu-icon">📦</span>
                <span class="menu-text">Produk</span>
            </div>
            <div class="menu-item" data-page="orders">
                <span class="menu-icon">⭐</span>
                <span class="menu-text">kategori</span>
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
    <div class="main-content">
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
                <div class="dropdown">
                    <div class="user-profile" data-bs-toggle="dropdown">
                        <div class="user-avatar">👤</div>
                        <div class="user-name">Admin UMKM</div>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content page" id="productsPage">
            <div class="success-banner" id="successBanner">
                <span class="success-banner-icon">✓</span>
                <span>Produk berhasil disimpan!</span>
            </div>

            <div class="table-header">
                <h2 class="chart-title">Daftar Produk</h2>
                <a href="{{ url('/admin/produk/create') }}" style="text-decoration: none">
                    <button class="btn-primary" id="btnAddProduct">
                        <span>➕</span>
                        <span>Tambah Produk</span>
                    </button>
                </a>
            </div>

            <div class="product-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                        @foreach ($produk as $p)
                            <tr>
                                <td>
                                    <div class="product-image">{{ $p->gambar }}</div>
                                </td>
                                <td>Kue Kering Premium</td>
                                <td>Rp 45.000</td>
                                <td>125 pcs</td>
                                <td><span class="category-badge makanan">Makanan</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-edit" onclick="editProduct(0)">✏️ Edit</button>
                                        <button class="btn-action btn-delete" onclick="showDeleteModal(0)">🗑️
                                            Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
    integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
