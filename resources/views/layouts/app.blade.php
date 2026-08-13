<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IdolLog - @yield('title', 'Dashboard')</title>

    {{-- Bootstrap 5 CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }
        .sidebar {
            min-height: calc(100vh - 56px);
            background-color: #343a40;
        }
        .sidebar .nav-link {
            color: #adb5bd;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #ffffff;
            background-color: #495057;
            border-radius: 5px;
        }
        .main-content {
            padding: 30px;
        }
        footer {
            background-color: #343a40;
            color: #adb5bd;
        }
    </style>

    @yield('styles')
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="bi bi-star-fill text-warning"></i> {{ __('messages.hi') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('activities.*') ? 'active' : '' }}" href="{{ route('activities.index') }}">
                            <i class="bi bi-calendar-event"></i> Activities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('statistics') ? 'active' : '' }}" href="{{ route('statistics') }}">
                            <i class="bi bi-bar-chart-line"></i> Statistics
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('idols.*') ? 'active' : '' }}" href="{{ route('idols.index') }}">
                            <i class="bi bi-stars"></i> Idols
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-center">
                    {{-- TODO: Implement Localization (Language Switcher) --}}
                    {{-- Connect these buttons to change the application locale --}}
                    <li class="nav-item me-2">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('change-language','en') }}" class="btn btn-outline-secondary btn-sm" >EN</a>
                            <a href="{{ route('change-language','id') }}" class="btn btn-outline-secondary btn-sm" >ID</a>
                            <a href="{{ route('change-language','ko') }}" class="btn btn-outline-secondary btn-sm" >한국어</a>
                        </div>
                    </li>

                    {{-- TODO: Show Login/Logout based on Auth::check() --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                    {{-- Logout placeholder (hidden until auth is implemented) --}}
                    {{-- <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Layout --}}
    <div class="container-fluid">
        <div class="row">

            {{-- Sidebar --}}
            <nav class="col-md-2 d-none d-md-block sidebar py-4 px-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-1">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link {{ request()->routeIs('activities.*') ? 'active' : '' }}" href="{{ route('activities.index') }}">
                            <i class="bi bi-calendar-event me-2"></i> Activities
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link {{ request()->routeIs('statistics') ? 'active' : '' }}" href="{{ route('statistics') }}">
                            <i class="bi bi-bar-chart-line me-2"></i> Statistics
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link {{ request()->routeIs('idols.*') ? 'active' : '' }}" href="{{ route('idols.index') }}">
                            <i class="bi bi-stars me-2"></i> Idols
                        </a>
                    </li>
                </ul>
            </nav>

            {{-- Main Content --}}
            <main class="col-md-10 main-content">
                @yield('content')
            </main>

        </div>
    </div>

    {{-- Footer --}}
    <footer class="py-3 mt-4">
        <div class="container-fluid text-center">
            <small><i class="bi bi-star-fill text-warning"></i> IdolLog &copy; {{ date('Y') }} — Final Laboratory Examination</small>
        </div>
    </footer>

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>
</html>
