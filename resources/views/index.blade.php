<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f8f9fa;
        padding-bottom: 80px;
    }

    /* Header */
    .header {
        background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
        color: white;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .header-content {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
    }

    .search-bar {
        flex: 1;
        max-width: 500px;
        margin: 0 20px;
        position: relative;
    }

    .search-bar input {
        width: 100%;
        padding: 12px 40px 12px 15px;
        border: none;
        border-radius: 25px;
        font-size: 14px;
    }

    .search-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
    }

    .cart-icon {
        position: relative;
        cursor: pointer;
    }

    .cart-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #ff6b35;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Main Content */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Banner Promo */
    .banner {
        background: linear-gradient(135deg, #ff6b35 0%, #ff8c5a 100%);
        border-radius: 20px;
        padding: 40px;
        margin-bottom: 30px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
    }

    .banner-text h2 {
        font-size: 32px;
        margin-bottom: 10px;
    }

    .banner-text p {
        font-size: 16px;
        margin-bottom: 20px;
        opacity: 0.95;
    }

    .btn-promo {
        background: white;
        color: #ff6b35;
        padding: 12px 30px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .btn-promo:hover {
        transform: translateY(-2px);
    }

    .banner-illustration {
        width: 200px;
        height: 150px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 80px;
    }

    /* Section Title */
    .section-title {
        font-size: 24px;
        margin-bottom: 20px;
        color: #2c3e50;
        font-weight: 600;
    }

    /* Kategori */
    .categories {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        gap: 15px;
        margin-bottom: 40px;
    }

    .category-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .category-icon {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .category-name {
        font-size: 14px;
        color: #2c3e50;
        font-weight: 500;
    }

    /* Produk Unggulan */
    .products {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
        cursor: pointer;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 60px;
    }

    .product-info {
        padding: 15px;
    }

    .product-name {
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .product-price {
        font-size: 18px;
        color: #ff6b35;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
        color: #ffa726;
    }

    .add-to-cart {
        width: 100%;
        background: #4a90e2;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 8px;
        margin-top: 10px;
        cursor: pointer;
        font-weight: 500;
        transition: background 0.3s;
    }

    .add-to-cart:hover {
        background: #357abd;
    }

    /* Bottom Navigation */
    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: white;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-around;
        padding: 10px 0;
        z-index: 1000;
    }

    .nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        padding: 5px 20px;
        transition: all 0.3s;
    }

    .nav-item:hover {
        color: #4a90e2;
    }

    .nav-item.active {
        color: #4a90e2;
    }

    .nav-icon {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .nav-label {
        font-size: 12px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .banner {
            flex-direction: column;
            text-align: center;
            padding: 30px 20px;
        }

        .banner-illustration {
            margin-top: 20px;
        }

        .search-bar {
            margin: 15px 0;
        }

        .header-content {
            flex-direction: column;
        }

        .products {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .categories {
            grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
        }
    }
</style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <div class="logo">🏪 TokoKita</div>
            <div class="search-bar">
                <input type="text" placeholder="Cari produk UMKM...">
                <span class="search-icon">🔍</span>
            </div>
            <div class="cart-icon">
                🛒
                <span class="cart-badge">3</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Banner Promo -->
        <div class="banner">
            <div class="banner-text">
                <h2>Diskon Hingga 50%!</h2>
                <p>Dukung UMKM lokal dengan belanja produk pilihan</p>
                <button class="btn-promo">Belanja Sekarang</button>
            </div>
            <div class="banner-illustration">🎁</div>
        </div>

        <!-- Kategori Produk -->
        <h3 class="section-title">Kategori Produk</h3>
        <div class="categories">
            <div class="category-card">
                <div class="category-icon">🍔</div>
                <div class="category-name">Jersey</div>
            </div>
            <div class="category-card">
                <div class="category-icon">☕</div>
                <div class="category-name">Jaket</div>
            </div>
            <div class="category-card">
                <div class="category-icon">👕</div>
                <div class="category-name">Topi</div>
            </div>
            <div class="category-card">
                <div class="category-icon">🎨</div>
                <div class="category-name">Sepatu</div>
            </div>
            <div class="category-card">
                <div class="category-icon">🏠</div>
                <div class="category-name">Kaos</div>
            </div>
        </div>

        <!-- Produk Unggulan -->
        <h3 class="section-title">Produk Unggulan</h3>
        <div class="products">
            <div class="product-card">
                <div class="product-image">🍪</div>
                <div class="product-info">
                    <div class="product-name">Kue Kering Premium</div>
                    <div class="product-price">Rp 45.000</div>
                    <div class="product-rating">
                        ⭐ 4.8 <span style="color: #999;">(120 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">☕</div>
                <div class="product-info">
                    <div class="product-name">Kopi Robusta Lokal</div>
                    <div class="product-price">Rp 35.000</div>
                    <div class="product-rating">
                        ⭐ 4.9 <span style="color: #999;">(85 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">👕</div>
                <div class="product-info">
                    <div class="product-name">Batik Modern</div>
                    <div class="product-price">Rp 125.000</div>
                    <div class="product-rating">
                        ⭐ 4.7 <span style="color: #999;">(95 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">🧺</div>
                <div class="product-info">
                    <div class="product-name">Tas Anyaman Rotan</div>
                    <div class="product-price">Rp 85.000</div>
                    <div class="product-rating">
                        ⭐ 4.6 <span style="color: #999;">(67 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">🍯</div>
                <div class="product-info">
                    <div class="product-name">Madu Murni Organik</div>
                    <div class="product-price">Rp 65.000</div>
                    <div class="product-rating">
                        ⭐ 5.0 <span style="color: #999;">(142 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">🧴</div>
                <div class="product-info">
                    <div class="product-name">Sabun Alami Herbal</div>
                    <div class="product-price">Rp 25.000</div>
                    <div class="product-rating">
                        ⭐ 4.8 <span style="color: #999;">(103 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <div class="nav-item active">
            <div class="nav-icon">🏠</div>
            <div class="nav-label">Home</div>
        </div>
        <div class="nav-item">
            <div class="nav-icon">📦</div>
            <div class="nav-label">Kategori</div>
        </div>
        <div class="nav-item">
            <div class="nav-icon">🛒</div>
            <div class="nav-label">Keranjang</div>
        </div>
        <div class="nav-item">
            <div class="nav-icon">📜</div>
            <div class="nav-label">Riwayat</div>
        </div>
        <div class="nav-item">
            <div class="nav-icon">👤</div>
            <div class="nav-label">Profil</div>
        </div>
    </div>
</body>

</html>
