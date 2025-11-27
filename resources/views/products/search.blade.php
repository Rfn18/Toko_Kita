@extends('template.master')

@section('content')
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

    <!-- Main Content -->
    <div class="container">

        <!-- Produk Unggulan -->
        <div class="products">
            @if ($products->isEmpty())
                <h1>Pencarian untuk : {{ $keyword }}</h1>
            @else
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
                                <form action="{{ route('customer.keranjang.store') }}" method="POST" class="addToCard">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $p->id }}">
                                    <button type="submit" class="add-to-cart">+ Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif

        </div>
    </div>
@endsection
