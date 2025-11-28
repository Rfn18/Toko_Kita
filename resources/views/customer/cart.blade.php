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

        .product-image img {
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

        .summary-rows {
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

        /*  Checkout*/
        /* Overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            animation: fadeIn 0.3s;
        }

        .overlay.show {
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

        /* Popup */
        .checkout-popup {
            background: white;
            border-radius: 25px;
            max-width: 480px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.3s;
            position: relative;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header */
        .popup-header {
            padding: 25px 25px 20px;
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            background: white;
            z-index: 10;
            border-radius: 25px 25px 0 0;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .popup-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
        }

        .close-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #f8f9fa;
            border: none;
            font-size: 20px;
            color: #666;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .close-btn:hover {
            background: #e0e0e0;
            transform: rotate(90deg);
        }

        .popup-subtitle {
            font-size: 14px;
            color: #999;
        }

        /* Content */
        .popup-content {
            padding: 20px 25px;
        }

        /* Section */
        .section {
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Product Items */
        .product-item {
            display: flex;
            gap: 12px;
            padding: 12px;
            background: #f8f9fa;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .product-image {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .product-details {
            flex: 1;
        }

        .product-name {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 4px;
        }

        .product-qty {
            font-size: 13px;
            color: #666;
        }

        .product-price {
            font-size: 14px;
            font-weight: 600;
            color: #ff6b35;
            text-align: right;
        }

        /* Summary */
        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
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
            margin: 12px 0;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 12px;
            margin-top: 12px;
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

        /* Payment Method */
        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .payment-option {
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .payment-option:hover {
            border-color: #4a90e2;
            background: #f8f9fa;
        }

        .payment-option.selected {
            border-color: #4a90e2;
            background: #e3f2fd;
        }

        .payment-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .payment-info {
            flex: 1;
        }

        .payment-name {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 2px;
        }

        .payment-desc {
            font-size: 12px;
            color: #999;
        }

        .payment-radio {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #e0e0e0;
            position: relative;
        }

        .payment-option.selected .payment-radio {
            border-color: #4a90e2;
        }

        .payment-option.selected .payment-radio::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #4a90e2;
        }

        /* Address Card */
        .address-card {
            background: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 16px;
            position: relative;
        }

        .address-badge {
            position: absolute;
            top: -10px;
            right: 12px;
            background: #4caf50;
            color: white;
            padding: 4px 10px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 600;
        }

        .address-name {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 4px;
        }

        .address-phone {
            font-size: 13px;
            color: #666;
            margin-bottom: 8px;
        }

        .address-full {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
            margin-bottom: 12px;
        }

        .btn-change-address {
            background: white;
            color: #4a90e2;
            border: 2px solid #4a90e2;
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s;
        }

        .btn-change-address:hover {
            background: #4a90e2;
            color: white;
        }

        /* Action Buttons */
        .popup-actions {
            padding: 20px 25px;
            border-top: 1px solid #e0e0e0;
            position: sticky;
            bottom: 0;
            background: white;
            border-radius: 0 0 25px 25px;
        }

        .btn-confirm {
            width: 100%;
            background: linear-gradient(135deg, #ff6b35 0%, #ff8c5a 100%);
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
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
            margin-bottom: 12px;
        }

        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }

        .btn-confirm:active {
            transform: translateY(0);
        }

        .btn-cancel {
            width: 100%;
            background: white;
            color: #666;
            border: 2px solid #e0e0e0;
            padding: 12px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            border-color: #666;
            color: #2c3e50;
        }

        /* Loading State */
        .btn-confirm.loading {
            position: relative;
            color: transparent;
        }

        .btn-confirm.loading::after {
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

        /* Responsive */
        @media (max-width: 480px) {
            .checkout-popup {
                max-height: 95vh;
                border-radius: 20px;
            }

            .popup-header {
                padding: 20px 20px 16px;
            }

            .popup-title {
                font-size: 20px;
            }

            .popup-content {
                padding: 16px 20px;
            }

            .product-item {
                padding: 10px;
            }

            .total-value {
                font-size: 20px;
            }
        }

        /* Custom Scrollbar */
        .checkout-popup::-webkit-scrollbar {
            width: 6px;
        }

        .checkout-popup::-webkit-scrollbar-track {
            background: #f8f9fa;
        }

        .checkout-popup::-webkit-scrollbar-thumb {
            background: #d0d0d0;
            border-radius: 3px;
        }

        .checkout-popup::-webkit-scrollbar-thumb:hover {
            background: #b0b0b0;
        }


        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
            font-family: inherit;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
        }

        .form-input.error,
        .form-select.error,
        .form-textarea.error {
            border-color: #f44336;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="back-btn" onclick="goBack()">←</div>
        <div class="header-title">
            <h1>Keranjang Belanja</h1>
            <p id="itemCount">{{ $countItems }} Barang</p>
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
                                <button type="submit" class="qty-btn"
                                    {{ $k->jumlah >= $k->product->stok ? 'disabled' : '' }}>+</button>
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
        <div class="summary-rows">
            <span class="summary-label">Subtotal</span>
            <span class="summary-value" id="subtotalValue">Rp {{ number_format($subtotal) }}</span>
        </div>
        <div class="summary-rows">
            <span class="summary-label">Ongkos Kirim</span>
            <span class="summary-value" id="shippingValue">{{ $subtotal == null ? 'Rp. 0' : 'Rp 15.000' }}</span>
        </div>
        <div class="summary-rows">
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

    {{-- Checkout Popup --}}

    <!-- Overlay & Popup -->
    <div class="overlay" id="checkoutOverlay">
        <div class="checkout-popup">

            <!-- FORM CHECKOUT -->
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf

                <!-- Header -->
                <div class="popup-header">
                    <div class="header-top">
                        <h2 class="popup-title">Checkout</h2>
                        <button class="close-btn" type="button" onclick="closeCheckout()">✕</button>
                    </div>
                    <p class="popup-subtitle">Periksa pesanan Anda sebelum melanjutkan</p>
                </div>

                <!-- Content -->
                <div class="popup-content">

                    <!-- Products -->
                    <div class="section">
                        <h3 class="section-title">
                            <span>📦</span>
                            <span>Produk yang Dibeli ({{ count($keranjang) }})</span>
                        </h3>

                        @foreach ($keranjang as $index => $k)
                            <!-- Hidden Input agar datanya terkirim -->
                            <input type="hidden" name="items[{{ $index }}][product_id]"
                                value="{{ $k->product_id }}">
                            <input type="hidden" name="items[{{ $index }}][jumlah]"
                                value="{{ $k->jumlah }}">
                            <input type="hidden" name="items[{{ $index }}][total_harga]"
                                value="{{ $k->product->harga * $k->jumlah }}">

                            <div class="product-item">
                                <div class="product-image">
                                    <img src="{{ asset('storage/' . $k->product->gambar) }}" alt="gambar">
                                </div>
                                <div class="product-details">
                                    <div class="product-name">{{ $k->product->nama_produk }}</div>
                                    <div class="product-qty">
                                        {{ $k->jumlah }} × Rp. {{ number_format($k->product->harga) }}
                                    </div>
                                </div>
                                <div class="product-price">
                                    Rp {{ number_format($k->product->harga * $k->jumlah) }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Summary -->
                    <div class="section">

                        <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                        <input type="hidden" name="ongkir" value="15000">
                        <input type="hidden" name="total" value="{{ $subtotal + 15000 }}">

                        <div class="summary-row">
                            <span class="summary-label">Subtotal ({{ count($keranjang) }} item)</span>
                            <span class="summary-value">Rp {{ number_format($subtotal) }}</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Ongkos Kirim</span>
                            <span class="summary-value">Rp 15.000</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Diskon</span>
                            <span class="summary-value" style="color: #4caf50;">- Rp 20.000</span>
                        </div>
                        <div class="summary-divider"></div>
                        <div class="summary-total">
                            <span class="total-label">Total Pembayaran</span>
                            <span class="total-value">
                                Rp {{ number_format($subtotal + 15000) }}
                            </span>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div class="section">
                        <h3 class="section-title">
                            <span>📍</span>
                            <span>Alamat Pengiriman</span>
                        </h3>
                        <div class="address-card">
                            <!-- Contoh input alamat -->
                            <input name="alamat" required placeholder="Tulis alamat lengkap..." class="form-input">
                        </div>
                    </div>

                    <div class="popup-actions">
                        <button class="btn-confirm" id="confirmBtn" type="submit">
                            <span>🔒</span>
                            <span>Konfirmasi & Bayar</span>
                        </button>
                        <button class="btn-cancel" onclick="closeCheckout()">Batal</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script>
        // Go back
        function goBack() {
            window.location.href = '/'
        }

        function checkout() {
            document.getElementById('checkoutOverlay').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeCheckout() {
            document.getElementById('checkoutOverlay').classList.remove('show');
            document.body.style.overflow = '';
        }
    </script>
</body>

</html>
