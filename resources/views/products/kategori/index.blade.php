<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - TokoKita</title>
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
        }

        /* */

        /* Content */
        .content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 25px 20px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
        }

        .category-count {
            font-size: 14px;
            color: #999;
            background: #f8f9fa;
            padding: 6px 14px;
            border-radius: 20px;
        }

        /* Categories Grid */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .category-card {
            background: white;
            border-radius: 15px;
            padding: 25px 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
            transform: scaleX(0);
            transition: transform 0.3s;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }

        .category-card:hover::before {
            transform: scaleX(1);
        }

        .category-card:active {
            transform: translateY(-2px);
        }

        .category-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 15px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            transition: all 0.3s;
        }

        .category-card:hover .category-icon {
            transform: scale(1.1);
        }

        .category-icon.food {
            background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
        }

        .category-icon.drink {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
        }

        .category-icon.fashion {
            background: linear-gradient(135deg, #f3e5f5 0%, #e1bee7 100%);
        }

        .category-icon.craft {
            background: linear-gradient(135deg, #fff9c4 0%, #fff59d 100%);
        }

        .category-icon.electronic {
            background: linear-gradient(135deg, #e0f2f1 0%, #b2dfdb 100%);
        }

        .category-icon.home {
            background: linear-gradient(135deg, #fce4ec 0%, #f8bbd0 100%);
        }

        .category-icon.beauty {
            background: linear-gradient(135deg, #f3e5f5 0%, #e1bee7 100%);
        }

        .category-icon.sport {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
        }

        .category-icon.book {
            background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
        }

        .category-icon.toy {
            background: linear-gradient(135deg, #fce4ec 0%, #f8bbd0 100%);
        }

        .category-name {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .category-count-text {
            font-size: 13px;
            color: #999;
        }

        .category-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #ff6b35;
            color: white;
            font-size: 10px;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 10px;
        }

        /* Popular Categories */
        .popular-section {
            margin-bottom: 35px;
        }

        .popular-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .popular-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .popular-card:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .popular-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
        }

        .popular-info {
            flex: 1;
        }

        .popular-name {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 4px;
        }

        .popular-count {
            font-size: 12px;
            color: #999;
        }

        .popular-arrow {
            font-size: 20px;
            color: #999;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .empty-icon {
            font-size: 100px;
            margin-bottom: 25px;
            opacity: 0.7;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
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

        .btn-reset {
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

        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(74, 144, 226, 0.4);
        }

        .btn-reset:active {
            transform: translateY(0);
        }

        /* Toast */
        .toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            display: none;
            align-items: center;
            gap: 12px;
            z-index: 200;
            animation: slideUp 0.3s;
        }

        .toast.show {
            display: flex;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
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

        /* Responsive */
        @media (max-width: 768px) {
            .categories-grid {
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
                gap: 12px;
            }

            .category-card {
                padding: 20px 12px;
            }

            .category-icon {
                width: 60px;
                height: 60px;
                font-size: 32px;
            }

            .popular-grid {
                grid-template-columns: 1fr;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            .header-top {
                padding: 15px;
            }

            .header-title h1 {
                font-size: 24px;
            }

            .content {
                padding: 20px 15px;
            }

            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .toast {
                left: 15px;
                right: 15px;
                transform: none;
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('template.header')

    <!-- Content -->
    <div class="content">
        @if ($kategori->where('products_count', '>', 10)->isNotEmpty())
            <!-- Popular Categories -->
            <div class="popular-section">
                <div class="section-header">
                    <h2 class="section-title">🔥 Kategori Populer</h2>
                </div>
                <div class="popular-grid">
                    <div class="popular-card" onclick="openCategory('makanan')">
                        <div class="popular-icon food">🍔</div>
                        <div class="popular-info">
                            <div class="popular-name">Makanan & Minuman</div>
                            <div class="popular-count">156 produk</div>
                        </div>
                        <div class="popular-arrow">›</div>
                    </div>
                    <div class="popular-card" onclick="openCategory('fashion')">
                        <div class="popular-icon fashion">👕</div>
                        <div class="popular-info">
                            <div class="popular-name">Fashion</div>
                            <div class="popular-count">98 produk</div>
                        </div>
                        <div class="popular-arrow">›</div>
                    </div>
                    <div class="popular-card" onclick="openCategory('kerajinan')">
                        <div class="popular-icon craft">🎨</div>
                        <div class="popular-info">
                            <div class="popular-name">Kerajinan Tangan</div>
                            <div class="popular-count">72 produk</div>
                        </div>
                        <div class="popular-arrow">›</div>
                    </div>
                </div>
            </div>
        @endif
        <!-- All Categories -->
        <div class="section-header">
            <h2 class="section-title">Semua Kategori</h2>
            <span class="category-count" id="categoryCount">10 kategori</span>
        </div>

        <div class="categories-grid" id="categoriesGrid">
            @foreach ($kategori as $k)
                <a href="/kategori/{{ $k->id }}">
                    <div class="category-card">
                        {{-- ${category.isNew ? '<div class="category-badge">BARU</div>' : ''} --}}
                        <div class="category-icon ${category.class}">
                            ✨
                        </div>
                        <div class="category-name">{{ $k->nama_kategori }}</div>
                        <div class="category-count-text">{{ $k->products_count }} produk</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Toast -->
    <div class="toast" id="toast">
        <span class="toast-icon">✓</span>
        <span class="toast-message" id="toastMessage">Kategori dipilih</span>
    </div>
    @include('template.bottomNav')
</body>

</html>
