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


    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Header */
    .page-header {
        background: white;
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-left h1 {
        font-size: 28px;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .header-left p {
        color: #666;
        font-size: 15px;
    }

    .header-lefts {
        display: block
    }

    .header-lefts h1 {
        font-size: 28px;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .header-lefts p {
        color: #666;
        font-size: 15px;
    }


    .btn-add-category {
        background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
        color: white;
        padding: 14px 28px;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
    }

    .btn-add-category:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(74, 144, 226, 0.4);
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        gap: 20px;
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .stat-icon.blue {
        background: #e3f2fd;
    }

    .stat-icon.orange {
        background: #fff3e0;
    }

    .stat-icon.green {
        background: #e8f5e9;
    }

    .stat-info h3 {
        font-size: 32px;
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .stat-info p {
        color: #666;
        font-size: 14px;
    }

    /* Category Grid */
    .category-section {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .section-title {
        font-size: 20px;
        font-weight: 600;
        color: #2c3e50;
    }

    .search-box {
        position: relative;
        width: 300px;
    }

    .search-box input {
        width: 100%;
        padding: 10px 40px 10px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 14px;
        transition: all 0.3s;
    }

    .search-box input:focus {
        outline: none;
        border-color: #4a90e2;
        box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
    }

    .search-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: #999;
    }

    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .category-card {
        background: #f8f9fa;
        border: 2px solid #e0e0e0;
        border-radius: 15px;
        padding: 25px;
        transition: all 0.3s;
        cursor: pointer;
    }

    .category-card:hover {
        border-color: #4a90e2;
        background: white;
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .category-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        background: white;
    }

    .category-actions {
        display: flex;
        gap: 8px;
    }

    .btn-icon {
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        transition: all 0.3s;
    }

    .btn-edit {
        background: #e3f2fd;
        color: #4a90e2;
    }

    .btn-edit:hover {
        background: #4a90e2;
        color: white;
    }

    .btn-delete {
        background: #ffebee;
        color: #f44336;
    }

    .btn-delete:hover {
        background: #f44336;
        color: white;
    }

    .category-name {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .category-stats {
        display: flex;
        gap: 15px;
        color: #666;
        font-size: 14px;
    }

    .category-stat {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
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
        padding: 40px;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        animation: slideUp 0.3s;
    }

    @keyframes slideUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .modal-title {
        font-size: 24px;
        font-weight: 600;
        color: #2c3e50;
    }

    .modal-close {
        width: 36px;
        height: 36px;
        border: none;
        background: #f8f9fa;
        border-radius: 8px;
        cursor: pointer;
        font-size: 20px;
        color: #666;
        transition: all 0.3s;
    }

    .modal-close:hover {
        background: #e0e0e0;
        transform: rotate(90deg);
    }

    .modal-illustration {
        text-align: center;
        font-size: 80px;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        font-size: 15px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .form-label .required {
        color: #f44336;
    }

    .form-input {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s;
        font-family: inherit;
    }

    .form-input:focus {
        outline: none;
        border-color: #4a90e2;
        box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
    }

    .form-input.error {
        border-color: #f44336;
    }

    .error-message {
        color: #f44336;
        font-size: 13px;
        margin-top: 8px;
        display: none;
    }

    .error-message.show {
        display: block;
    }

    .form-hint {
        color: #999;
        font-size: 13px;
        margin-top: 8px;
    }

    /* Icon Picker */
    .icon-picker {
        margin-bottom: 25px;
    }

    .icon-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
        margin-top: 15px;
    }

    .icon-option {
        width: 100%;
        aspect-ratio: 1;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        background: #f8f9fa;
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .icon-option:hover {
        border-color: #4a90e2;
        background: #e3f2fd;
    }

    .icon-option.selected {
        border-color: #4a90e2;
        background: #e3f2fd;
        box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.1);
    }

    .modal-actions {
        display: flex;
        gap: 12px;
        margin-top: 30px;
    }

    .btn-cancel {
        flex: 1;
        padding: 14px;
        border: 2px solid #e0e0e0;
        background: white;
        color: #666;
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

    .btn-save {
        flex: 1;
        padding: 14px;
        border: none;
        background: linear-gradient(135deg, #4a90e2 0%, #67b5f5 100%);
        color: white;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(74, 144, 226, 0.4);
    }

    /* Delete Modal */
    .delete-modal-content {
        text-align: center;
        max-width: 450px;
    }

    .delete-icon {
        font-size: 80px;
        margin-bottom: 20px;
    }

    .delete-title {
        font-size: 24px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .delete-text {
        color: #666;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .delete-category-name {
        background: #fff3e0;
        color: #ff6b35;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 25px;
    }

    .btn-danger {
        background: #f44336;
        color: white;
    }

    .btn-danger:hover {
        background: #d32f2f;
    }

    /* Success Message */
    .toast {
        position: fixed;
        top: 30px;
        right: 30px;
        background: white;
        padding: 18px 24px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        display: none;
        align-items: center;
        gap: 12px;
        z-index: 2000;
        animation: slideInRight 0.3s;
    }

    .toast.show {
        display: flex;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(400px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .toast.success {
        border-left: 4px solid #4caf50;
    }

    .toast-icon {
        font-size: 24px;
    }

    .toast-message {
        color: #2c3e50;
        font-weight: 500;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-icon {
        font-size: 80px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-title {
        font-size: 20px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .empty-text {
        color: #999;
        margin-bottom: 25px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        body {
            padding: 15px;
        }

        .page-header {
            flex-direction: column;
            gap: 20px;
            align-items: flex-start;
        }

        .search-box {
            width: 100%;
        }

        .category-grid {
            grid-template-columns: 1fr;
        }

        .modal-content {
            padding: 30px 25px;
        }

        .icon-grid {
            grid-template-columns: repeat(4, 1fr);
        }

        .toast {
            right: 15px;
            left: 15px;
            top: 15px;
        }

    }
</style>

<body>
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
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">🏪</div>
            <div class="sidebar-title">TokoKita</div>
        </div>
        <div class="sidebar-menu">
            <a href="{{ url('/admin/dashboard') }}" style="text-decoration: none">
                <div class="menu-item" data-page="dashboard">
                    <span class="menu-icon">📊</span>
                    <span class="menu-text">Dashboard</span>
                </div>
            </a>
            <a href="{{ url('/admin/produk') }}" style="text-decoration: none">
                <div class="menu-item" data-page="products">
                    <span class="menu-icon">📦</span>
                    <span class="menu-text">Produk</span>
                </div>
            </a>
            <div class="menu-item active" data-page="orders">
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
        @include('admin.header')
        <div class="content page" id="productsPage">
            <div class="success-banner" id="successBanner">
                <span class="success-banner-icon">✓</span>
                <span>Produk berhasil disimpan!</span>
            </div>


            <div class="page-header">
                <div class="header-lefts">
                    <h1>🏷️ Kelola Kategori</h1>
                    <p>Atur kategori produk untuk memudahkan pengelolaan toko Anda</p>
                </div>
                <button class="btn-add-category" onclick="openAddModal()">
                    <span>➕</span>
                    <span>Tambah Kategori</span>
                </button>
            </div>

            <div class="category-section">
                <div class="section-header">
                    <h2 class="section-title">Daftar Kategori</h2>
                    <div class="search-box">
                        <input type="text" placeholder="Cari kategori..." id="searchInput">
                        <span class="search-icon">🔍</span>
                    </div>
                </div>

                <div class="category-grid" id="categoryGrid">
                    @foreach ($kategori as $k)
                        <div class="category-card">
                            <div class="category-header">
                                <div class="category-icon">⭐</div>
                                <div class="category-actions">
                                    <button class="btn-icon btn-edit" data-id="{{ $k->id }}"
                                        data-nama="{{ $k->nama_kategori }}">✏️</button>
                                    <form action="{{ route('admin.kategori.delete', $k->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-icon btn-delete">🗑️</button>
                                    </form>
                                </div>
                            </div>
                            <div class="category-name">{{ $k->nama_kategori }}</div>
                            <div class="category-stats">
                                <div class="category-stat">
                                    <span>📦</span>
                                    <span>{{ $k->products_count }} produk</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="modal" id="categoryModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalTitle">Tambah Kategori Baru</h3>
                        <button class="modal-close" onclick="closeModal()">✕</button>
                    </div>

                    <div class="modal-illustration" id="modalIllustration">🏷️</div>

                    <form id="categoryForm" action="{{ route('admin.kategori.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nama Kategori <span class="required">*</span></label>
                            <input type="text" class="form-input" id="categoryName" name="nama_kategori"
                                placeholder="Contoh: Makanan & Minuman" required>
                            <div class="error-message" id="nameError">Nama kategori tidak boleh kosong!</div>
                            <div class="form-hint">Gunakan nama yang jelas dan mudah dipahami</div>
                        </div>
                        <div class="category-section">

                            <div class="modal-actions">
                                <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                                <button type="submit" class="btn-save">💾 Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="modalEditKategori" style="z-index: 9999">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Edit Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form id="formEditKategori" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-body">
                                <label>Nama Kategori</label>
                                <input type="text" class="form-control" id="editNamaKategori"
                                    name="nama_kategori">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </form>

                    </div>
                </div>
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
<script>
    document.addEventListener('click', function(e) {

        if (e.target.classList.contains('btn-edit')) {

            let id = e.target.dataset.id;
            let nama = e.target.dataset.nama;

            document.getElementById('editNamaKategori').value = nama;

            document.getElementById('formEditKategori').action = "/admin/kategori/update/" + id;

            var editModal = new bootstrap.Modal(document.getElementById('modalEditKategori'));
            editModal.show();
        }
    });

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const filtered = categories.filter(cat =>
            cat.name.toLowerCase().includes(searchTerm)
        );
        renderCategories(filtered);
    });

    // Icon picker
    document.querySelectorAll('.icon-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.icon-option').forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            selectedIcon = this.dataset.icon;
            document.getElementById('modalIllustration').textContent = selectedIcon;
        });
    });

    // Modal functions
    function openAddModal() {
        document.getElementById('modalTitle').textContent = 'Tambah Kategori Baru';
        document.getElementById('categoryName').value = '';

        // Reset icon selection
        document.querySelectorAll('.icon-option').forEach(opt => opt.classList.remove('selected'));

        document.getElementById('categoryModal').classList.add('show');
    }

    function closeModal() {
        document.getElementById('categoryModal').classList.remove('show');
        document.getElementById('categoryName').classList.remove('error');
        document.getElementById('nameError').classList.remove('show');
    }

    function openDeleteModal(id) {
        const category = categories.find(c => c.id === id);
        if (!category) return;

        currentCategoryId = id;
        document.getElementById('deleteCategoryName').textContent = category.name;
        document.getElementById('deleteModal').classList.add('show');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
    }

    function confirmDelete() {
        categories = categories.filter(c => c.id !== currentCategoryId);
        renderCategories();
        closeDeleteModal();
        showToast('Kategori berhasil dihapus!');
    }

    // Toast notification
    function showToast(message) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');
        toastMessage.textContent = message;
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }

    // Close modals on outside click
    document.getElementById('categoryModal').addEventListener('click', (e) => {
        if (e.target.id === 'categoryModal') closeModal();
    });

    // Initial render
    renderCategories();
</script>

</html>
