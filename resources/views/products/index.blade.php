@extends('template.master')

@section('content')
    <!-- Main Content -->
    <div class="container">
        <!-- Banner Promo -->
        <div class="banner">
            <div class="banner-text">
                <h2>Diskon Hingga 50%!</h2>
                <p>Dukung UMKM lokal dengan belanja produk pilihan</p>
                <button class="btn-promo">Belanja Sekarang</button>
            </div>
            <div class="banner-illustration">🎁</div>
        </div>

        <!-- Kategori Produk -->
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
            @foreach ($products as $p)
                <a href="/produk/{{ $p->id }}">
                    <div class="product-card">
                        <div class="product-image"><img src="{{ asset('storage/' . $p->gambar) }}" /></div>
                        <div class="product-info">
                            <div class="product-name">{{ $p->nama_produk }}</div>
                            <div class="product-price">Rp. {{ number_format($p->harga) }}</div>
                            <div class="product-sold">
                                {{ $p->stok }} barang tersedia</span>
                            </div>
                            <button class="add-to-cart">+ Keranjang</button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
