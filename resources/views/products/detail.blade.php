<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        padding-bottom: 0;
    }

    /* Header */
    .header {
        background: white;
        padding: 20px 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
        color: #4a90e2;
    }

    .search-bar {
        width: 400px;
        position: relative;
    }

    .search-bar input {
        width: 100%;
        padding: 12px 45px 12px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 25px;
        font-size: 14px;
        transition: all 0.3s;
    }

    .search-bar input:focus {
        outline: none;
        border-color: #4a90e2;
    }

    .search-icon {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: #999;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .header-icon {
        font-size: 24px;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .header-icon:hover {
        transform: scale(1.1);
    }

    .cart-icon {
        position: relative;
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
        font-size: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }

    /* Main Container */
    .main-container {
        max-width: 1400px;
        margin: 40px auto;
        padding: 0 40px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }

    /* Left Side - Images */
    .left-side {
        position: sticky;
        top: 120px;
        height: fit-content;
    }

    .image-slider {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    }

    .main-image img {
        width: 100%;
        height: 500px;
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        object-fit: cover;
        object-position: center;
        font-size: 200px;
        margin-bottom: 20px;
    }

    .thumbnail-container {
        display: flex;
        gap: 15px;
        justify-content: center;
    }

    .thumbnail {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        cursor: pointer;
        border: 3px solid transparent;
        transition: all 0.3s;
    }

    .thumbnail:hover {
        transform: scale(1.05);
    }

    .thumbnail.active {
        border-color: #4a90e2;
    }

    /* Right Side - Product Info */
    .right-side {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        height: fit-content;
    }

    .breadcrumb {
        font-size: 14px;
        color: #999;
        margin-bottom: 20px;
    }

    .breadcrumb a {
        color: #4a90e2;
        text-decoration: none;
    }

    .category-badge {
        display: inline-block;
        background: #e3f2fd;
        color: #4a90e2;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .product-name {
        font-size: 32px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
        line-height: 1.3;
    }

    .rating-section {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid #e0e0e0;
    }

    .stars {
        color: #ffa726;
        font-size: 20px;
    }

    .rating-text {
        font-size: 16px;
        color: #666;
    }

    .rating-count {
        font-size: 16px;
        color: #4a90e2;
        cursor: pointer;
    }

    .price-section {
        margin-bottom: 30px;
    }

    .product-price {
        font-size: 42px;
        font-weight: bold;
        color: #ff6b35;
        margin-bottom: 10px;
    }

    .price-details {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .original-price {
        font-size: 20px;
        color: #999;
        text-decoration: line-through;
    }

    .discount-badge {
        background: #fff3e0;
        color: #ff6b35;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
    }

    /* Description */
    .description-section {
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid #e0e0e0;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 12px;
    }

    .description-text {
        font-size: 15px;
        color: #666;
        line-height: 1.8;
    }

    /* Seller Info */
    .seller-section {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 15px;
        margin-bottom: 30px;
    }

    .seller-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .seller-info {
        flex: 1;
    }

    .seller-name {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .seller-location {
        font-size: 14px;
        color: #999;
    }

    .visit-store-btn {
        background: #4a90e2;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .visit-store-btn:hover {
        background: #357abd;
        transform: translateY(-2px);
    }

    /* Variations */
    .variations-section {
        margin-bottom: 30px;
    }

    .variation-group {
        margin-bottom: 25px;
    }

    .variation-label {
        font-size: 16px;
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .variation-options {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .variation-option {
        padding: 12px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s;
        background: white;
    }

    .variation-option:hover {
        border-color: #4a90e2;
    }

    .variation-option.selected {
        border-color: #4a90e2;
        background: #e3f2fd;
        color: #4a90e2;
        font-weight: 600;
    }

    /* Quantity */
    .quantity-section {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .quantity-label {
        font-size: 16px;
        color: #2c3e50;
        font-weight: 600;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .qty-btn {
        width: 45px;
        height: 45px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        background: white;
        font-size: 22px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

    .qty-btn:hover {
        border-color: #4a90e2;
        background: #e3f2fd;
    }

    .qty-btn:active {
        transform: scale(0.95);
    }

    .qty-value {
        font-size: 20px;
        font-weight: 600;
        color: #2c3e50;
        min-width: 40px;
        text-align: center;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 15px;
        margin-bottom: 30px;
    }

    .action-btn {
        flex: 1;
        padding: 18px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .add-to-cart-btn {
        background: white;
        color: #4a90e2;
        border: 2px solid #4a90e2;
    }

    .add-to-cart-btn:hover {
        background: #e3f2fd;
    }

    .buy-now-btn {
        background: linear-gradient(135deg, #ff6b35 0%, #ff8c5a 100%);
        color: white;
    }

    .buy-now-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
    }

    /* Features */
    .features-section {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 15px;
    }

    .feature-item {
        text-align: center;
    }

    .feature-icon {
        font-size: 32px;
        margin-bottom: 8px;
    }

    .feature-text {
        font-size: 13px;
        color: #666;
    }

    /* Recommendations */
    .recommendations-section {
        max-width: 1400px;
        margin: 40px auto;
        padding: 0 40px;
    }

    .recommendations-header {
        font-size: 28px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    .recommendations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 25px;
    }

    .recommendation-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        cursor: pointer;
        transition: all 0.3s;
    }

    .recommendation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .recommendation-image {
        width: 100%;
        height: 250px;
        background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 80px;
    }

    .recommendation-info {
        padding: 20px;
    }

    .recommendation-name {
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .recommendation-price {
        font-size: 20px;
        font-weight: bold;
        color: #ff6b35;
        margin-bottom: 8px;
    }

    .recommendation-rating {
        font-size: 14px;
        color: #ffa726;
    }

    /* Success Toast */
    .success-toast {
        position: fixed;
        top: 100px;
        right: 40px;
        background: #4caf50;
        color: white;
        padding: 16px 28px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 500;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        opacity: 0;
        transition: opacity 0.3s;
        z-index: 1000;
    }

    .success-toast.show {
        opacity: 1;
    }

    /* Responsive - Tablet */
    @media (max-width: 1024px) {
        .main-container {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .left-side {
            position: static;
        }

        .search-bar {
            width: 300px;
        }
    }

    /* Responsive - Mobile */
    @media (max-width: 768px) {
        .header {
            padding: 15px 20px;
        }

        .header-left {
            gap: 15px;
        }

        .logo {
            font-size: 20px;
        }

        .search-bar {
            width: 200px;
        }

        .search-bar input {
            padding: 10px 40px 10px 15px;
            font-size: 13px;
        }

        .header-right {
            gap: 15px;
        }

        .header-icon {
            font-size: 20px;
        }

        .main-container {
            margin: 20px auto;
            padding: 0 20px;
        }

        .main-image {
            height: 350px;
            font-size: 120px;
        }

        .thumbnail-container {
            gap: 10px;
        }

        .thumbnail {
            width: 70px;
            height: 70px;
            font-size: 28px;
        }

        .right-side {
            padding: 25px;
        }

        .product-name {
            font-size: 24px;
        }

        .product-price {
            font-size: 32px;
        }

        .recommendations-section {
            padding: 0 20px;
        }

        .recommendations-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .recommendation-image {
            height: 150px;
            font-size: 50px;
        }

        .features-section {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .action-buttons {
            flex-direction: column;
        }

        .success-toast {
            right: 20px;
            left: 20px;
        }
    }

    @media (max-width: 480px) {
        .search-bar {
            display: none;
        }

        .variation-options {
            flex-direction: column;
        }

        .variation-option {
            width: 100%;
            text-align: center;
        }
    }

    .right-side-top {
        display: flex;
        width: 100%;
        justify-content: space-between
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

    /* Loading State */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 300;
    }

    .loading-overlay.show {
        display: flex;
    }

    .loading-spinner {
        width: 60px;
        height: 60px;
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        @auth
            <div class="header-left">
                <div class="logo">🏪 TokoKita</div>
                <div class="search-bar">
                    <input type="text" placeholder="Cari produk UMKM...">
                    <span class="search-icon">🔍</span>
                </div>
            </div>
            <div class="header-right">
                <a href="{{ url('/keranjang') }}" style='text-decoration: none;'>
                    <div class="header-icon cart-icon">
                        🛒
                        <span class="cart-badge">{{ $countItems }}</span>
                    </div>
                </a>
                <a href="{{ url('/profile') }}" style='text-decoration: none;'>
                    <div class="header-icon">👤</div>
                </a>
            </div>
        @else
            <div class="header-left">
                <div class="logo">🏪 TokoKita</div>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Cari produk UMKM...">
                <span class="search-icon">🔍</span>
            </div>
        @endauth
    </div>

    <!-- Main Container -->

    <div class="main-container">
        @if (session('success') || session('error'))
            <div class="toast show" id="toast">
                <span class="toast-icon" id="toastIcon">
                    {{ session('success') ? '✓' : '❌' }}
                </span>

                <span class="toast-message" id="toastMessage">
                    {{ session('success') ?? session('error') }}
                </span>
            </div>
        @endif
        <!-- Left Side - Images -->
        <div class="left-side">
            <div class="image-slider">
                <div class="main-image" id="mainImage"><img src="{{ asset('storage/' . $produk->gambar) }}"
                        alt="foto-produk"></div>
                <div class="thumbnail-container">
                    <div class="thumbnail active" data-emoji="1">1</div>
                </div>
            </div>
        </div>
        <div class="right-side">
            <div class="right-side-top">

                <div class="breadcrumb">
                    <a href="/">Home</a> / <a href="/produk">produk</a>
                    /<span>{{ $produk->id }}</span>
                </div>
                <button class="back-btn" onclick="goBack()">←</button>
            </div>
            <span class="category-badge">{{ $produk->kategori->nama_kategori }}</span>

            <h1 class="product-name">{{ $produk->nama_produk }}</h1>

            <div class="rating-section">
                <p>5 Terjual</p>
            </div>

            <div class="price-section">
                <div class="product-price">Rp {{ number_format($produk->harga) }}</div>
                <div class="price-details">
                    <span class="original-price">Rp
                        {{ number_format($produk->harga + $produk->harga * 0.3) }}</span>
                    <span class="discount-badge">HEMAT 30%</span>
                </div>
            </div>

            <div class="description-section">
                <div class="section-title">Deskripsi Produk</div>
                <p class="description-text">
                    {{ $produk->deskripsi }}
                </p>
            </div>

            <div class="seller-section">
                <div class="seller-avatar">🏪</div>
                <div class="seller-info">
                    <div class="seller-name">Admin TokoKita</div>
                    <div class="seller-location">📍 Kediri, Jawa Timur</div>
                </div>
                <button class="visit-store-btn">Kunjungi Toko</button>
            </div>

            <div class="quantity-section">
                <div class="quantity-label">Jumlah:</div>
                <div class="quantity-control">
                    <button class="qty-btn" id="decreaseBtn">−</button>
                    <div class="qty-value" id="qtyValue">1</div>
                    <button class="qty-btn" id="increaseBtn">+</button>
                </div>
            </div>
            @auth
                <input type="hidden" id="productId" value="{{ $produk->id }}">

                <div class="action-buttons">
                    <button class="action-btn add-to-cart-btn" id="addToCartBtn">
                        🛒 Tambah ke Keranjang
                    </button>
                    <button class="action-btn buy-now-btn" id="buyNowBtn">
                        Beli Sekarang
                    </button>
                </div>
            @else
                <div class="action-buttons">
                    <a href="{{ url('/login') }}" style="text-decoration: none">
                        <button class="action-btn add-to-cart-btn" id="addToCartBtn">
                            🛒 Tambah ke Keranjang
                        </button>
                    </a>
                    <button class="action-btn buy-now-btn" id="buyNowBtn">
                        Beli Sekarang
                    </button>
                </div>
            @endauth

            <div class="features-section">
                <div class="feature-item">
                    <div class="feature-icon">🚚</div>
                    <div class="feature-text">Gratis Ongkir</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">✓</div>
                    <div class="feature-text">100% Original</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🔒</div>
                    <div class="feature-text">Pembayaran Aman</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recommendations -->
    <div class="recommendations-section">
        <h2 class="recommendations-header">Produk Lainnya dari Toko Ini</h2>
        <div class="recommendations-grid">
            <div class="recommendation-card">
                <div class="recommendation-image">☕</div>
                <div class="recommendation-info">
                    <div class="recommendation-name">Kopi Robusta Premium Lokal</div>
                    <div class="recommendation-price">Rp 35.000</div>
                    <div class="recommendation-rating">⭐ 4.9 (85 ulasan)</div>
                </div>
            </div>
            <div class="recommendation-card">
                <div class="recommendation-image">🍯</div>
                <div class="recommendation-info">
                    <div class="recommendation-name">Madu Murni Organik</div>
                    <div class="recommendation-price">Rp 65.000</div>
                    <div class="recommendation-rating">⭐ 5.0 (142 ulasan)</div>
                </div>
            </div>
            <div class="recommendation-card">
                <div class="recommendation-image">🧴</div>
                <div class="recommendation-info">
                    <div class="recommendation-name">Sabun Alami Herbal</div>
                    <div class="recommendation-price">Rp 25.000</div>
                    <div class="recommendation-rating">⭐ 4.8 (103 ulasan)</div>
                </div>
            </div>
            <div class="recommendation-card">
                <div class="recommendation-image">🧺</div>
                <div class="recommendation-info">
                    <div class="recommendation-name">Tas Anyaman Rotan Premium</div>
                    <div class="recommendation-price">Rp 85.000</div>
                    <div class="recommendation-rating">⭐ 4.6 (67 ulasan)</div>
                </div>
            </div>
        </div>
    </div>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>
</body>
<script>
    function goBack() {
        window.history.back()
    }
    document.addEventListener("DOMContentLoaded", () => {

        const decreaseBtn = document.getElementById("decreaseBtn");
        const increaseBtn = document.getElementById("increaseBtn");
        const qtyValue = document.getElementById("qtyValue");
        const addToCartBtn = document.getElementById("addToCartBtn");
        const productId = document.getElementById("productId").value;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // === Increment ===
        increaseBtn.addEventListener("click", () => {
            let qty = parseInt(qtyValue.textContent);
            const jumlahStok = @json($produk->stok);

            if (qty < jumlahStok) {
                qtyValue.textContent = qty + 1;
            } else {
                increaseBtn.disabled = true;
            }
        });

        // === Decrement ===
        decreaseBtn.addEventListener("click", () => {
            let qty = parseInt(qtyValue.textContent);
            if (qty > 1) qtyValue.textContent = qty - 1;
            increaseBtn.disabled = false;
        });

        addToCartBtn.addEventListener("click", () => {

            const qty = parseInt(qtyValue.textContent);
            try {
                const loadingOverlay = document.getElementById('loadingOverlay');
                loadingOverlay.classList.add('show');
                fetch("/keranjang/addMany", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            qty: qty
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        loadingOverlay.classList.remove('show');
                        console.log(data);
                    })
                    .catch(err => console.error(err));
            } catch (err) {
                console.err(err)
            }
        });

    });
</script>

</html>
