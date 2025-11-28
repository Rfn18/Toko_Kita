<div class="bottom-nav">
    <a href="{{ url('/') }}">
        <div class="nav-item">
            <div class="nav-icon">🏠</div>
            <div class="nav-label">Home</div>
        </div>
    </a>
    <a href="{{ url('/kategori') }}">
        <div class="nav-item">
            <div class="nav-icon">📦</div>
            <div class="nav-label">Kategori</div>
        </div>
    </a>
    @auth
        <a href="{{ url('/keranjang') }}">
            <div class="nav-item">
                <div class="nav-icon">🛒</div>
                <div class="nav-label">Keranjang</div>
            </div>
        </a>
        <a href="{{ url('/riwayat') }}">
            <div class="nav-item">
                <div class="nav-icon">📜</div>
                <div class="nav-label">Riwayat</div>
            </div>
        </a>
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
