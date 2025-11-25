@extends('template.master');

@section('content')
    <div class="container">

        <div class="banner">
            <div class="banner-text">
                <h2>Diskon Hingga 50%!</h2>
                <p>Dukung UMKM lokal dengan belanja produk pilihan</p>
                <button class="btn-promo">Belanja Sekarang</button>
            </div>
            <div class="banner-illustration">🎁</div>
        </div>

        <h3 class="section-title">Kategori Produk</h3>
        <div class="categories">
            <div class="category-card">
                <div class="category-icon">🍔</div>
                <div class="category-name">Jersey</div>
            </div>
            <div class="category-card">
                <div class="category-icon">☕</div>
                <div class="category-name">Jaket</div>
            </div>
            <div class="category-card">
                <div class="category-icon">👕</div>
                <div class="category-name">Topi</div>
            </div>
            <div class="category-card">
                <div class="category-icon">🎨</div>
                <div class="category-name">Sepatu</div>
            </div>
            <div class="category-card">
                <div class="category-icon">🏠</div>
                <div class="category-name">Kaos</div>
            </div>
        </div>

        <!-- Produk Unggulan -->
        <h3 class="section-title">Produk Unggulan</h3>
        <div class="products">
            <div class="product-card">
                <div class="product-image">🍪</div>
                <div class="product-info">
                    <div class="product-name">Kue Kering Premium</div>
                    <div class="product-price">Rp 45.000</div>
                    <div class="product-rating">
                        ⭐ 4.8 <span style="color: #999;">(120 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">☕</div>
                <div class="product-info">
                    <div class="product-name">Kopi Robusta Lokal</div>
                    <div class="product-price">Rp 35.000</div>
                    <div class="product-rating">
                        ⭐ 4.9 <span style="color: #999;">(85 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">👕</div>
                <div class="product-info">
                    <div class="product-name">Batik Modern</div>
                    <div class="product-price">Rp 125.000</div>
                    <div class="product-rating">
                        ⭐ 4.7 <span style="color: #999;">(95 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">🧺</div>
                <div class="product-info">
                    <div class="product-name">Tas Anyaman Rotan</div>
                    <div class="product-price">Rp 85.000</div>
                    <div class="product-rating">
                        ⭐ 4.6 <span style="color: #999;">(67 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">🍯</div>
                <div class="product-info">
                    <div class="product-name">Madu Murni Organik</div>
                    <div class="product-price">Rp 65.000</div>
                    <div class="product-rating">
                        ⭐ 5.0 <span style="color: #999;">(142 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">🧴</div>
                <div class="product-info">
                    <div class="product-name">Sabun Alami Herbal</div>
                    <div class="product-price">Rp 25.000</div>
                    <div class="product-rating">
                        ⭐ 4.8 <span style="color: #999;">(103 ulasan)</span>
                    </div>
                    <button class="add-to-cart">+ Keranjang</button>
                </div>
            </div>
        </div>
    </div>

    </body>

    </html>
@endsection
