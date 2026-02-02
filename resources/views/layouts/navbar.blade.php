<nav class="navbar navbar-light bg-white shadow-sm px-3">
    <div class="d-flex align-items-center gap-2">

        {{-- DESKTOP TOGGLE --}}
        <button id="toggleSidebar" class="btn btn-outline-secondary d-none d-lg-inline">
            ☰
        </button>

        {{-- MOBILE TOGGLE --}}
        <button class="btn btn-outline-secondary d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
            ☰
        </button>

        <span class="navbar-brand mb-0">Dashboard</span>
    </div>

    <span class="ms-auto">
        Halo, {{ Auth::user()->name ?? 'Guest' }}
    </span>
</nav>
