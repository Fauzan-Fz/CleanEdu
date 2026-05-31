<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Terkait - CleanEdu Energy</title>

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
            --primary:        #2F9054;
            --primary-light:  #e8f5ee;
            --primary-dark:   #236e3f;
            --accent:         #F9C349;
            --bg:             #f8f9fa;
            --bg-card:        #ffffff;
            --text-main:      #1a1a1a;
            --text-muted:     #6c757d;
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
           RELATED ARTICLES SECTION
        ============================== */
        .related-section {
            background-color: #fff;
            padding: 2.8rem 0 3rem;
        }

        /* Section header */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.6rem;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-main);
            margin: 0;
        }

        .see-all-link {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.84rem;
            font-weight: 600;
            color: var(--primary);
            text-decoration: none;
            transition: gap 0.2s, color 0.2s;
        }

        .see-all-link:hover {
            color: var(--primary-dark);
            gap: 0.55rem;
        }

        .see-all-link i {
            font-size: 0.9rem;
            transition: transform 0.2s;
        }

        .see-all-link:hover i {
            transform: translateX(3px);
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
            cursor: pointer;
        }

        .article-card:hover {
            box-shadow: 0 8px 28px rgba(47, 144, 84, 0.13);
            transform: translateY(-4px);
        }

        /* Image wrapper */
        .card-img-wrap {
            position: relative;
            width: 100%;
            height: 170px;
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
            padding: 0.22rem 0.72rem;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 600;
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
        }

        .badge-angin   { background: rgba(47, 144, 84, 0.88);   color: #fff; }
        .badge-tips    { background: rgba(249, 195, 73, 0.92);  color: #5a3d00; }
        .badge-biomassa{ background: rgba(139, 92, 246, 0.82);  color: #fff; }

        /* Card body */
        .card-body-custom {
            padding: 1rem 1.1rem 0.9rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .card-title-custom {
            font-size: 0.93rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.7rem;
            line-height: 1.38;
            flex: 1;
        }

        .card-meta {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.77rem;
            color: var(--text-muted);
            padding-top: 0.6rem;
            border-top: 1px solid #f0f0f0;
        }

        .card-meta i { font-size: 0.88rem; }

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
            text-decoration: none;
        }

        .footer-brand i { font-size: 1.2rem; }

        .footer-copy {
            font-size: 0.78rem;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.6;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 1.25rem;
            justify-content: flex-end;
            align-items: center;
        }

        .footer-links a {
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
            white-space: nowrap;
        }

        .footer-links a:hover { color: var(--primary); }

        /* ==============================
           RESPONSIVE
        ============================== */
        @media (max-width: 767.98px) {
            .section-title     { font-size: 1.05rem; }
            .footer-links      { justify-content: flex-start; margin-top: 1rem; }
        }
    </style>
</head>
<body>

{{-- =================== ARTIKEL TERKAIT SECTION =================== --}}
{{--
    Catatan penggunaan di Laravel:
    Komponen ini dirancang sebagai section mandiri yang bisa disisipkan
    di bagian bawah halaman detail artikel, misalnya:
    @include('partials.artikel-terkait', ['artikelTerkait' => $related])
--}}
<section class="related-section">
    <div class="container">

        {{-- Section Header --}}
        <div class="section-header">
            <h2 class="section-title">Artikel Terkait</h2>
            <a href="#" class="see-all-link">
                Lihat Semua
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        {{-- Cards Grid: 3 kolom --}}
        <div class="row g-4">

            {{-- Card 1: Potensi Energi Angin di Indonesia --}}
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="#" class="text-decoration-none">
                    <div class="article-card">
                        <div class="card-img-wrap">
                            <img
                                src="https://images.unsplash.com/photo-1466611653911-95081537e5b7?w=600&auto=format&fit=crop&q=80"
                                alt="Potensi Energi Angin di Indonesia">
                            <span class="card-badge badge-angin">Energi Angin</span>
                        </div>
                        <div class="card-body-custom">
                            <h5 class="card-title-custom">
                                Potensi Energi Angin di Indonesia
                            </h5>
                            <div class="card-meta">
                                <i class="bi bi-clock"></i>
                                <span>4 menit baca</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Card 2: Cara Memulai Gaya Hidup Hemat Energi --}}
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="#" class="text-decoration-none">
                    <div class="article-card">
                        <div class="card-img-wrap">
                            <img
                                src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&auto=format&fit=crop&q=80"
                                alt="Cara Memulai Gaya Hidup Hemat Energi">
                            <span class="card-badge badge-tips">Tips</span>
                        </div>
                        <div class="card-body-custom">
                            <h5 class="card-title-custom">
                                Cara Memulai Gaya Hidup Hemat Energi
                            </h5>
                            <div class="card-meta">
                                <i class="bi bi-clock"></i>
                                <span>4 menit baca</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Card 3: Mengenal Biomassa Sebagai Alternatif --}}
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="#" class="text-decoration-none">
                    <div class="article-card">
                        <div class="card-img-wrap">
                            <img
                                src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=600&auto=format&fit=crop&q=80"
                                alt="Mengenal Biomassa Sebagai Alternatif">
                            <span class="card-badge badge-biomassa">Biomassa</span>
                        </div>
                        <div class="card-body-custom">
                            <h5 class="card-title-custom">
                                Mengenal Biomassa Sebagai Alternatif
                            </h5>
                            <div class="card-meta">
                                <i class="bi bi-clock"></i>
                                <span>5 menit baca</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>{{-- /row --}}

    </div>{{-- /container --}}
</section>


{{-- =================== FOOTER =================== --}}
<footer class="footer-cleanedu">
    <div class="container">
        <div class="row align-items-center">

            {{-- Left: Brand + Copyright --}}
            <div class="col-12 col-md-5">
                <a href="#" class="footer-brand">
                    <i class="bi bi-lightning-charge-fill"></i>
                    CleanEdu Energy
                </a>
                <p class="footer-copy">
                    &copy; 2024 CleanEdu Energy. Menginspirasi masa<br class="d-none d-md-inline">
                    depan berkelanjutan.
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