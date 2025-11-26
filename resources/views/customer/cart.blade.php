<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - TokoKita</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            max-width: 100dvw;
            padding-bottom: 180px;
        }

        /* Header */
        .header {
            background: white;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .back-btn {
            font-size: 24px;
            cursor: pointer;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #f8f9fa;
            transition: all 0.3s;
        }

        .back-btn:active {
            background: #e0e0e0;
        }

        .header-title {
            flex: 1;
        }

        .header-title h1 {
            font-size: 20px;
            color: #2c3e50;
            margin-bottom: 3px;
        }

        .header-title p {
            font-size: 13px;
            color: #999;
        }

        /* Cart Content */
        .cart-content {
            padding: 15px;
        }

        /* Cart Item */
        .cart-item {
            background: white;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            gap: 15px;
            animation: slideIn 0.3s;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .cart-item.removing {
            animation: slideOut 0.3s forwards;
        }

        @keyframes slideOut {
            to {
                opacity: 0;
                transform: translateX(100%);
                margin-bottom: 0;
                padding: 0;
                height: 0;
            }
        }

        .item-image {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            flex-shrink: 0;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 10px;
        }

        .item-details {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .item-name {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            line-height: 1.3;
            flex: 1;
        }

        .delete-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #ffebee;
            border: none;
            color: #f44336;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s;
        }

        .delete-btn:active {
            background: #f44336;
            color: white;
            transform: scale(0.95);
        }

        .item-price {
            font-size: 16px;
            font-weight: 600;
            color: #ff6b35;
        }

        .item-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f8f9fa;
            padding: 5px;
            border-radius: 10px;
        }

        .qty-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: none;
            background: white;
            color: #4a90e2;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .qty-btn:active {
            transform: scale(0.9);
            background: #4a90e2;
            color: white;
        }

        .qty-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .qty-value {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            min-width: 25px;
            text-align: center;
        }

        .item-subtotal {
            font-size: 14px;
            color: #666;
        }

        .item-subtotal strong {
            color: #2c3e50;
            font-size: 15px;
        }

        /* Empty State */
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .empty-icon {
            font-size: 100px;
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .empty-title {
            font-size: 22px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
        }

        .empty-text {
            font-size: 15px;
            color: #999;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .btn-browse {
            background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
            color: white;
            padding: 14px 32px;
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

        .btn-browse:active {
            transform: scale(0.98);
        }

        /* Promo Section */
        .promo-section {
            background: white;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .promo-section:active {
            background: #f8f9fa;
        }

        .promo-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            background: #fff3e0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .promo-text {
            flex: 1;
        }

        .promo-title {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 3px;
        }

        .promo-subtitle {
            font-size: 12px;
            color: #ff6b35;
        }

        .promo-arrow {
            font-size: 18px;
            color: #999;
        }

        /* Summary Section */
        .summary-section {
            position: fixed;
            bottom: 0;
            right: 0;
            max-width: 600px;
            width: 480px;
            background: white;
            border-radius: 25px 25px 0 0;
            padding: 20px;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .summary-label {
            color: #666;
        }

        .summary-value {
            font-weight: 600;
            color: #2c3e50;
        }

        .summary-divider {
            height: 1px;
            background: #e0e0e0;
            margin: 15px 0;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .total-label {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
        }

        .total-value {
            font-size: 24px;
            font-weight: bold;
            color: #ff6b35;
        }

        .btn-checkout {
            width: 100%;
            background: linear-gradient(135deg, #ff6b35 0%, #ff8c5a 100%);
            color: white;
            padding: 16px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .btn-checkout:active {
            transform: scale(0.98);
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            top: 80px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 14px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            display: none;
            align-items: center;
            gap: 10px;
            z-index: 200;
            animation: slideDown 0.3s;
            max-width: 90%;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }

        .toast.show {
            display: flex;
        }

        .toast-icon {
            font-size: 20px;
        }

        .toast-message {
            font-size: 14px;
            color: #2c3e50;
            font-weight: 500;
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

        /* Responsive */
        @media (max-width: 360px) {
            .item-image {
                width: 70px;
                height: 70px;
                font-size: 35px;
            }

            .item-name {
                font-size: 14px;
            }

            .qty-btn {
                width: 28px;
                height: 28px;
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="back-btn" onclick="goBack()">←</div>
        <div class="header-title">
            <h1>Keranjang Belanja</h1>
            <p id="itemCount">3 produk</p>
        </div>
    </div>

    <!-- Cart Content -->
    <div class="cart-content" id="cartContent">
        @foreach ($keranjang as $k)
            <div class="cart-item">
                <div class="item-image"><img src="{{ asset('storage/' . $k->product->gambar) }}" alt="anajt"></div>
                <div class="item-details">
                    <div class="item-header">
                        <div class="item-name">{{ $k->product->nama_produk }}</div>
                        <form action="{{ route('customer.keranjang.delete', $k->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">🗑️</button>
                        </form>
                    </div>
                    <div class="item-price">Rp. {{ number_format($k->product->harga) }}</div>
                    <div class="item-footer">
                        <div class="quantity-control">
                            <form action="{{ route('customer.keranjang.min', $k->id) }}" method="POST"
                                class="addToCard">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="product_id" value="{{ $k->product->id }}">
                                <button class="qty-btn" {{ $k->jumlah <= 1 ? 'disabled' : '' }}>−</button>
                            </form>
                            <span class="qty-value">{{ $k->jumlah }}</span>
                            <form action="{{ route('customer.keranjang.store') }}" method="POST" class="addToCard">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $k->product->id }}">
                                <button type="submit" class="qty-btn">+</button>
                            </form>
                        </div>
                        <div class="item-subtotal">
                            Subtotal: <strong>Rp. {{ number_format($k->product->harga * $k->jumlah) }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="promo-section">
            <div class="promo-icon">🎁</div>
            <div class="promo-text">
                <div class="promo-title">Gunakan Kode Promo</div>
                <div class="promo-subtitle">Hemat hingga Rp 50.000</div>
            </div>
            <div class="promo-arrow">›</div>
        </div>
    </div>

    <div class="summary-section" id="summarySection">
        <div class="summary-row">
            <span class="summary-label">Subtotal</span>
            <span class="summary-value" id="subtotalValue">Rp {{ number_format($subtotal) }}</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Ongkos Kirim</span>
            <span class="summary-value" id="shippingValue">{{ $subtotal == null ? 'Rp. 0' : 'Rp 15.000' }}</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Diskon</span>
            <span class="summary-value" style="color: #4caf50;" id="discountValue">- Rp 0</span>
        </div>
        <div class="summary-divider"></div>
        <div class="summary-total">
            <span class="total-label">Total Pembayaran</span>
            <span class="total-value" id="totalValue">Rp
                {{ $subtotal == null ? '0.000' : number_format($subtotal + 15000) }}</span>
        </div>
        <button class="btn-checkout" onclick="checkout()">
            <span>🛒</span>
            <span>Lanjut ke Pembayaran</span>
        </button>
    </div>

    <!-- Toast -->
    <div class="toast" id="toast">
        <span class="toast-icon" id="toastIcon">✓</span>
        <span class="toast-message" id="toastMessage">Produk berhasil dihapus</span>
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>

    <script>
        function browseProducts() {
            showToast('🏪', 'Kembali ke halaman produk...');
            // In real app, navigate to products page
            // window.location.href = '/products';
        }

        // Go back
        function goBack() {
            window.location.href = '/'
        }

        // Initial render
        renderCart();

        // Demo: Test empty cart
        function testEmptyCart() {
            cartItems = [];
            renderCart();
        }

        // Demo: Add sample item
        function addSampleItem() {
            const newItem = {
                id: Date.now(),
                name: 'Batik Modern Premium',
                price: 125000,
                quantity: 1,
                image: '👕'
            };
            cartItems.push(newItem);
            renderCart();
            showToast('✓', 'Produk ditambahkan ke keranjang');
        }

        // Add demo buttons for testing (optional)
        // console.log('Demo functions: testEmptyCart(), addSampleItem()');
    </script>
</body>

</html>
