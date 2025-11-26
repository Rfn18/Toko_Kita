<div class="bottom-nav">
    <div class="nav-item active">
        <div class="nav-icon">🏠</div>
        <div class="nav-label">Home</div>
    </div>
    <div class="nav-item">
        <div class="nav-icon">📦</div>
        <div class="nav-label">Kategori</div>
    </div>
    @auth
        <a href="{{ url('/keranjang') }}">
            <div class="nav-item">
                <div class="nav-icon">🛒</div>
                <div class="nav-label">Keranjang</div>
            </div>
        </a>
        <div class="nav-item">
            <div class="nav-icon">📜</div>
            <div class="nav-label">Riwayat</div>
        </div>
        <a href="{{ url('/profile') }}">
            <div class="nav-item">
                <div class="nav-icon">👤</div>
                <div class="nav-label">profile</div>
            </div>
        </a>
    @else
        <a href="{{ url('/login') }}">
            <div class="nav-item">
                <div class="nav-icon">👤</div>
                <div class="nav-label">login / regis</div>
            </div>
        </a>
    @endauth
</div>
