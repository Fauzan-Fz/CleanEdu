<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel - CleanEdu Energy</title>

    {{-- Google Fonts: Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* ==============================
           CSS VARIABLES & BASE
        ============================== */
        :root {
            --primary:       #2F9054;
            --primary-light: #e8f5ee;
            --primary-dark:  #236e3f;
            --accent:        #F9C349;
            --accent-dark:   #e0a c00;
            --bg:            #f8f9fa;
            --bg-card:       #ffffff;
            --text-main:     #1a1a1a;
            --text-muted:    #6c757d;
            --border:        #e8e8e8;
            --footer-bg:     #f1f3f2;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            font-size: 0.92rem;
        }

        /* ==============================
           NAVBAR
        ============================== */
        .navbar-cleanedu {
            background-color: #fff;
            border-bottom: 1px solid var(--border);
            padding: 0.75rem 0;
        }

        .navbar-brand-logo {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--primary) !important;
            text-decoration: none;
        }

        .navbar-brand-logo i {
            font-size: 1.3rem;
            color: var(--primary);
        }

        .navbar-nav .nav-link {
            font-size: 0.88rem;
            font-weight: 500;
            color: var(--text-main);
            padding: 0.5rem 0.85rem;
            position: relative;
            transition: color 0.2s;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary);
        }

        /* Active underline */
        .navbar-nav .nav-link.active {
            color: var(--primary) !important;
            font-weight: 600;
        }

        .navbar-nav .nav-link.active::after {
            content: '';
            display: block;
            position: absolute;
            bottom: -2px;
            left: 0.85rem;
            right: 0.85rem;
            height: 2.5px;
            background-color: var(--primary);
            border-radius: 2px;
        }

        /* Search */
        .search-wrap {
            position: relative;
        }

        .search-input {
            border-radius: 50px !important;
            border: 1.5px solid var(--border);
            padding: 0.38rem 2.2rem 0.38rem 1rem;
            font-size: 0.83rem;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            width: 190px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(47, 144, 84, 0.12);
            outline: none;
            background-color: #fff;
        }

        .search-icon {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.85rem;
            pointer-events: none;
        }

        /* Buttons */
        .btn-masuk {
            font-size: 0.84rem;
            font-weight: 500;
            color: var(--text-main);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: 0.35rem 1rem;
            background: transparent;
            transition: border-color 0.2s, color 0.2s;
        }

        .btn-masuk:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-daftar {
            font-size: 0.84rem;
            font-weight: 600;
            color: #fff;
            background-color: var(--primary);
            border: none;
            border-radius: 8px;
            padding: 0.37rem 1.1rem;
            transition: background-color 0.2s, transform 0.15s;
        }

        .btn-daftar:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* ==============================
           PAGE HERO
        ============================== */
        .page-hero {
            padding: 2.8rem 0 1.8rem;
        }

        .page-hero h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.4rem;
        }

        .page-hero p {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 0;
        }

        /* ==============================
           FILTER PILLS
        ============================== */
        .filter-bar {
            padding: 1rem 0 1.5rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.55rem;
        }

        .filter-pill {
            display: inline-block;
            padding: 0.35rem 1.05rem;
            border-radius: 50px;
            border: 1.5px solid var(--border);
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text-main);
            background: #fff;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }

        .filter-pill:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .filter-pill.active {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        /* ==============================
           ARTICLE CARD
        ============================== */
        .article-card {
            background: var(--bg-card);
            border-radius: 14px;
            border: 1px solid var(--border);
            overflow: hidden;
            transition: box-shadow 0.25s, transform 0.25s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .article-card:hover {
            box-shadow: 0 8px 28px rgba(47, 144, 84, 0.13);
            transform: translateY(-4px);
        }

        /* Card image wrapper */
        .card-img-wrap {
            position: relative;
            width: 100%;
            height: 175px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .article-card:hover .card-img-wrap img {
            transform: scale(1.05);
        }

        /* Category badge */
        .card-badge {
            position: absolute;
            top: 0.65rem;
            left: 0.65rem;
            padding: 0.22rem 0.7rem;
            border-radius: 50px;
            font-size: 0.74rem;
            font-weight: 600;
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
        }

        .badge-solar    { background: rgba(249, 195, 73, 0.88);  color: #5a3d00; }
        .badge-angin    { background: rgba(47, 144, 84, 0.88);   color: #fff; }
        .badge-biomassa { background: rgba(139, 92, 246, 0.82);  color: #fff; }
        .badge-geo      { background: rgba(239, 68, 68, 0.82);   color: #fff; }
        .badge-tips     { background: rgba(249, 195, 73, 0.92);  color: #5a3d00; }
        .badge-lingk    { background: rgba(59, 130, 246, 0.82);  color: #fff; }

        /* Card body */
        .card-body-custom {
            padding: 1.1rem 1.15rem 0.9rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .card-title-custom {
            font-size: 0.97rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.4rem;
            line-height: 1.35;
        }

        .card-excerpt {
            font-size: 0.82rem;
            color: var(--text-muted);
            line-height: 1.55;
            margin-bottom: 0.9rem;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-meta {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.78rem;
            color: var(--text-muted);
            border-top: 1px solid #f0f0f0;
            padding-top: 0.65rem;
        }

        .card-meta i {
            font-size: 0.9rem;
        }

        /* ==============================
           PAGINATION
        ============================== */
        .pagination-custom {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.3rem;
            padding: 2rem 0 2.5rem;
        }

        .page-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1.5px solid var(--border);
            background: #fff;
            font-size: 0.84rem;
            font-weight: 500;
            color: var(--text-main);
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }

        .page-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .page-btn.active {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff;
            font-weight: 600;
        }

        .page-btn.arrow {
            color: var(--text-muted);
        }

        /* ==============================
           FOOTER
        ============================== */
        .footer-cleanedu {
            background-color: var(--footer-bg);
            border-top: 1px solid var(--border);
            padding: 1.8rem 0;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-weight: 700;
            font-size: 0.97rem;
            color: var(--primary);
            margin-bottom: 0.4rem;
        }

        .footer-brand i {
            font-size: 1.2rem;
        }

        .footer-copy {
            font-size: 0.78rem;
            color: var(--text-muted);
            margin: 0;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 1.2rem;
            justify-content: flex-end;
            align-items: center;
        }

        .footer-links a {
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        /* ==============================
           RESPONSIVE TWEAKS
        ============================== */
        @media (max-width: 767.98px) {
            .search-input { width: 140px; }
            .page-hero h1 { font-size: 1.5rem; }
            .footer-links { justify-content: flex-start; margin-top: 1rem; }
        }
    </style>
</head>
<body>

{{-- =================== NAVBAR =================== --}}
<nav class="navbar navbar-cleanedu sticky-top">
    <div class="container">

        {{-- Brand / Logo --}}
        <a href="#" class="navbar-brand-logo">
            <i class="bi bi-lightning-charge-fill"></i>
            CleanEdu Energy
        </a>

        {{-- Nav links (center) --}}
        <ul class="navbar-nav flex-row gap-1 d-none d-md-flex mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Artikel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kursus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Komunitas</a>
            </li>
        </ul>

        {{-- Right: Search + Buttons --}}
        <div class="d-flex align-items-center gap-2">
            <div class="search-wrap d-none d-lg-block">
                <input type="text" class="form-control search-input" placeholder="Cari sesuatu...">
                <i class="bi bi-search search-icon"></i>
            </div>
            <a href="#" class="btn btn-masuk">Masuk</a>
            <a href="#" class="btn btn-daftar">Daftar</a>
        </div>

    </div>
</nav>

{{-- =================== MAIN CONTENT =================== --}}
<main>
    <div class="container">

        {{-- Page Hero --}}
        <div class="page-hero">
            <h1>Artikel</h1>
            <p>Temukan berbagai artikel menarik tentang energi bersih.</p>
        </div>

        {{-- Filter Pills --}}
        <div class="filter-bar">
            <a href="#" class="filter-pill active">Semua</a>
            <a href="#" class="filter-pill">Energi Terbarukan</a>
            <a href="#" class="filter-pill">Hemat Energi</a>
            <a href="#" class="filter-pill">Teknologi Hijau</a>
            <a href="#" class="filter-pill">Lingkungan</a>
        </div>

        {{-- Article Grid --}}
        <div class="row g-4">

            {{-- Card 1: Energi Surya --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="article-card">
                    <div class="card-img-wrap">
                        <img
                            src="https://images.unsplash.com/photo-1509391366360-2e959784a276?w=600&auto=format&fit=crop&q=80"
                            alt="Energi Surya">
                        <span class="card-badge badge-solar">Energi Surya</span>
                    </div>
                    <div class="card-body-custom">
                        <h5 class="card-title-custom"><a href="{{ route('artikel.detail', 'apa-itu-energi-surya') }}" class="text-decoration-none text-dark">Apa Itu Energi Surya?</a></h5>
                        <p class="card-excerpt">
                            Pelajari bagaimana energi matahari dapat menjadi solusi masa depan yang berkelanjutan dan terjangkau bagi jutaan rumah tangga.
                        </p>
                        <div class="card-meta">
                            <i class="bi bi-clock"></i>
                            <span>5 menit baca</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card 2: Energi Angin --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="article-card">
                    <div class="card-img-wrap">
                        <img
                            src="https://images.unsplash.com/photo-1466611653911-95081537e5b7?w=600&auto=format&fit=crop&q=80"
                            alt="Energi Angin">
                        <span class="card-badge badge-angin">Energi Angin</span>
                    </div>
                    <div class="card-body-custom">
                        <h5 class="card-title-custom"><a href="{{ route('artikel.detail', 'manfaat-energi-angin') }}" class="text-decoration-none text-dark">Manfaat Energi Angin</a></h5>
                        <p class="card-excerpt">
                            Mengenal lebih jauh manfaat energi angin bagi kehidupan kita dan potensinya yang besar sebagai sumber energi terbarukan.
                        </p>
                        <div class="card-meta">
                            <i class="bi bi-clock"></i>
                            <span>4 menit baca</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card 3: Biomassa --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="article-card">
                    <div class="card-img-wrap">
                        <img
                            src="https://images.unsplash.com/photo-1448375240586-882707db888b?w=600&auto=format&fit=crop&q=80"
                            alt="Biomassa">
                        <span class="card-badge badge-biomassa">Biomassa</span>
                    </div>
                    <div class="card-body-custom">
                        <h5 class="card-title-custom"><a href="{{ route('artikel.detail', 'biomassa-energi-dari-alam') }}" class="text-decoration-none text-dark">Biomassa: Energi dari Alam</a></h5>
                        <p class="card-excerpt">
                            Memanfaatkan bahan organik sebagai sumber energi terbarukan yang ramah lingkungan dan mudah diakses masyarakat luas.
                        </p>
                        <div class="card-meta">
                            <i class="bi bi-clock"></i>
                            <span>6 menit baca</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card 4: Geotermal --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="article-card">
                    <div class="card-img-wrap">
                        <img
                            src="https://images.unsplash.com/photo-1561557944-6e7860d1a7eb?w=600&auto=format&fit=crop&q=80"
                            alt="Geotermal">
                        <span class="card-badge badge-geo">Geotermal</span>
                    </div>
                    <div class="card-body-custom">
                        <h5 class="card-title-custom"><a href="{{ route('artikel.detail', 'geotermal-panas-dari-bumi') }}" class="text-decoration-none text-dark">Geotermal: Panas dari Bumi</a></h5>
                        <p class="card-excerpt">
                            Mengenal energi panas bumi dan potensinya di Indonesia sebagai alternatif bahan bakar fosil yang terus menipis.
                        </p>
                        <div class="card-meta">
                            <i class="bi bi-clock"></i>
                            <span>5 menit baca</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card 5: Hemat Listrik --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="article-card">
                    <div class="card-img-wrap">
                        <img
                            src="https://images.unsplash.com/photo-1518717758536-85ae29035b6d?w=600&auto=format&fit=crop&q=80"
                            alt="Hemat Listrik">
                        <span class="card-badge badge-tips">Tips</span>
                    </div>
                    <div class="card-body-custom">
                        <h5 class="card-title-custom"><a href="{{ route('artikel.detail', 'hemat-listrik-di-rumah') }}" class="text-decoration-none text-dark">Hemat Listrik di Rumah</a></h5>
                        <p class="card-excerpt">
                            Tips praktis menghemat listrik yang bisa dilakukan setiap hari untuk mengurangi tagihan dan jejak karbon rumah Anda.
                        </p>
                        <div class="card-meta">
                            <i class="bi bi-clock"></i>
                            <span>4 menit baca</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card 6: Dampak Energi Fosil --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="article-card">
                    <div class="card-img-wrap">
                        <img
                            src="https://images.unsplash.com/photo-1581090464777-f3220bbe1b8b?w=600&auto=format&fit=crop&q=80"
                            alt="Dampak Energi Fosil">
                        <span class="card-badge badge-lingk">Lingkungan</span>
                    </div>
                    <div class="card-body-custom">
                        <h5 class="card-title-custom"><a href="{{ route('artikel.detail', 'dampak-energi-fosil') }}" class="text-decoration-none text-dark">Dampak Energi Fosil</a></h5>
                        <p class="card-excerpt">
                            Memahami dampak penggunaan energi fosil bagi lingkungan dan urgensi transisi menuju energi bersih yang berkelanjutan.
                        </p>
                        <div class="card-meta">
                            <i class="bi bi-clock"></i>
                            <span>6 menit baca</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- /row --}}

        {{-- Pagination --}}
        <div class="pagination-custom">
            <a href="#" class="page-btn arrow"><i class="bi bi-chevron-left"></i></a>
            <a href="#" class="page-btn active">1</a>
            <a href="#" class="page-btn">2</a>
            <a href="#" class="page-btn">3</a>
            <a href="#" class="page-btn arrow"><i class="bi bi-chevron-right"></i></a>
        </div>

    </div>{{-- /container --}}
</main>

{{-- =================== FOOTER =================== --}}
<footer class="footer-cleanedu">
    <div class="container">
        <div class="row align-items-center">

            {{-- Left: Brand + Copyright --}}
            <div class="col-12 col-md-5">
                <div class="footer-brand">
                    <i class="bi bi-lightning-charge-fill"></i>
                    CleanEdu Energy
                </div>
                <p class="footer-copy">
                    &copy; 2024 CleanEdu Energy. Menginspirasi masa depan berkelanjutan.
                </p>
            </div>

            {{-- Right: Footer Links --}}
            <div class="col-12 col-md-7">
                <div class="footer-links">
                    <a href="#">Tentang Kami</a>
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Syarat &amp; Ketentuan</a>
                    <a href="#">Bantuan</a>
                    <a href="#">Kontak</a>
                </div>
            </div>

        </div>
    </div>
</footer>

{{-- Bootstrap 5 JS Bundle (Popper included) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Filter pill active state toggle
    document.querySelectorAll('.filter-pill').forEach(function (pill) {
        pill.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Pagination active state toggle
    document.querySelectorAll('.page-btn:not(.arrow)').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelectorAll('.page-btn:not(.arrow)').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>

</body>
</html>