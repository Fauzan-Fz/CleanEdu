<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Artikel - CleanEdu Energy</title>

    {{-- Google Fonts: Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* ==============================
           CSS VARIABLES & BASE
        ============================== */
        :root {
            --primary:        #2F9054;
            --primary-light:  #e8f5ee;
            --primary-dark:   #236e3f;
            --accent:         #F9C349;
            --bg:             #f8f9fa;
            --bg-card:        #ffffff;
            --text-main:      #1a1a1a;
            --text-muted:     #6c757d;
            --text-body:      #3a3a3a;
            --border:         #e8e8e8;
            --footer-bg:      #f1f3f2;
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
        }

        .navbar-nav .nav-link {
            font-size: 0.88rem;
            font-weight: 500;
            color: var(--text-main);
            padding: 0.5rem 0.85rem;
            position: relative;
            transition: color 0.2s;
        }

        .navbar-nav .nav-link:hover { color: var(--primary); }

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

        .btn-masuk {
            font-size: 0.84rem;
            font-weight: 500;
            color: var(--text-main);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: 0.35rem 1rem;
            background: transparent;
            transition: border-color 0.2s, color 0.2s;
            text-decoration: none;
        }

        .btn-masuk:hover { border-color: var(--primary); color: var(--primary); }

        .btn-daftar {
            font-size: 0.84rem;
            font-weight: 600;
            color: #fff;
            background-color: var(--primary);
            border: none;
            border-radius: 8px;
            padding: 0.37rem 1.1rem;
            transition: background-color 0.2s, transform 0.15s;
            text-decoration: none;
        }

        .btn-daftar:hover { background-color: var(--primary-dark); color: #fff; transform: translateY(-1px); }

        /* ==============================
           BREADCRUMB
        ============================== */
        .breadcrumb-wrap {
            padding: 1rem 0 0;
        }

        .breadcrumb {
            font-size: 0.8rem;
            margin-bottom: 0;
            --bs-breadcrumb-divider: '›';
        }

        .breadcrumb-item a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb-item a:hover { color: var(--primary); }

        .breadcrumb-item.active { color: var(--primary); font-weight: 500; }

        /* ==============================
           ARTICLE HEADER
        ============================== */
        .article-header {
            padding: 1.5rem 0 1.2rem;
            text-align: center;
        }

        .article-category-badge {
            display: inline-block;
            background-color: var(--primary-light);
            color: var(--primary);
            font-size: 0.78rem;
            font-weight: 600;
            padding: 0.25rem 0.85rem;
            border-radius: 50px;
            margin-bottom: 0.9rem;
        }

        .article-title {
            font-size: 1.85rem;
            font-weight: 700;
            color: var(--text-main);
            line-height: 1.3;
            max-width: 680px;
            margin: 0 auto 1rem;
        }

        .article-meta {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1.2rem;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .article-meta-item {
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }

        .article-meta-item i { font-size: 0.9rem; }

        .author-avatar {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* ==============================
           HERO IMAGE
        ============================== */
        .article-hero-img {
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 2.5rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            max-height: 400px;
        }

        .article-hero-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* ==============================
           ARTICLE CONTENT
        ============================== */
        .article-content-wrap {
            background: #fff;
            border-radius: 16px;
            border: 1px solid var(--border);
            padding: 2.2rem 2.4rem;
            margin-bottom: 2rem;
        }

        /* Drop cap */
        .article-body > p:first-of-type::first-letter {
            float: left;
            font-size: 3.2rem;
            font-weight: 700;
            line-height: 0.82;
            color: var(--primary);
            margin-right: 0.12em;
            margin-top: 0.06em;
            font-family: 'Poppins', sans-serif;
        }

        .article-body p {
            font-size: 0.9rem;
            line-height: 1.85;
            color: var(--text-body);
            margin-bottom: 1.1rem;
        }

        .article-body h2 {
            font-size: 1.22rem;
            font-weight: 700;
            color: var(--text-main);
            margin-top: 1.8rem;
            margin-bottom: 0.75rem;
        }

        .article-body h3 {
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--text-main);
            margin-top: 1.4rem;
            margin-bottom: 0.55rem;
        }

        /* Blockquote */
        .article-blockquote {
            background-color: var(--primary-light);
            border-left: 4px solid var(--primary);
            border-radius: 0 10px 10px 0;
            padding: 1.1rem 1.4rem;
            margin: 1.5rem 0;
            font-size: 0.88rem;
            color: var(--text-body);
            line-height: 1.75;
            font-style: italic;
        }

        /* Benefit list items */
        .benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .benefit-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background-color: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 0.1rem;
        }

        .benefit-icon i {
            font-size: 0.85rem;
            color: var(--primary);
        }

        .benefit-text strong {
            display: block;
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.15rem;
        }

        .benefit-text span {
            font-size: 0.83rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* ==============================
           SHARE BAR
        ============================== */
        .share-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid var(--border);
            padding-top: 1.2rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .share-label {
            font-size: 0.83rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        .share-icons {
            display: flex;
            gap: 0.5rem;
        }

        .share-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1.5px solid var(--border);
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }

        .share-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
            background-color: var(--primary-light);
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

        .footer-brand i { font-size: 1.2rem; }

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

        .footer-links a:hover { color: var(--primary); }

        /* ==============================
           RESPONSIVE
        ============================== */
        @media (max-width: 767.98px) {
            .article-title  { font-size: 1.35rem; }
            .article-content-wrap { padding: 1.3rem 1.1rem; }
            .footer-links   { justify-content: flex-start; margin-top: 1rem; }
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

        {{-- Right: Buttons --}}
        <div class="d-flex align-items-center gap-2">
            <a href="#" class="btn-masuk">Masuk</a>
            <a href="#" class="btn-daftar">Daftar</a>
        </div>

    </div>
</nav>

{{-- =================== MAIN CONTENT =================== --}}
<main>
    <div class="container">

        {{-- Breadcrumb --}}
        <div class="breadcrumb-wrap">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Artikel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Apa Itu Energi Surya?</li>
                </ol>
            </nav>
        </div>

        {{-- Article Header --}}
        <div class="article-header">
            <span class="article-category-badge">Energi Terbarukan</span>
            <h1 class="article-title">
                Apa Itu Energi Surya? Panduan Lengkap Untuk Masa Depan
            </h1>
            <div class="article-meta">
                <div class="article-meta-item">
                    <img
                        src="https://ui-avatars.com/api/?name=Tim+CleanEdu&background=2F9054&color=fff&size=64"
                        alt="Tim CleanEdu"
                        class="author-avatar">
                    <span>Oleh <strong>Tim CleanEdu</strong></span>
                </div>
                <div class="article-meta-item">
                    <i class="bi bi-calendar3"></i>
                    <span>31 Mei 2026</span>
                </div>
                <div class="article-meta-item">
                    <i class="bi bi-clock"></i>
                    <span>Waktu Baca: 6 menit</span>
                </div>
            </div>
        </div>

        {{-- Constrained content column --}}
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                {{-- Hero Image --}}
                <div class="article-hero-img" style="max-height:400px;">
                    <img
                        src="https://images.unsplash.com/photo-1509391366360-2e959784a276?w=900&auto=format&fit=crop&q=80"
                        alt="Panel Surya - Energi Matahari">
                </div>

                {{-- Article Content Card --}}
                <div class="article-content-wrap">
                    <div class="article-body">

                        {{-- Opening paragraph (drop-cap) --}}
                        <p>
                            Matahari adalah sumber energi paling melimpah yang kita miliki. Di era
                            modern ini, transisi menuju sumber daya yang lebih bersih dan
                            berkelanjutan bukan lagi sebuah pilihan, melainkan sebuah kebutuhan
                            mendesak untuk menjaga kelestarian bumi kita. Energi surya hadir sebagai
                            solusi utama dalam revolusi hijau ini.
                        </p>

                        <h2>Memahami Cara Kerja Energi Surya</h2>
                        <p>
                            Secara sederhana, energi surya adalah teknologi yang mengubah sinar matahari menjadi
                            energi listrik atau energi listrik yang dapat digunakan. Proses ini umumnya terjadi melalui
                            penggunaan panel surya (fotovoltaik) yang menangkap foton dari sinar matahari dan
                            menghasilkan elektron, menciptakan arus listrik searah (DC).
                        </p>

                        {{-- Blockquote --}}
                        <blockquote class="article-blockquote">
                            "Setiap jam, matahari memancarkan cukup energi ke permukaan bumi
                            untuk memenuhi kebutuhan energi global selama satu tahun penuh.
                            Tantangan kita hanyalah bagaimana menangkapnya."
                        </blockquote>

                        <h2>Mengapa Memilih Energi Surya?</h2>
                        <p>
                            Mengadopsi energi surya memberikan dampak positif yang luar biasa. Tidak hanya bagi
                            lingkungan, tetapi juga dari segi ekonomi personal dan nasional. Berikut adalah beberapa
                            manfaat utamanya:
                        </p>

                        {{-- Benefit list --}}
                        <div class="mt-3 mb-3">

                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="bi bi-leaf-fill"></i>
                                </div>
                                <div class="benefit-text">
                                    <strong>Sumber Daya Tak Terbatas dan Ramah Lingkungan</strong>
                                    <span>
                                        Berbeda dengan bahan bakar fosil, energi matahari tidak akan habis dan proses
                                        pembangkitannya tidak menghasilkan emisi gas rumah kaca yang memperburuk
                                        pemanasan bumi.
                                    </span>
                                </div>
                            </div>

                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="bi bi-graph-down-arrow"></i>
                                </div>
                                <div class="benefit-text">
                                    <strong>Pengurangan Tagihan Listrik Signifikan</strong>
                                    <span>
                                        Dengan memasang sistem panel surya di atap rumah, penggunaan jaringan listrik
                                        konvensional berkurang yang secara langsung memotong biaya tagihan bulanan
                                        Anda.
                                    </span>
                                </div>
                            </div>

                            <div class="benefit-item">
                                <div class="benefit-icon">
                                    <i class="bi bi-bar-chart-line-fill"></i>
                                </div>
                                <div class="benefit-text">
                                    <strong>Investasi Masa Depan</strong>
                                    <span>
                                        Pemasangan sistem panel surya meningkatkan nilai properti. Selain itu, biaya
                                        perawatannya sangat rendah sehingga menjadi investasi jangka panjang yang
                                        cerdas.
                                    </span>
                                </div>
                            </div>

                        </div>

                        <h2>Mulai Langkah Hijau Anda</h2>
                        <p>
                            Beralih ke energi surya kini lebih mudah daripada sebelumnya. Dengan berbagai
                            insentif dari pemerintah dan penurunan harga teknologi panel surya, saat ini adalah momen
                            yang tepat untuk berkontribusi pada masa depan yang berkelanjutan.
                        </p>

                    </div>{{-- /article-body --}}

                    {{-- Share Bar --}}
                    <div class="share-bar">
                        <span class="share-label">Bagikan artikel ini:</span>
                        <div class="share-icons">
                            <a href="#" class="share-btn" title="Bagikan ke media sosial">
                                <i class="bi bi-share-fill"></i>
                            </a>
                            <a href="#" class="share-btn" title="Salin tautan">
                                <i class="bi bi-link-45deg"></i>
                            </a>
                            <a href="#" class="share-btn" title="Kirim via email">
                                <i class="bi bi-envelope-fill"></i>
                            </a>
                        </div>
                    </div>

                </div>{{-- /article-content-wrap --}}

            </div>{{-- /col --}}
        </div>{{-- /row --}}

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
                    &copy; 2026 CleanEdu Energy. Menginspirasi masa depan berkelanjutan.
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

{{-- Bootstrap 5 JS Bundle --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>