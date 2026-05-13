<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestion Universitaire</title>

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f6fb;
            min-height: 100vh;
        }

        .navbar {
            background: #fff !important;
            border-bottom: 1px solid #e9ecef;
            padding: 0 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 18px;
            color: #185FA5 !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand svg {
            width: 28px;
            height: 28px;
        }

        .nav-link {
            font-size: 14px;
            color: #6c757d !important;
            font-weight: 500;
            padding: 8px 14px !important;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background: #f0f4fb;
            color: #185FA5 !important;
        }

        .nav-link.active {
            color: #185FA5 !important;
        }

        .btn-logout {
            font-size: 13px;
            color: #dc3545 !important;
        }

        .btn-logout:hover {
            background: #fff0f0 !important;
            color: #dc3545 !important;
        }

        .user-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #185FA5;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            background: #e6f1fb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: #185FA5;
        }

        .dropdown-menu {
            border: 0.5px solid #e9ecef;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            padding: 6px;
        }

        .dropdown-item {
            border-radius: 8px;
            font-size: 13px;
            padding: 8px 12px;
            color: #495057;
        }

        .dropdown-item:hover {
            background: #f0f4fb;
            color: #185FA5;
        }

        .role-badge {
            font-size: 11px;
            padding: 2px 10px;
            border-radius: 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .role-admin    { background: #e6f1fb; color: #185FA5; }
        .role-enseignant { background: #e1f5ee; color: #0F6E56; }
        .role-etudiant { background: #faeeda; color: #854F0B; }

        main {
            padding: 32px 0;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#185FA5" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3L2 8l10 5 10-5-10-5z" />
                        <path d="M2 16l10 5 10-5" />
                        <path d="M2 12l10 5 10-5" />
                    </svg>
                    UniGestion
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/dashboard">🛡️ Dashboard Admin</a>
                                </li>
                            @elseif(auth()->user()->role === 'enseignant')
                                <li class="nav-item">
                                    <a class="nav-link" href="/enseignant/dashboard">📚 Dashboard Enseignant</a>
                                </li>
                            @elseif(auth()->user()->role === 'etudiant')
                                <li class="nav-item">
                                    <a class="nav-link" href="/etudiant/dashboard">🎓 Dashboard Étudiant</a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                    {{ auth()->user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><span class="dropdown-item-text">{{ auth()->user()->email }}</span></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container">
            @yield('content')
        </main>
    </div>
</body>
</html>
