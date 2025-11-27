<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Makanan - TokoKita</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }

        /* Header */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-top {
            padding: 20px;
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

        .category-info {
            flex: 1;
        }

        .category-icon {
            display: flex;
            align-items: center;
            font-size: 32px;
            margin-bottom: 5px;
        }

        .category-name {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 3px;
        }

        .product-count {
            align-self: center;
            font-size: 14px;
            color: #666;
        }

        .header-actions {
            display: flex;
            gap: 10px;
        }

        .icon-btn {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: #f8f9fa;
            border: none;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }

        .icon-btn:hover {
            background: #e3f2fd;
            color: #4a90e2;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
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

        /* Search Bar */
        .search-section {
            padding: 0 20px 15px;
        }

        .search-container {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 14px 50px 14px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #999;
        }

        .clear-search {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #999;
            cursor: pointer;
            display: none;
        }

        .clear-search.show {
            display: block;
        }

        /* Filter Bar */
        .filter-bar {
            padding: 15px 20px;
            background: white;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            gap: 10px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .filter-bar::-webkit-scrollbar {
            display: none;
        }

        .filter-chip {
            padding: 10px 18px;
            background: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filter-chip:hover {
            border-color: #4a90e2;
            background: #e3f2fd;
        }

        .filter-chip.active {
            background: #4a90e2;
            border-color: #4a90e2;
            color: white;
        }

        /* Content */
        .content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        }

        .product-image {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            position: relative;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .favorite-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            transition: all 0.3s;
            z-index: 10;
        }

        .favorite-btn:hover {
            transform: scale(1.1);
        }

        .favorite-btn.active {
            color: #ff6b35;
        }

        .product-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #ff6b35;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price {
            font-size: 20px;
            font-weight: bold;
            color: #ff6b35;
            margin-bottom: 8px;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
        }

        .rating-stars {
            color: #ffa726;
        }

        .rating-count {
            color: #999;
        }

        .product-location {
            font-size: 13px;
            color: #666;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-icon {
            font-size: 100px;
            margin-bottom: 25px;
            opacity: 0.7;
        }

        .empty-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
        }

        .empty-text {
            font-size: 15px;
            color: #999;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .btn-browse {
            background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .btn-browse:hover {
            transform: translateY(-2px);
        }

        /* Load More */
        .load-more-section {
            text-align: center;
            padding: 30px 0;
        }

        .btn-load-more {
            background: white;
            color: #4a90e2;
            border: 2px solid #4a90e2;
            padding: 12px 32px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-load-more:hover {
            background: #4a90e2;
            color: white;
        }

        /* Loading Skeleton */
        .skeleton {
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Filter Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 200;
            align-items: center;
            justify-content: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 30px;
            max-width: 450px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
        }

        .modal-close {
            width: 36px;
            height: 36px;
            border: none;
            background: #f8f9fa;
            border-radius: 8px;
            font-size: 20px;
            cursor: pointer;
        }

        .filter-group {
            margin-bottom: 25px;
        }

        .filter-label {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
            display: block;
        }

        .filter-options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-option {
            padding: 10px 18px;
            background: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter-option.selected {
            background: #4a90e2;
            border-color: #4a90e2;
            color: white;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-reset {
            flex: 1;
            padding: 14px;
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-apply {
            flex: 1;
            padding: 14px;
            background: #4a90e2;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            color: white;
            cursor: pointer;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                gap: 15px;
            }

            .product-image {
                height: 160px;
                font-size: 50px;
            }

            .product-name {
                font-size: 14px;
            }

            .product-price {
                font-size: 16px;
            }

            .category-name {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .header-top {
                padding: 15px;
            }

            .category-icon {
                font-size: 28px;
            }

            .content {
                padding: 15px;
            }

            .filter-bar {
                padding: 12px 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="header-top">
            <button class="back-btn" onclick="goBack()">←</button>
            <div class="category-info">
                <div class="category-icon" id="categoryIcon">✨ <h1 class="category-name" id="categoryName">
                        {{ $kategori->nama_kategori }}</h1>
                </div>
                <p class="product-count" id="productCount">{{ $detailKategori->products_count }} Produk</p>
            </div>
            <div class="header-actions">
                <button class="icon-btn" onclick="openCart()">
                    🛒
                    <span class="cart-badge">{{ $countItems }}</span>
                </button>
                <button class="icon-btn" onclick="toggleFavorites()">👤</button>
            </div>
        </div>

        <div class="search-section">
            <div class="search-container">
                <span class="search-icon">🔍</span>
                <input type="text" class="search-input" id="searchInput"
                    placeholder="Cari produk dalam kategori ini...">
                <span class="clear-search" id="clearSearch" onclick="clearSearch()">✕</span>
            </div>
        </div>

        <div class="filter-bar">
            <div class="filter-chip active" onclick="sortBy('popular')">
                🔥 Terpopuler
            </div>
            <div class="filter-chip" onclick="sortBy('newest')">
                ⭐ Terbaru
            </div>
            <div class="filter-chip" onclick="sortBy('price-low')">
                💰 Harga Terendah
            </div>
            <div class="filter-chip" onclick="sortBy('price-high')">
                💎 Harga Tertinggi
            </div>
            <div class="filter-chip" onclick="sortBy('rating')">
                ⭐ Rating Tertinggi
            </div>
            <div class="filter-chip" onclick="openFilterModal()">
                🎛️ Filter Lainnya
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="products-grid" id="productsGrid">
            @foreach ($kategori->products as $p)
                <a href="/produk/{{ $p->id }}" style="text-decoration: none ">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('Storage/' . $p->gambar) }}" />
                        </div>
                        <div class="product-info">
                            <div class="product-name">{{ $p->nama_produk }}</div>
                            <div class="product-price">Rp. {{ number_format($p->harga) }}</div>
                            <div class="product-location">
                                <span>{{ $p->stok }} Tersedia</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="load-more-section" id="loadMoreSection" style="display: none;">
            <button class="btn-load-more" onclick="loadMore()">
                Muat Lebih Banyak
            </button>
        </div>
    </div>

    <!-- Filter Modal -->
    <div class="modal" id="filterModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Filter Produk</h3>
                <button class="modal-close" onclick="closeFilterModal()">✕</button>
            </div>

            <div class="filter-group">
                <label class="filter-label">Rentang Harga</label>
                <div class="filter-options">
                    <div class="filter-option" onclick="selectPrice(this, '0-50000')">
                        < Rp 50.000</div>
                            <div class="filter-option" onclick="selectPrice(this, '50000-100000')">Rp 50K - 100K</div>
                            <div class="filter-option" onclick="selectPrice(this, '100000-200000')">Rp 100K - 200K</div>
                            <div class="filter-option" onclick="selectPrice(this, '200000+')"> > Rp 200.000</div>
                    </div>
                </div>

                <div class="filter-group">
                    <label class="filter-label">Rating</label>
                    <div class="filter-options">
                        <div class="filter-option" onclick="selectRating(this, '5')">⭐ 5 Bintang</div>
                        <div class="filter-option" onclick="selectRating(this, '4')">⭐ 4+ Bintang</div>
                        <div class="filter-option" onclick="selectRating(this, '3')">⭐ 3+ Bintang</div>
                    </div>
                </div>

                <div class="filter-group">
                    <label class="filter-label">Lokasi</label>
                    <div class="filter-options">
                        <div class="filter-option" onclick="selectLocation(this, 'jakarta')">Jakarta</div>
                        <div class="filter-option" onclick="selectLocation(this, 'bandung')">Bandung</div>
                        <div class="filter-option" onclick="selectLocation(this, 'surabaya')">Surabaya</div>
                        <div class="filter-option" onclick="selectLocation(this, 'yogyakarta')">Yogyakarta</div>
                    </div>
                </div>

                <div class="modal-actions">
                    <button class="btn-reset" onclick="resetFilters()">Reset</button>
                    <button class="btn-apply" onclick="applyFilters()">Terapkan</button>
                </div>
            </div>
        </div>

        <script>
            // Render products
            function renderProducts() {
                const grid = document.getElementById('productsGrid');
                const productCount = document.getElementById('productCount');

                if (filteredProducts.length === 0) {
                    grid.innerHTML = `
                    <div class="empty-state" style="grid-column: 1 / -1;">
                        <div class="empty-icon">🔍</div>
                        <h2 class="empty-title">Produk Tidak Ditemukan</h2>
                        <p class="empty-text">Maaf, kami tidak menemukan produk yang sesuai dengan pencarian Anda. Coba kata kunci lain atau ubah filter.</p>
                        <button class="btn-browse" onclick="resetSearch()">
                            <span>🔄</span>
                            <span>Reset Pencarian</span>
                        </button>
                    </div>
                `;
                    productCount.textContent = '0 produk tersedia';
                    return;
                }

                productCount.textContent = `${filteredProducts.length} produk tersedia`;

                grid.innerHTML = filteredProducts.map(product => `
              
            `).join('');
            }

            // Format price
            function formatPrice(price) {
                return 'Rp ' + price.toLocaleString('id-ID');
            }

            // Favorite functionality
            function toggleFavorite(event, id) {
                event.stopPropagation();
                const product = products.find(p => p.id === id);
                if (product) {
                    product.isFavorite = !product.isFavorite;
                    renderProducts();
                }
            }

            function toggleFavorites() {
                window.location = "/profile"
            }

            // Filter modal
            function openFilterModal() {
                document.getElementById('filterModal').classList.add('show');
            }

            function closeFilterModal() {
                document.getElementById('filterModal').classList.remove('show');
            }

            function selectPrice(element, range) {
                document.querySelectorAll('.filter-group:nth-child(1) .filter-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                element.classList.add('selected');
            }

            function selectRating(element, rating) {
                document.querySelectorAll('.filter-group:nth-child(2) .filter-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                element.classList.add('selected');
            }

            function selectLocation(element, location) {
                element.classList.toggle('selected');
            }

            function resetFilters() {
                document.querySelectorAll('.filter-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
            }

            function applyFilters() {
                // Apply filter logic here
                closeFilterModal();
                alert('Filter diterapkan! (Demo mode)');
            }

            // Navigation
            function goBack() {
                window.history.back()
            }

            function openCart() {
                window.location.href = '/keranjang';
            }

            function loadMore() {
                alert('Memuat produk tambahan...');
            }

            // Close modal on outside click
            document.getElementById('filterModal').addEventListener('click', (e) => {
                if (e.target.id === 'filterModal') {
                    closeFilterModal();
                }
            });

            // Initial render
            renderProducts();
        </script>
</body>

</html>
