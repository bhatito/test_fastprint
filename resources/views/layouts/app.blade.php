<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">


    <style>
        body {
            background: #f4f6f9;
            font-family: 'Inter', system-ui, sans-serif;
            overflow-x: hidden;
        }

        .navbar {
            background: linear-gradient(90deg, #4f46e5, #6366f1);
            box-shadow: 0 6px 18px rgba(0, 0, 0, .15);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: .3px;
        }

        .nav-link {
            color: #eef2ff !important;
            font-weight: 500;
        }

        .nav-link:hover {
            opacity: .85;
        }

        .main-content {
            padding: 24px;
            min-height: calc(100vh - 120px);
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        table.dataTable {
            width: 100% !important;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 8px;
            padding: 6px 10px;
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 8px;
        }

        footer {
            background: #111827;
            color: #9ca3af;
            padding: 12px;
            font-size: 13px;
            text-align: center;
        }
    </style>
</head>

<body>

    @include('layouts.navbar')

    <div class="main-content">
        @yield('content')
    </div>

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    @stack('scripts')
</body>

</html>
