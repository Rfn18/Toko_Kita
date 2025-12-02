<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
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
            <a href="{{ url('/admin/dashboard') }}" style="text-decoration: none">
                <div class="menu-item " data-page="dashboard">
                    <span class="menu-icon">📊</span>
                    <span class="menu-text">Dashboard</span>
                </div>
            </a>
            <a href="{{ url('/admin/produk') }}" style="text-decoration: none">
                <div class="menu-item active" data-page="products">
                    <span class="menu-icon">📦</span>
                    <span class="menu-text">Produk</span>
                </div>
            </a>
            <a href="{{ url('/admin/kategori') }}" style="text-decoration: none">
                <div class="menu-item" data-page="orders">
                    <span class="menu-icon">⭐</span>
                    <span class="menu-text">kategori</span>
                </div>
            </a>
            <a href="{{ url('/admin/laporan') }}" style="text-decoration: none">
                <div class="menu-item" data-page="reports">
                    <span class="menu-icon">📈</span>
                    <span class="menu-text">Laporan</span>
                </div>
            </a>
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
        <div class="content page" id="addProductPage">
            <div class="form-container">
                <h2 class="form-title">Tambah Produk Baru</h2>

                <form id="addProductForm" action="{{ route('admin.produk.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Foto Produk <span class="required">*</span></label>
                        <div class="image-upload" id="imageUpload">
                            <div class="upload-icon">📷</div>
                            <div class="upload-text">
                                <strong>Klik untuk upload</strong> atau drag & drop gambar di sini<br>
                                <small>Format: JPG, PNG (Maks. 5MB)</small>
                            </div>
                            <input type="file" id="imageInput" accept="image/*" name="gambar"
                                style="display: none;">
                        </div>
                        <div class="image-preview" id="imagePreview">
                            <img id="previewImg" class="preview-image" src="" alt="Preview">
                            <button type="button" class="remove-image" id="removeImage">🗑️ Hapus Gambar</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nama Produk <span class="required">*</span></label>
                        <input type="text" class="form-input" id="productName" name="nama_produk"
                            placeholder="Masukkan nama produk" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Kategori <span class="required">*</span></label>
                        <select class="form-select" name="kategori_id" id="productCategory" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Harga <span class="required">*</span></label>
                        <input type="number" class="form-input" name="harga" id="productPrice"
                            placeholder="Masukkan Harga">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Stok <span class="required">*</span></label>
                        <input type="number" class="form-input" id="productStock" name="stok"
                            placeholder="Masukkan jumlah stok" required min="0">
                        <div class="error-message" id="stockError">Stok tidak boleh kosong atau bernilai negatif!
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-textarea" id="productDescription" name="deskripsi"
                            placeholder="Jelaskan detail produk Anda..."></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="cancelAddProduct()">Batal</button>
                        <button type="submit" class="btn-primary">💾 Simpan Produk</button>
                    </div>
                </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
    // Image Upload - Add Product
    const imageUpload = document.getElementById('imageUpload');
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const removeImage = document.getElementById('removeImage');

    imageUpload.addEventListener('click', () => imageInput.click());

    imageUpload.addEventListener('dragover', (e) => {
        e.preventDefault();
        imageUpload.classList.add('dragover');
    });

    imageUpload.addEventListener('dragleave', () => {
        imageUpload.classList.remove('dragover');
    });

    imageInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            handleImageUpload(file);
        }
    });

    imageUpload.addEventListener('drop', (e) => {
        e.preventDefault();
        imageUpload.classList.remove('dragover');

        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith("image/")) {
            handleImageUpload(file);

            // supaya ikut terkirim saat submit
            const dt = new DataTransfer();
            dt.items.add(file);
            imageInput.files = dt.files;
        }
    });


    function handleImageUpload(file) {
        console.log("FILE TERBACA:", file);

        const reader = new FileReader();

        reader.onload = function(e) {
            previewImg.src = e.target.result;
            imagePreview.classList.add('show');
            imageUpload.style.display = 'none';
        };

        reader.readAsDataURL(file);

        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        document.getElementById('imageInput').files = dataTransfer.files;
    }

    removeImage.addEventListener('click', () => {
        imagePreview.classList.remove('show');
        imageUpload.style.display = 'block';
        imageInput.value = '';
    });
</script>

</html>
