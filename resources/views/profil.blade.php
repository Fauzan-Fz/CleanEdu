<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - CleanEdu Energy</title>

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
            --bg:            #f5f5f3;
            --bg-card:       #ffffff;
            --text-main:     #1a1a1a;
            --text-muted:    #6c757d;
            --border:        #e4e4e4;
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
            padding: 0.7rem 0;
        }

        .navbar-brand-logo {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-weight: 700;
            font-size: 1rem;
            color: var(--primary) !important;
            text-decoration: none;
        }

        .navbar-brand-logo .brand-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .navbar-brand-logo .brand-icon i {
            color: #fff;
            font-size: 0.9rem;
        }

        .navbar-nav .nav-link {
            font-size: 0.86rem;
            font-weight: 500;
            color: var(--text-main);
            padding: 0.5rem 0.8rem;
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
            left: 0.8rem;
            right: 0.8rem;
            height: 2.5px;
            background-color: var(--primary);
            border-radius: 2px;
        }

        /* Search */
        .search-wrap { position: relative; }

        .search-input {
            border-radius: 50px !important;
            border: 1.5px solid var(--border);
            padding: 0.35rem 2.1rem 0.35rem 0.9rem;
            font-size: 0.81rem;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            width: 180px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(47,144,84,0.1);
            outline: none;
            background-color: #fff;
        }

        .search-icon {
            position: absolute;
            right: 0.7rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.82rem;
            pointer-events: none;
        }

        /* User avatar in navbar */
        .nav-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary);
            cursor: pointer;
        }

        /* ==============================
           PAGE HEADER
        ============================== */
        .page-header {
            padding: 2rem 0 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.9rem;
        }

        .page-header-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary);
        }

        .page-header h1 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--text-main);
            margin: 0;
        }

        /* ==============================
           PROFILE SIDEBAR
        ============================== */
        .profile-sidebar {
            background: var(--bg-card);
            border-radius: 16px;
            border: 1px solid var(--border);
            padding: 1.6rem 1.4rem;
            text-align: center;
        }

        .sidebar-avatar-wrap {
            position: relative;
            display: inline-block;
            margin-bottom: 0.9rem;
        }

        .sidebar-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary);
            display: block;
        }

        .sidebar-avatar-edit {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .sidebar-avatar-edit i {
            font-size: 0.65rem;
            color: #fff;
        }

        .sidebar-name {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.15rem;
        }

        .sidebar-email {
            font-size: 0.78rem;
            color: var(--text-muted);
            margin-bottom: 0.7rem;
        }

        .sidebar-role-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            background-color: var(--primary-light);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.22rem 0.75rem;
            border-radius: 50px;
            margin-bottom: 1rem;
        }

        /* Level progress */
        .level-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.76rem;
            font-weight: 500;
            color: var(--text-muted);
            margin-bottom: 0.35rem;
        }

        .level-label { color: var(--text-main); font-weight: 600; }

        .level-progress {
            height: 7px;
            border-radius: 50px;
            background-color: #e0e0e0;
            overflow: hidden;
            margin-bottom: 1.1rem;
        }

        .level-bar {
            height: 100%;
            width: 45%; /* 450/1000 */
            background-color: var(--primary);
            border-radius: 50px;
        }

        /* Stats row */
        .stats-row {
            display: flex;
            justify-content: space-around;
            border-top: 1px solid #f0f0f0;
            padding-top: 1rem;
        }

        .stat-item { text-align: center; }

        .stat-value {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-main);
            display: block;
            line-height: 1.2;
        }

        .stat-label {
            font-size: 0.72rem;
            color: var(--text-muted);
            display: block;
        }

        /* ==============================
           TAB NAVIGATION
        ============================== */
        .profile-tabs {
            border-bottom: 1px solid var(--border);
            margin-bottom: 1.3rem;
            flex-wrap: nowrap;
            overflow-x: auto;
        }

        .profile-tabs .nav-link {
            font-size: 0.84rem;
            font-weight: 500;
            color: var(--text-muted);
            padding: 0.6rem 0.9rem;
            border: none;
            border-bottom: 2.5px solid transparent;
            border-radius: 0;
            white-space: nowrap;
            background: transparent;
            transition: color 0.2s, border-color 0.2s;
        }

        .profile-tabs .nav-link:hover { color: var(--primary); }

        .profile-tabs .nav-link.active {
            color: var(--primary) !important;
            font-weight: 600;
            border-bottom-color: var(--primary);
            background: transparent;
        }

        /* ==============================
           BADGE PANEL
        ============================== */
        .badge-panel {
            background: var(--bg-card);
            border-radius: 16px;
            border: 1px solid var(--border);
            padding: 1.4rem 1.5rem;
        }

        .badge-panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.2rem;
        }

        .badge-panel-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-main);
            margin: 0;
        }

        .badge-count {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        /* Badge card grid */
        .badge-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 0.75rem;
        }

        @media (max-width: 991.98px) { .badge-grid { grid-template-columns: repeat(4, 1fr); } }
        @media (max-width: 575.98px) { .badge-grid { grid-template-columns: repeat(3, 1fr); } }

        /* Individual badge card */
        .badge-card {
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 0.85rem 0.5rem 0.7rem;
            text-align: center;
            background: #fff;
            transition: box-shadow 0.2s, transform 0.2s;
            cursor: pointer;
        }

        .badge-card:hover {
            box-shadow: 0 4px 14px rgba(47,144,84,0.12);
            transform: translateY(-2px);
        }

        /* Locked badge */
        .badge-card.locked {
            background: #fafafa;
            opacity: 0.72;
        }

        /* Badge icon circle */
        .badge-icon-wrap {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background-color: var(--primary-light);
            margin-bottom: 0.55rem;
        }

        .badge-card.locked .badge-icon-wrap {
            background-color: #f0f0f0;
        }

        .badge-icon-wrap i {
            font-size: 1.3rem;
            color: var(--primary);
        }

        .badge-card.locked .badge-icon-wrap i {
            color: #aaa;
        }

        /* Unlocked tick */
        .badge-unlocked-dot {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
        }

        .badge-unlocked-dot i {
            font-size: 0.55rem;
            color: #fff;
        }

        /* Lock dot */
        .badge-lock-dot {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background-color: #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
        }

        .badge-lock-dot i {
            font-size: 0.5rem;
            color: #fff;
        }

        .badge-name {
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--text-main);
            line-height: 1.3;
            margin-bottom: 0.15rem;
        }

        .badge-card.locked .badge-name { color: var(--text-muted); }

        .badge-desc {
            font-size: 0.67rem;
            color: var(--text-muted);
            line-height: 1.35;
        }

        /* ==============================
           FOOTER
        ============================== */
        .footer-cleanedu {
            background-color: var(--footer-bg);
            border-top: 1px solid var(--border);
            padding: 1.8rem 0;
            margin-top: 3rem;
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

        .footer-brand .brand-icon-sm {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .footer-brand .brand-icon-sm i { color: #fff; font-size: 0.72rem; }

        .footer-copy { font-size: 0.78rem; color: var(--text-muted); margin: 0; line-height: 1.6; }

        .footer-nav-col { display: flex; flex-direction: column; gap: 0.45rem; }

        .footer-nav-col a {
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-nav-col a:hover { color: var(--primary); }

        /* ==============================
           RESPONSIVE
        ============================== */
        @media (max-width: 767.98px) {
            .page-header h1 { font-size: 1.2rem; }
        }
    </style>
</head>
<body>

{{-- =================== NAVBAR =================== --}}
<nav class="navbar navbar-cleanedu sticky-top">
    <div class="container">

        {{-- Brand --}}
        <a href="#" class="navbar-brand-logo">
            <span class="brand-icon"><i class="bi bi-lightning-charge-fill"></i></span>
            CleanEdu Energy
        </a>

        {{-- Nav links --}}
        <ul class="navbar-nav flex-row gap-1 d-none d-md-flex mx-auto">
            <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Artikel</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Kursus</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Komunitas</a></li>
        </ul>

        {{-- Right: search + avatar --}}
        <div class="d-flex align-items-center gap-2">
            <div class="search-wrap d-none d-lg-block">
                <input type="text" class="form-control search-input" placeholder="Cari sesuatu...">
                <i class="bi bi-search search-icon"></i>
            </div>
            <img
                src="https://ui-avatars.com/api/?name=Feri&background=2F9054&color=fff&size=128"
                alt="Avatar Pengguna"
                class="nav-avatar">
        </div>

    </div>
</nav>

{{-- =================== MAIN CONTENT =================== --}}
<main>
    <div class="container">

        {{-- Page Header --}}
        <div class="page-header">
            <img
                src="https://ui-avatars.com/api/?name=Feri&background=2F9054&color=fff&size=128"
                alt="Feri"
                class="page-header-avatar">
            <h1>Profil Saya</h1>
        </div>

        {{-- 2-Column Layout: Sidebar + Content --}}
        <div class="row g-4 align-items-start pb-4">

            {{-- ===== LEFT: SIDEBAR ===== --}}
            <div class="col-12 col-md-4 col-lg-3">
                <div class="profile-sidebar">

                    {{-- Avatar --}}
                    <div class="sidebar-avatar-wrap">
                        <img
                            src="https://ui-avatars.com/api/?name=Feri&background=2F9054&color=fff&size=256"
                            alt="Feri"
                            class="sidebar-avatar">
                        <div class="sidebar-avatar-edit">
                            <i class="bi bi-pencil-fill"></i>
                        </div>
                    </div>

                    {{-- Name & Email --}}
                    <p class="sidebar-name">Feri</p>
                    <p class="sidebar-email">Feri@email.com</p>

                    {{-- Role badge --}}
                    <div class="sidebar-role-badge">
                        <i class="bi bi-award-fill" style="font-size:0.75rem;"></i>
                        Pelajar Energi
                    </div>

                    {{-- Level + XP progress --}}
                    <div class="level-row">
                        <span class="level-label">Level 4</span>
                        <span>450 / 1000 XP</span>
                    </div>
                    <div class="level-progress">
                        <div class="level-bar"></div>
                    </div>

                    {{-- Stats --}}
                    <div class="stats-row">
                        <div class="stat-item">
                            <span class="stat-value">1.250</span>
                            <span class="stat-label">Poin</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">12</span>
                            <span class="stat-label">Kuis Selesai</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">25</span>
                            <span class="stat-label">Artikel Dibaca</span>
                        </div>
                    </div>

                </div>{{-- /profile-sidebar --}}
            </div>

            {{-- ===== RIGHT: CONTENT ===== --}}
            <div class="col-12 col-md-8 col-lg-9">

                {{-- Tab Navigation --}}
                <ul class="nav profile-tabs" id="profileTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="ringkasan-tab" data-bs-toggle="tab"
                            data-bs-target="#ringkasan" type="button" role="tab">Ringkasan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="badge-tab" data-bs-toggle="tab"
                            data-bs-target="#badge" type="button" role="tab">Badge</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sertifikat-tab" data-bs-toggle="tab"
                            data-bs-target="#sertifikat" type="button" role="tab">Sertifikat</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="riwayat-tab" data-bs-toggle="tab"
                            data-bs-target="#riwayat" type="button" role="tab">Riwayat</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pengaturan-tab" data-bs-toggle="tab"
                            data-bs-target="#pengaturan" type="button" role="tab">Pengaturan</button>
                    </li>
                </ul>

                {{-- Tab Content --}}
                <div class="tab-content" id="profileTabContent">

                    {{-- RINGKASAN tab (placeholder) --}}
                    <div class="tab-pane fade" id="ringkasan" role="tabpanel">
                        <div class="badge-panel">
                            <p class="text-muted" style="font-size:0.88rem;">Konten ringkasan akan tampil di sini.</p>
                        </div>
                    </div>

                    {{-- BADGE tab (active) --}}
                    <div class="tab-pane fade show active" id="badge" role="tabpanel">
                        <div class="badge-panel">

                            {{-- Badge panel header --}}
                            <div class="badge-panel-header">
                                <h2 class="badge-panel-title">Badge Saya</h2>
                                <span class="badge-count">4/12 Terkumpul</span>
                            </div>

                            {{-- Badge grid --}}
                            <div class="badge-grid">

                                {{-- Row 1 --}}

                                {{-- 1: Solar Beginner — UNLOCKED --}}
                                <div class="badge-card">
                                    <div class="badge-icon-wrap">
                                        <i class="bi bi-sun-fill"></i>
                                        <div class="badge-unlocked-dot">
                                            <i class="bi bi-check-lg"></i>
                                        </div>
                                    </div>
                                    <p class="badge-name">Solar Beginner</p>
                                    <p class="badge-desc">Pelajari energi surya</p>
                                </div>

                                {{-- 2: Energy Saver — UNLOCKED --}}
                                <div class="badge-card">
                                    <div class="badge-icon-wrap">
                                        <i class="bi bi-lightning-charge-fill"></i>
                                        <div class="badge-unlocked-dot">
                                            <i class="bi bi-check-lg"></i>
                                        </div>
                                    </div>
                                    <p class="badge-name">Energy Saver</p>
                                    <p class="badge-desc">Hemat energi 7 hari</p>
                                </div>

                                {{-- 3: Green Learner — UNLOCKED --}}
                                <div class="badge-card">
                                    <div class="badge-icon-wrap">
                                        <i class="bi bi-tree-fill"></i>
                                        <div class="badge-unlocked-dot">
                                            <i class="bi bi-check-lg"></i>
                                        </div>
                                    </div>
                                    <p class="badge-name">Green Learner</p>
                                    <p class="badge-desc">Selesaikan 5 kuis</p>
                                </div>

                                {{-- 4: Eco Explorer — UNLOCKED --}}
                                <div class="badge-card">
                                    <div class="badge-icon-wrap">
                                        <i class="bi bi-globe-americas"></i>
                                        <div class="badge-unlocked-dot">
                                            <i class="bi bi-check-lg"></i>
                                        </div>
                                    </div>
                                    <p class="badge-name">Eco Explorer</p>
                                    <p class="badge-desc">Baca 10 artikel</p>
                                </div>

                                {{-- 5: Wind Master — LOCKED --}}
                                <div class="badge-card locked">
                                    <div class="badge-icon-wrap">
                                        <i class="bi bi-wind"></i>
                                        <div class="badge-lock-dot">
                                            <i class="bi bi-lock-fill"></i>
                                        </div>
                                    </div>
                                    <p class="badge-name">Wind Master</p>
                                    <p class="badge-desc">Pelajari energi angin</p>
                                </div>

                                {{-- Row 2 --}}

                                {{-- 6: Hydro Expert — LOCKED --}}
                                <div class="badge-card locked">
                                    <div class="badge-icon-wrap">
                                        <i class="bi bi-droplet-fill"></i>
                                        <div class="badge-lock-dot">
                                            <i class="bi bi-lock-fill"></i>
                                        </div>
                                    </div>
                                    <p class="badge-name">Hydro Expert</p>
                                    <p class="badge-desc">Pelajari energi air</p>
                                </div>

                                {{-- 7: Green Champion — LOCKED --}}
                                <div class="badge-card locked">
                                    <div class="badge-icon-wrap">
                                        <i class="bi bi-trophy-fill"></i>
                                        <div class="badge-lock-dot">
                                            <i class="bi bi-lock-fill"></i>
                                        </div>
                                    </div>
                                    <p class="badge-name">Green Champion</p>
                                    <p class="badge-desc">Selesaikan 20 kuis</p>
                                </div>

                                {{-- 8: Earth Hero — LOCKED --}}
                                <div class="badge-card locked">
                                    <div class="badge-icon-wrap">
                                        <i class="bi bi-shield-fill-check"></i>
                                        <div class="badge-lock-dot">
                                            <i class="bi bi-lock-fill"></i>
                                        </div>
                                    </div>
                                    <p class="badge-name">Earth Hero</p>
                                    <p class="badge-desc">Dapatkan 2000 poin</p>
                                </div>

                            </div>{{-- /badge-grid --}}

                        </div>{{-- /badge-panel --}}
                    </div>

                    {{-- SERTIFIKAT tab (placeholder) --}}
                    <div class="tab-pane fade" id="sertifikat" role="tabpanel">
                        <div class="badge-panel">
                            <p class="text-muted" style="font-size:0.88rem;">Sertifikat yang diperoleh akan tampil di sini.</p>
                        </div>
                    </div>

                    {{-- RIWAYAT tab (placeholder) --}}
                    <div class="tab-pane fade" id="riwayat" role="tabpanel">
                        <div class="badge-panel">
                            <p class="text-muted" style="font-size:0.88rem;">Riwayat aktivitas akan tampil di sini.</p>
                        </div>
                    </div>

                    {{-- PENGATURAN tab (placeholder) --}}
                    <div class="tab-pane fade" id="pengaturan" role="tabpanel">
                        <div class="badge-panel">
                            <p class="text-muted" style="font-size:0.88rem;">Pengaturan akun akan tampil di sini.</p>
                        </div>
                    </div>

                </div>{{-- /tab-content --}}

            </div>{{-- /col right --}}

        </div>{{-- /row --}}

    </div>{{-- /container --}}
</main>

{{-- =================== FOOTER =================== --}}
<footer class="footer-cleanedu">
    <div class="container">
        <div class="row">

            {{-- Left: Brand + Copyright --}}
            <div class="col-12 col-md-5 mb-3 mb-md-0">
                <a href="#" class="footer-brand">
                    <span class="brand-icon-sm"><i class="bi bi-lightning-charge-fill"></i></span>
                    CleanEdu Energy
                </a>
                <p class="footer-copy">
                    &copy; 2024 CleanEdu Energy. Menginspirasi masa<br>
                    depan.berkelanjutan.
                </p>
            </div>

            {{-- Right: Two nav columns --}}
            <div class="col-12 col-md-7">
                <div class="d-flex gap-5 justify-content-md-end">
                    <div class="footer-nav-col">
                        <a href="#">Tentang Kami</a>
                        <a href="#">Kebijakan Privasi</a>
                        <a href="#">Syarat &amp; Ketentuan</a>
                    </div>
                    <div class="footer-nav-col">
                        <a href="#">Bantuan</a>
                        <a href="#">Kontak</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>

{{-- Bootstrap 5 JS Bundle --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>