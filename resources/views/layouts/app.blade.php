<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Clean Edu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background-color: #f8f9fa;
            color: #1f2937;
        }

        body {
            min-height: 100vh;
            background: #f8f9fa;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: .08em;
        }

        .btn-brand {
            background: #2c7df0;
            color: #fff;
        }

        .btn-brand:hover {
            background: #1a66d1;
        }

        .nav-link {
            color: #334155 !important;
            font-weight: 600;
            font-size: 0.85rem;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: #334155 !important;
        }

        .card-ghost {
            border: 1px solid rgba(59, 130, 246, .12);
            background: #fff;
            box-shadow: 0 18px 35px rgba(15, 23, 42, .06);
        }

        .section-title {
            letter-spacing: .05em;
            font-weight: 700;
        }

        .hero {
            min-height: 70vh;
        }

        footer small {
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .hero {
                min-height: 55vh;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
        <div class="container-fluid px-4">
            <!-- Logo Branding -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('welcome') }}" style="text-decoration: none; gap: 12px;">
                <div style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: linear-gradient(135deg, #fcdb7d, #ecc152); border-radius: 10px; color: #2d3748;">
                    <i class="bi bi-lightbulb-fill" style="font-size: 1.5rem;"></i>
                </div>
                <div class="d-flex flex-column" style="line-height: 1;">
                    <span class="fw-bold text-dark" style="font-size: 1.1rem;">CleanEdu</span>
                    <span class="text-muted" style="font-size: 10px; margin-top: -2px; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 500;">Energy</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <!-- Right Nav Links -->
                <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0 d-flex align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/artikel">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="/video">Video</a></li>
                </ul>

                <!-- Right Side: Search & CTA -->
                <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
                    <input type="text" class="form-control" placeholder="Cari..." style="border-radius: 50px; padding: 6px 14px; border: 1px solid #e5e7eb; background: #f9fafb; width: 150px; font-size: 0.85rem;" />
                    
                    @if(session()->has('logged_in') && session('logged_in'))
                        <span class="text-secondary d-none d-lg-inline small">{{ session('user_name') }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary btn-sm" style="font-size: 0.785rem; padding: 6px 16px; border-radius: 50px;">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary d-none d-lg-inline" style="font-size: 0.785rem; padding: 6px 16px; border-radius: 50px;">Masuk</a>
                        <a href="{{ route('register') }}" class="btn fw-bold" style="background-color: #fcdb7d; border: none; color: #2d3748; font-size: 0.785rem; padding: 6px 16px; border-radius: 50px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">Daftar</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="py-4">
        <div class="container border-top pt-4 text-center">
            <p class="mb-1">Clean Edu &copy; {{ date('Y') }}. Platform pembelajaran digital yang bersih dan modern.</p>
            <small>Minimalis, responsif, dan siap digunakan.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>
