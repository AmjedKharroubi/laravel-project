<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Management - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }
        .sidebar .nav-link {
            color: #333;
        }
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: white;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                                <i class="bi bi-house-door"></i> Dashboard
                            </a>
                        </li>
                        @can('manage-users')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                <i class="bi bi-people"></i> User Management
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('animals*') ? 'active' : '' }}" href="{{ route('animals.index') }}">
                                <i class="bi bi-egg"></i> Livestock
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('inventory*') ? 'active' : '' }}" href="{{ route('inventory.index') }}">
                                <i class="bi bi-box-seam"></i> Inventory
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('financial*') ? 'active' : '' }}" href="{{ route('financial.index') }}">
                                <i class="bi bi-cash-stack"></i> Financial Records
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('reports*') ? 'active' : '' }}" href="{{ route('reports.index') }}">
                                <i class="bi bi-file-earmark-text"></i> Reports
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>