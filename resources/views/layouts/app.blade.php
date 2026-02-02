<!DOCTYPE html>
<html lang="id" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 70px;
            --top-navbar-height: 56px;
        }

        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background-color: #f5f7fb;
            overflow-x: hidden;
        }

        #app {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #main-wrapper {
            display: flex;
            flex: 1;
        }

        #sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background-color: #212529;
            transition: width 0.3s ease;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        #sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        #sidebar.collapsed .sidebar-text {
            display: none;
        }

        #main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .navbar.fixed-top {
            height: var(--top-navbar-height);
            z-index: 1030;
        }

        main {
            flex: 1 0 auto;
            padding: 1.5rem;
        }

        footer {
            flex-shrink: 0;
            background-color: #343a40;
            color: white;
            padding: 1rem 1.5rem;
            text-align: center;
            border-top: 1px solid #495057;
        }

        /* Mobile adjustments */
        @media (max-width: 991.98px) {
            #sidebar {
                position: fixed !important;
                z-index: 1040;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            #sidebar.show {
                transform: translateX(0);
            }

            #main-content {
                margin-left: 0 !important;
            }

            .offcanvas.offcanvas-start {
                width: 85vw !important;
                max-width: 320px;
            }
        }

        @media (min-width: 992px) {
            #sidebar-toggle-btn {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div id="app">
        <!-- Navbar (fixed top) -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
            <div class="container-fluid">
                <!-- Hamburger untuk mobile + toggle collapse sidebar di desktop -->
                <button id="sidebar-toggle-btn" class="navbar-toggler me-3 d-lg-none" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand fw-bold" href="#">Admin Panel</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-bell"></i></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> Bhatito
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="main-wrapper">
            <!-- Sidebar Desktop (sticky) -->
            <aside id="sidebar" class="d-none d-lg-block text-white">
                @include('layouts.sidebar') <!-- ← isi menu sidebar kamu di sini -->
            </aside>

            <!-- Offcanvas Sidebar untuk Mobile -->
            <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="mobileSidebar"
                aria-labelledby="mobileSidebarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0">
                    @include('layouts.sidebar')
                </div>
            </div>

            <!-- Main Content Area -->
            <div id="main-content">
                <main class="mt-5 pt-3"> <!-- offset navbar height -->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </main>

                <!-- Footer (push to bottom) -->
                <footer>
                    <div class="container-fluid">
                        <p class="mb-0">&copy; {{ date('Y') }} Admin Dashboard - Dibuat dengan Laravel & Bootstrap
                            5</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    @stack('scripts')

</body>

</html>
