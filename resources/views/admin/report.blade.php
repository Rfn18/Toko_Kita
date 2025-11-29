<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Checkout - Admin TokoKita</title>
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

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            background: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid #e0e0e0;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            font-size: 32px;
        }

        .logo-text {
            font-size: 20px;
            font-weight: bold;
            color: #4a90e2;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 15px 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: #666;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .menu-item:hover {
            background: #f8f9fa;
            color: #4a90e2;
        }

        .menu-item.active {
            background: #e3f2fd;
            color: #4a90e2;
            border-right: 3px solid #4a90e2;
            font-weight: 600;
        }

        .menu-icon {
            font-size: 22px;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        /* Header */
        .page-header {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .page-subtitle {
            font-size: 14px;
            color: #999;
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        .btn-export {
            background: white;
            color: #4a90e2;
            border: 2px solid #4a90e2;
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

        .btn-export:hover {
            background: #4a90e2;
            color: white;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .stat-label {
            font-size: 13px;
            color: #999;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .stat-change {
            font-size: 12px;
            color: #4caf50;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .stat-change.negative {
            color: #f44336;
        }

        /* Filters */
        .filters-section {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-label {
            font-size: 13px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
            display: block;
        }

        .filter-input,
        .filter-select {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .filter-input:focus,
        .filter-select:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
        }

        /* Table */
        .table-container {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead {
            background: #f8f9fa;
        }

        .table th {
            padding: 15px 20px;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
            font-size: 13px;
            border-bottom: 2px solid #e0e0e0;
        }

        .table td {
            padding: 15px 20px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
            color: #666;
        }

        .table tbody tr:hover {
            background: #f8f9fa;
        }

        .order-id {
            font-weight: 600;
            color: #4a90e2;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .user-name {
            font-weight: 600;
            color: #2c3e50;
        }

        .products-cell {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .product-thumb {
            width: 30px;
            height: 30px;
            border-radius: 6px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .products-more {
            font-size: 12px;
            color: #999;
        }

        .price-cell {
            font-weight: 600;
            color: #ff6b35;
            font-size: 15px;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-badge.pending {
            background: #fff3e0;
            color: #ff9800;
        }

        .status-badge.processing {
            background: #e3f2fd;
            color: #4a90e2;
        }

        .status-badge.shipped {
            background: #e8f5e9;
            color: #4caf50;
        }

        .btn-change-status {
            background: #e3f2fd;
            color: #4a90e2;
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-change-status:hover {
            background: #4a90e2;
            color: white;
        }

        /* Modal */
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
            max-width: 600px;
            width: 90%;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.3s;
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

        .modal-header {
            padding: 25px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            transition: all 0.3s;
        }

        .modal-close:hover {
            background: #e0e0e0;
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 25px;
        }

        .detail-section {
            margin-bottom: 25px;
        }

        .detail-title {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 12px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-label {
            font-size: 14px;
            color: #666;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
        }

        .status-select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .status-select:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
        }

        .modal-actions {
            padding: 20px 25px;
            border-top: 1px solid #e0e0e0;
            display: flex;
            gap: 12px;
        }

        .btn-cancel {
            flex: 1;
            padding: 12px;
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            border-color: #666;
        }

        .btn-save {
            flex: 1;
            padding: 12px;
            background: #4a90e2;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-save:hover {
            background: #357abd;
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
            z-index: 3000;
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
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .filters-section {
                flex-direction: column;
            }

            .table-container {
                overflow-x: auto;
            }

            .table {
                min-width: 800px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <div class="logo-icon">🏪</div>
                <div class="logo-text">TokoKita Admin</div>
            </div>
        </div>
        <div class="sidebar-menu">
            <div class="menu-item">
                <span class="menu-icon">📊</span>
                <span>Dashboard</span>
            </div>
            <div class="menu-item">
                <span class="menu-icon">📦</span>
                <span>Produk</span>
            </div>
            <div class="menu-item active">
                <span class="menu-icon">🛒</span>
                <span>Checkout</span>
            </div>
            <div class="menu-item">
                <span class="menu-icon">📈</span>
                <span>Laporan</span>
            </div>
            <div class="menu-item">
                <span class="menu-icon">⚙️</span>
                <span>Pengaturan</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="page-header">
            <div class="header-top">
                <div>
                    <h1 class="page-title">Laporan Checkout Pengguna</h1>
                    <p class="page-subtitle">Kelola dan pantau status pesanan pelanggan</p>
                </div>
                <div class="header-actions">
                    <button class="btn-export">
                        <span>📥</span>
                        <span>Export Excel</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Pesanan Hari Ini</div>
                <div class="stat-value">24</div>
                <div class="stat-change">
                    <span>↑</span>
                    <span>12% dari kemarin</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Pending</div>
                <div class="stat-value" style="color: #ff9800;">8</div>
                <div class="stat-change negative">
                    <span>↓</span>
                    <span>3 dari kemarin</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Dikirim</div>
                <div class="stat-value" style="color: #4caf50;">4</div>
                <div class="stat-change">
                    <span>↑</span>
                    <span>2 dari kemarin</span>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="filters-section">
            <div class="filter-group">
                <label class="filter-label">Cari Pesanan</label>
                <input type="text" class="filter-input" id="searchInput" placeholder="Nama user atau ID order...">
            </div>
            <div class="filter-group">
                <label class="filter-label">Filter Status</label>
                <select class="filter-select" id="statusFilter">
                    <option value="all">Semua Status</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Diproses</option>
                    <option value="shipped">Dikirim</option>
                </select>
            </div>
            <div class="filter-group">
                <label class="filter-label">Tanggal</label>
                <input type="date" class="filter-input" id="dateFilter">
            </div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Order</th>
                        <th>Pelanggan</th>
                        <th>Produk</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="ordersTable">
                    <!-- Orders will be rendered here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="statusModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Ubah Status Pesanan</h3>
                <button class="modal-close" onclick="closeModal()">✕</button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Content will be inserted here -->
            </div>
            <div class="modal-actions">
                <button class="btn-cancel" onclick="closeModal()">Batal</button>
                <button class="btn-save" onclick="saveStatus()">Simpan Perubahan</button>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div class="toast" id="toast">
        <span class="toast-icon">✓</span>
        <span class="toast-message" id="toastMessage">Status berhasil diubah!</span>
    </div>

    <script>
        // Sample data
        const orders = [{
                id: 'TK-2024-024',
                user: 'Budi Santoso',
                products: ['🍪', '☕'],
                total: 125000,
                date: '29 Nov 2024',
                status: 'pending'
            },
            {
                id: 'TK-2024-023',
                user: 'Siti Nurhaliza',
                products: ['👕'],
                total: 125000,
                date: '29 Nov 2024',
                status: 'processing'
            },
            {
                id: 'TK-2024-022',
                user: 'Ahmad Wijaya',
                products: ['🍯', '🧴'],
                total: 90000,
                date: '29 Nov 2024',
                status: 'processing'
            },
            {
                id: 'TK-2024-021',
                user: 'Dewi Kartika',
                products: ['🌶️'],
                total: 30000,
                date: '28 Nov 2024',
                status: 'shipped'
            },
            {
                id: 'TK-2024-020',
                user: 'Eko Prasetyo',
                products: ['🧺', '🎨'],
                total: 175000,
                date: '28 Nov 2024',
                status: 'processing'
            },
            {
                id: 'TK-2024-019',
                user: 'Rina Melati',
                products: ['🍪', '🍮'],
                total: 115000,
                date: '28 Nov 2024',
                status: 'pending'
            },
            {
                id: 'TK-2024-018',
                user: 'Agus Firmansyah',
                products: ['☕'],
                total: 35000,
                date: '27 Nov 2024',
                status: 'shipped'
            },
            {
                id: 'TK-2024-017',
                user: 'Linda Kusuma',
                products: ['🍯', '🧴', '🌶️'],
                total: 120000,
                date: '27 Nov 2024',
                status: 'processing'
            },
        ];

        let currentOrderId = null;
        let filteredOrders = [...orders];

        const statusLabels = {
            pending: {
                label: '⏳ Pending',
                class: 'pending'
            },
            processing: {
                label: '⚙️ Diproses',
                class: 'processing'
            },
            shipped: {
                label: '🚚 Dikirim',
                class: 'shipped'
            }
        };

        function formatPrice(price) {
            return 'Rp ' + price.toLocaleString('id-ID');
        }

        function renderOrders() {
            const tbody = document.getElementById('ordersTable');

            tbody.innerHTML = filteredOrders.map(order => `
                <tr>
                    <td><span class="order-id">${order.id}</span></td>
                    <td>
                        <div class="user-info">
                            <div class="user-avatar">👤</div>
                            <span class="user-name">${order.user}</span>
                        </div>
                    </td>
                    <td>
                        <div class="products-cell">
                            ${order.products.slice(0, 2).map(p => `<div class="product-thumb">${p}</div>`).join('')}
                            ${order.products.length > 2 ? `<span class="products-more">+${order.products.length - 2}</span>` : ''}
                        </div>
                    </td>
                    <td><span class="price-cell">${formatPrice(order.total)}</span></td>
                    <td>${order.date}</td>
                    <td>
                        <span class="status-badge ${statusLabels[order.status].class}">
                            ${statusLabels[order.status].label}
                        </span>
                    </td>
                    <td>
                        <button class="btn-change-status" onclick="openModal('${order.id}')">
                            Ubah Status
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // Search
        document.getElementById('searchInput').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            filterOrders();
        });

        // Status filter
        document.getElementById('statusFilter').addEventListener('change', function() {
            filterOrders();
        });

        function filterOrders() {
            const searchQuery = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;

            filteredOrders = orders.filter(order => {
                const matchSearch = order.id.toLowerCase().includes(searchQuery) ||
                    order.user.toLowerCase().includes(searchQuery);
                const matchStatus = statusFilter === 'all' || order.status === statusFilter;

                return matchSearch && matchStatus;
            });

            renderOrders();
        }

        // Modal
        function openModal(orderId) {
            currentOrderId = orderId;
            const order = orders.find(o => o.id === orderId);
            if (!order) return;

            const modalBody = document.getElementById('modalBody');
            modalBody.innerHTML = `
                <div class="detail-section">
                    <div class="detail-title">Detail Pesanan</div>
                    <div class="detail-row">
                        <span class="detail-label">ID Order</span>
                        <span class="detail-value">${order.id}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Pelanggan</span>
                        <span class="detail-value">${order.user}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Total Pembayaran</span>
                        <span class="detail-value" style="color: #ff6b35;">${formatPrice(order.total)}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Tanggal</span>
                        <span class="detail-value">${order.date}</span>
                    </div>
                </div>

                <div class="detail-section">
                    <div class="detail-title">Ubah Status Pesanan</div>
                    <select class="status-select" id="newStatus">
                        <option value="pending" ${order.status === 'pending' ? 'selected' : ''}>⏳ Pending - Menunggu Pembayaran</option>
                        <option value="processing" ${order.status === 'processing' ? 'selected' : ''}>⚙️ Diproses - Pesanan Sedang Dikemas</option>
                        <option value="shipped" ${order.status === 'shipped' ? 'selected' : ''}>🚚 Dikirim - Pesanan Dalam Perjalanan</option>
                    </select>
                </div>
            `;

            document.getElementById('statusModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('statusModal').classList.remove('show');
            document.body.style.overflow = '';
        }

        function saveStatus() {
            const newStatus = document.getElementById('newStatus').value;
            const order = orders.find(o => o.id === currentOrderId);

            if (order) {
                order.status = newStatus;
                renderOrders();
                closeModal();
                showToast(`✓ Status pesanan ${currentOrderId} berhasil diubah menjadi ${statusLabels[newStatus].label}`);
            }
        }

        // Toast
        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            toastMessage.textContent = message;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Close modal on overlay click
        document.getElementById('statusModal').addEventListener('click', (e) => {
            if (e.target.id === 'statusModal') {
                closeModal();
            }
        });

        // Initial render
        renderOrders();
    </script>
</body>

</html>
