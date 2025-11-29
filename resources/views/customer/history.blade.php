<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - TokoKita</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            /* max-width: 480px; */
            padding-bottom: 70px;
        }

        /* Header */
        .header {
            background: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-top {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .header-icon {
            font-size: 28px;
        }

        .header-title {
            flex: 1;
        }

        .header-title h1 {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 3px;
        }

        .header-title p {
            font-size: 13px;
            color: #999;
        }

        /* Tabs */
        .tabs {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .tabs::-webkit-scrollbar {
            display: none;
        }

        .tab {
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

        .tab:hover {
            border-color: #4a90e2;
        }

        .tab.active {
            background: #4a90e2;
            border-color: #4a90e2;
            color: white;
        }

        .tab-badge {
            background: rgba(255, 255, 255, 0.3);
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 600;
        }

        .tab.active .tab-badge {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Content */
        .content {
            padding: 15px;
        }

        /* Order Card */
        .order-card {
            background: white;
            border-radius: 15px;
            padding: 16px;
            margin-bottom: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            cursor: pointer;
        }

        .order-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .order-card:active {
            transform: translateY(0);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #f0f0f0;
        }

        .order-id {
            font-size: 13px;
            font-weight: 600;
            color: #2c3e50;
        }

        .order-date {
            font-size: 12px;
            color: #999;
        }

        .order-body {
            display: flex;
            gap: 12px;
            margin-bottom: 12px;
        }

        .order-image {
            width: 70px;
            height: 70px;
            border-radius: 10px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            flex-shrink: 0;
        }

        .order-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center
        }

        .order-details {
            flex: 1;
        }

        .order-name {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .order-items {
            font-size: 13px;
            color: #666;
            margin-bottom: 6px;
        }

        .order-price {
            font-size: 16px;
            font-weight: bold;
            color: #ff6b35;
        }

        .order-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 12px;
            border-top: 1px solid #f0f0f0;
        }

        .order-status {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .order-status.pending {
            background: #fff3e0;
            color: #ff9800;
        }

        .order-status.processing {
            background: #e3f2fd;
            color: #4a90e2;
        }

        .order-status.shipped {
            background: #e8f5e9;
            color: #66bb6a;
        }

        .order-status.completed {
            background: #e8f5e9;
            color: #4caf50;
        }

        .btn-detail {
            background: white;
            color: #4a90e2;
            border: 2px solid #4a90e2;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-detail:active {
            background: #4a90e2;
            color: white;
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
            font-size: 22px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
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
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
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

        .bottom-nav a {
            text-decoration: none;
            color: #000
        }

        /* Detail Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            z-index: 2000;
            align-items: flex-end;
            justify-content: center;
        }

        .modal.show {
            display: flex;
            animation: fadeIn 0.3s;
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
            border-radius: 25px 25px 0 0;
            max-width: 480px;
            width: 100%;
            max-height: 85vh;
            overflow-y: auto;
            animation: slideUp 0.3s;
        }

        @keyframes slideUp {
            from {
                transform: translateY(100%);
            }

            to {
                transform: translateY(0);
            }
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background: white;
            z-index: 10;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
        }

        .modal-close {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #f8f9fa;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .modal-body {
            padding: 20px;
        }

        .detail-section {
            margin-bottom: 25px;
        }

        .detail-title {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tracking-steps {
            position: relative;
            padding-left: 35px;
        }

        .tracking-step {
            position: relative;
            padding-bottom: 20px;
        }

        .tracking-step:last-child {
            padding-bottom: 0;
        }

        .tracking-step::before {
            content: '';
            position: absolute;
            left: -27px;
            top: 8px;
            bottom: -8px;
            width: 2px;
            background: #e0e0e0;
        }

        .tracking-step:last-child::before {
            display: none;
        }

        .tracking-dot {
            position: absolute;
            left: -35px;
            top: 0;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #e0e0e0;
        }

        .tracking-step.active .tracking-dot {
            background: #4a90e2;
            box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.2);
        }

        .tracking-step.completed .tracking-dot {
            background: #4caf50;
        }

        .tracking-info {
            font-size: 14px;
        }

        .tracking-status {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 3px;
        }

        .tracking-step.active .tracking-status {
            color: #4a90e2;
        }

        .tracking-time {
            font-size: 12px;
            color: #999;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 14px;
            color: #666;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
            text-align: right;
        }

        /* Responsive */
        @media (max-width: 360px) {
            .order-card {
                padding: 14px;
            }

            .order-image {
                width: 60px;
                height: 60px;
                font-size: 28px;
            }

            .btn-detail {
                padding: 6px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="header-top">
            <div class="header-icon">📦</div>
            <div class="header-title">
                <h1>Riwayat Pesanan</h1>
                <p>Lacak status pesanan Anda</p>
            </div>
        </div>

        <!-- Tabs -->
        <div class="tabs">
            <div class="tab active" onclick="filterOrders('all')">
                <span>Semua</span>
                <span class="tab-badge">8</span>
            </div>
            <div class="tab" onclick="filterOrders('pending')">
                <span>⏳ Pending</span>
                <span class="tab-badge">2</span>
            </div>
            <div class="tab" onclick="filterOrders('completed')">
                <span>✅ Selesai</span>
                <span class="tab-badge">2</span>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content" id="ordersList">
        @if ($checkouts->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">📦</div>
                <h2 class="empty-title">Belum Ada Pesanan</h2>
                <p class="empty-text">Yuk mulai belanja dan dukung UMKM lokal!</p>
                <button class="btn-browse" onclick="home()">
                    <span>🏪</span>
                    <span>Mulai Belanja</span>
                </button>
            </div>
        @else
            @foreach ($checkouts as $c)
                @php
                    $dates = explode(' ', $c->created_at);
                    $date = $dates[0];
                @endphp
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-id">TK-{{ $c->id }}</div>
                        <div class="order-date">{{ $date }}</div>
                    </div>
                    <div class="order-body">
                        <div class="order-image"><img src="{{ asset('storage/' . $c->product->gambar) }}"
                                alt="{{ $c->nama_procuk }}"></div>
                        <div class="order-details">
                            <div class="order-name">{{ $c->product->nama_produk }}</div>
                            <div class="order-items">{{ $c->jumlah }} item</div>
                            <div class="order-price">Rp. {{ number_format($c->product->harga) }}</div>
                        </div>
                    </div>
                    <div class="order-footer">
                        <div class="order-status {{ $c->status }}">
                            {{ $c->status }}
                        </div>
                        <button class="btn-detail" onclick="event.stopPropagation(); showDetail('${order.id}')">
                            Detail →
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    @include('template.bottomNav')

    <!-- Detail Modal -->
    <div class="modal" id="detailModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail Pesanan</h3>
                <button class="modal-close" onclick="closeDetail()">✕</button>
            </div>
            <div class="modal-body" id="modalBody">

            </div>
        </div>
    </div>

    <script>
        // Sample orders data
        const orders = [{
                id: 'TK-2024-008',
                date: '28 Nov 2024',
                product: 'Kue Kering Premium',
                items: 3,
                price: 185000,
                status: 'pending',
                image: '🍪'
            },
            {
                id: 'TK-2024-007',
                date: '27 Nov 2024',
                product: 'Batik Modern Premium',
                items: 1,
                price: 125000,
                status: 'processing',
                image: '👕'
            },
            {
                id: 'TK-2024-006',
                date: '26 Nov 2024',
                product: 'Kopi Robusta Lokal',
                items: 2,
                price: 70000,
                status: 'processing',
                image: '☕'
            },
            {
                id: 'TK-2024-005',
                date: '25 Nov 2024',
                product: 'Madu Murni Organik',
                items: 1,
                price: 65000,
                status: 'shipped',
                image: '🍯'
            },
            {
                id: 'TK-2024-004',
                date: '24 Nov 2024',
                product: 'Kerajinan Anyaman',
                items: 2,
                price: 150000,
                status: 'completed',
                image: '🧺'
            },
            {
                id: 'TK-2024-003',
                date: '23 Nov 2024',
                product: 'Sabun Herbal Alami',
                items: 5,
                price: 125000,
                status: 'completed',
                image: '🧴'
            },
            {
                id: 'TK-2024-002',
                date: '22 Nov 2024',
                product: 'Sambal Matah Khas',
                items: 3,
                price: 90000,
                status: 'processing',
                image: '🌶️'
            },
            {
                id: 'TK-2024-001',
                date: '21 Nov 2024',
                product: 'Dodol Garut Premium',
                items: 2,
                price: 70000,
                status: 'pending',
                image: '🍮'
            }
        ];

        let currentFilter = 'all';

        const statusConfig = {
            pending: {
                label: '⏳ Menunggu Pembayaran',
                class: 'pending'
            },
            processing: {
                label: '⚙️ Sedang Diproses',
                class: 'processing'
            },
            shipped: {
                label: '🚚 Dalam Pengiriman',
                class: 'shipped'
            },
            completed: {
                label: '✅ Pesanan Selesai',
                class: 'completed'
            }
        };

        function formatPrice(price) {
            return 'Rp ' + price.toLocaleString('id-ID');
        }

        function renderOrders() {
            const ordersList = document.getElementById('ordersList');
            const filtered = currentFilter === 'all' ?
                orders :
                orders.filter(o => o.status === currentFilter);

            if (filtered.length === 0) {
                ordersList.innerHTML = `
                <div class="empty-state">
                    <div class="empty-icon">📦</div>
                    <h2 class="empty-title">Belum Ada Pesanan</h2>
                    <p class="empty-text">Yuk mulai belanja dan dukung UMKM lokal!</p>
                    <button class="btn-browse" onclick="navigate('home')">
                        <span>🏪</span>
                        <span>Mulai Belanja</span>
                    </button>
                </div>
            `;
                return;
            }

            ordersList.innerHTML = filtered.map(order => `
           
        `).join('');
        }

        function filterOrders(status) {
            currentFilter = status;

            // Update active tab
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            event.target.closest('.tab').classList.add('active');

            renderOrders();
        }

        function showDetail(orderId) {
            const order = orders.find(o => o.id === orderId);
            if (!order) return;

            const modalBody = document.getElementById('modalBody');
            modalBody.innerHTML = `
                <div class="detail-section">
                    <div class="detail-title">
                        <span>📦</span>
                        <span>Informasi Pesanan</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">ID Pesanan</span>
                        <span class="info-value">${order.id}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Tanggal</span>
                        <span class="info-value">${order.date}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Status</span>
                        <span class="info-value">${statusConfig[order.status].label}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Total Pembayaran</span>
                        <span class="info-value" style="color: #ff6b35;">${formatPrice(order.price)}</span>
                    </div>
                </div>

                <div class="detail-section">
                    <div class="detail-title">
                        <span>🚚</span>
                        <span>Status Pengiriman</span>
                    </div>
                    <div class="tracking-steps">
                        ${getTrackingSteps(order.status)}
                    </div>
                </div>

                <div class="detail-section">
                    <div class="detail-title">
                        <span>📍</span>
                        <span>Alamat Pengiriman</span>
                    </div>
                    <div style="font-size: 14px; color: #666; line-height: 1.6;">
                        <strong style="color: #2c3e50;">Budi Santoso</strong><br>
                        📱 +62 812-3456-7890<br>
                        Jl. Merdeka No. 123, RT 01/RW 05<br>
                        Kel. Sentosa, Kec. Cibiru<br>
                        Kota Bandung, Jawa Barat 40393
                    </div>
                </div>

                <div class="detail-section">
                    <div class="detail-title">
                        <span>💳</span>
                        <span>Metode Pembayaran</span>
                    </div>
                    <div style="font-size: 14px; color: #666;">
                        Transfer Bank - BCA<br>
                        <span style="color: #999; font-size: 13px;">a.n. TokoKita Official</span>
                    </div>
                </div>
            `;

            document.getElementById('detailModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function getTrackingSteps(status) {
            const steps = [{
                    status: 'completed',
                    label: 'Pesanan Dibuat',
                    time: '28 Nov 2024, 10:30',
                    active: true
                },
                {
                    status: 'completed',
                    label: 'Pembayaran Dikonfirmasi',
                    time: '28 Nov 2024, 11:15',
                    active: status !== 'pending'
                },
                {
                    status: status === 'processing' ? 'active' : 'completed',
                    label: 'Sedang Diproses',
                    time: '28 Nov 2024, 14:00',
                    active: status !== 'pending'
                },
                {
                    status: status === 'shipped' ? 'active' : (status === 'completed' ? 'completed' : ''),
                    label: 'Dalam Pengiriman',
                    time: status === 'completed' || status === 'shipped' ? '29 Nov 2024, 08:00' : '-',
                    active: status === 'shipped' || status === 'completed'
                },
                {
                    status: status === 'completed' ? 'completed' : '',
                    label: 'Pesanan Selesai',
                    time: status === 'completed' ? '30 Nov 2024, 15:30' : '-',
                    active: status === 'completed'
                }
            ];

            return steps.map(step => `
                <div class="tracking-step ${step.active ? step.status : ''}">
                    <div class="tracking-dot"></div>
                    <div class="tracking-info">
                        <div class="tracking-status">${step.label}</div>
                        <div class="tracking-time">${step.time}</div>
                    </div>
                </div>
            `).join('');
        }

        function closeDetail() {
            document.getElementById('detailModal').classList.remove('show');
            document.body.style.overflow = '';
        }

        // Close modal on overlay click
        document.getElementById('detailModal').addEventListener('click', (e) => {
            if (e.target.id === 'detailModal') {
                closeDetail();
            }
        });

        function home() {
            window.location = "/"
        }

        // Initial render
        // renderOrders();
    </script>
</body>

</html>
