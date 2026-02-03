<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top py-3">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <div class="bg-white rounded-circle p-2 me-2 d-flex align-items-center justify-content-center"
                style="width: 35px; height: 35px;">
                <i class="bi bi-box-seam text-primary"></i>
            </div>
            <span>Fast<span class="text-warning">Print</span></span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('dashboard*') ? 'active fw-bold' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2 me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('produk*') ? 'active fw-bold' : '' }}"
                        href="{{ route('produk.index') }}">
                        <i class="bi bi-collection me-1"></i> Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('kategori*') ? 'active fw-bold' : '' }}"
                        href="{{ route('kategori.index') }}">
                        <i class="bi bi-tags me-1"></i> Kategori
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('status*') ? 'active fw-bold' : '' }}"
                        href="{{ route('status.index') }}">
                        <i class="bi bi-check-circle me-1"></i> Status
                    </a>
                </li>

                <li class="nav-item ms-lg-3">
                    <a class="btn btn-light text-danger fw-bold rounded-pill px-4 shadow-sm"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-1"></i> Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
