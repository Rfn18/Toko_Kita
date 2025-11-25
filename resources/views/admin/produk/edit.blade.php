<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href={{ asset('css/admin.css') }}>
     <title>Toko Kita</title>
</head>
<body>
       <div class="content page" id="editProductPage">
        <div class="form-container">
            <h2 class="form-title">Edit Produk</h2>
            
            <form id="editProductForm">
                <div class="form-group">
                    <label class="form-label">Foto Produk</label>
                    <div class="image-preview show">
                        <img id="editPreviewImg" class="preview-image" src="" alt="Current Product">
                        <button type="button" class="btn-secondary" style="margin-top: 10px;" onclick="changeImage()">📷 Ganti Gambar</button>
                    </div>
                    <div class="image-upload" id="editImageUpload" style="display: none;">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">
                            <strong>Klik untuk upload</strong> atau drag & drop gambar di sini
                        </div>
                        <input type="file" id="editImageInput" accept="image/*" style="display: none;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Nama Produk <span class="required">*</span></label>
                    <input type="text" class="form-input" id="editProductName" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Kategori <span class="required">*</span></label>
                    <select class="form-select" id="editProductCategory" required>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="fashion">Fashion</option>
                        <option value="kerajinan">Kerajinan</option>
                        <option value="rumah-tangga">Kebutuhan Rumah Tangga</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Harga <span class="required">*</span></label>
                    <input type="number" class="form-input" id="editProductPrice" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Stok <span class="required">*</span></label>
                    <input type="number" class="form-input" id="editProductStock" required min="0">
                    <div class="error-message" id="editStockError">Stok tidak boleh kosong atau bernilai negatif!</div>
                </div>

                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-textarea" id="editProductDescription"></textarea>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn-secondary" onclick="cancelEditProduct()">Batal</button>
                    <button type="submit" class="btn-primary">💾 Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>