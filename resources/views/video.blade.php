<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Video Pembelajaran – CleanEdu Energy</title>

  <!-- Google Fonts: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

  <style>
    /* ===========================
       CSS VARIABLES
    =========================== */
    :root {
      --green-main:    #2F9054;
      --green-dark:    #236b3e;
      --green-light:   #e8f7ee;
      --green-bg:      #F8FEF5;
      --yellow-btn:    #F9C349;
      --yellow-hover:  #e0ae3f;
      --yellow-cta-bg: #FEF5DC;
      --yellow-accent: #FDE7A0;
      --text-dark:     #1a2e1e;
      --text-muted:    #6b7a6e;
      --text-light:    #9aab9e;
      --border-col:    #ddeee3;
      --card-shadow:   0 4px 20px rgba(47,144,84,0.09);
      --card-shadow-h: 0 10px 36px rgba(47,144,84,0.18);
      --radius-card:   14px;
      --radius-pill:   50px;
      --radius-btn:    8px;
    }

    /* ===========================
       GLOBAL RESET
    =========================== */
    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--green-bg);
      color: var(--text-dark);
      overflow-x: hidden;
      margin: 0;
    }

    a { text-decoration: none; }

    /* ===========================
       NAVBAR
    =========================== */
    .navbar-cleanedu {
      background: #fff;
      box-shadow: 0 2px 16px rgba(47,144,84,0.08);
      padding: 13px 0;
      position: sticky;
      top: 0;
      z-index: 1030;
    }

    .navbar-brand-wrap {
      display: flex;
      align-items: center;
      gap: 9px;
      text-decoration: none;
    }

    .brand-icon {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      background: var(--green-light);
      border: 2px solid var(--green-main);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 17px;
      color: var(--green-main);
      flex-shrink: 0;
    }

    .brand-texts { display: flex; flex-direction: column; line-height: 1.15; }
    .brand-name  { font-size: 15px; font-weight: 800; color: var(--green-main); letter-spacing: -0.3px; }
    .brand-sub   { font-size: 10px; font-weight: 400; color: var(--text-muted); letter-spacing: 0.4px; }

    .nav-links { display: flex; gap: 2px; list-style: none; margin: 0; padding: 0; }

    .nav-links .nav-link {
      font-size: 13.5px;
      font-weight: 500;
      color: var(--text-dark);
      padding: 6px 14px;
      border-radius: 6px;
      position: relative;
      transition: color 0.2s;
    }

    .nav-links .nav-link:hover { color: var(--green-main); }

    .nav-links .nav-link.active {
      color: var(--yellow-btn);
      font-weight: 600;
    }

    .nav-links .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 14px;
      right: 14px;
      height: 2.5px;
      background: var(--yellow-btn);
      border-radius: 2px;
    }

    .search-input {
      border: 1.5px solid var(--border-col);
      border-radius: var(--radius-pill);
      padding: 7px 18px;
      font-size: 12.5px;
      font-family: 'Poppins', sans-serif;
      color: var(--text-muted);
      background: var(--green-bg);
      outline: none;
      width: 175px;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    .search-input:focus {
      border-color: var(--green-main);
      box-shadow: 0 0 0 3px rgba(47,144,84,0.12);
    }

    .btn-daftar {
      background: var(--yellow-btn);
      color: var(--text-dark);
      font-weight: 700;
      font-size: 13.5px;
      border: none;
      border-radius: var(--radius-pill);
      padding: 9px 26px;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 4px 14px rgba(249,195,73,0.32);
    }

    .btn-daftar:hover {
      background: var(--yellow-hover);
      transform: translateY(-1px);
      box-shadow: 0 7px 20px rgba(249,195,73,0.44);
      color: var(--text-dark);
    }

    /* ===========================
       PAGE HEADER
    =========================== */
    .page-header {
      background: #fff;
      border-bottom: 1.5px solid var(--border-col);
      padding: 28px 0 22px;
    }

    .page-header-icon {
      width: 46px;
      height: 46px;
      background: var(--yellow-btn);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      color: var(--text-dark);
      flex-shrink: 0;
      box-shadow: 0 4px 14px rgba(249,195,73,0.38);
    }

    .page-title {
      font-size: clamp(20px, 3vw, 28px);
      font-weight: 800;
      color: var(--text-dark);
      margin: 0;
      letter-spacing: -0.4px;
    }

    .page-subtitle {
      font-size: 13px;
      font-weight: 400;
      color: var(--text-muted);
      margin: 3px 0 0;
    }

    /* ===========================
       FILTER BAR
    =========================== */
    .filter-bar {
      background: #fff;
      padding: 14px 0;
      border-bottom: 1.5px solid var(--border-col);
      position: sticky;
      top: 66px;
      z-index: 100;
    }

    .filter-btn {
      font-family: 'Poppins', sans-serif;
      font-size: 12.5px;
      font-weight: 600;
      border-radius: var(--radius-pill);
      padding: 7px 18px;
      border: 1.5px solid var(--border-col);
      background: #fff;
      color: var(--text-muted);
      cursor: pointer;
      transition: all 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    .filter-btn:hover {
      border-color: var(--green-main);
      color: var(--green-main);
    }

    .filter-btn.active {
      background: var(--green-main);
      border-color: var(--green-main);
      color: #fff;
      box-shadow: 0 4px 14px rgba(47,144,84,0.28);
    }

    /* ===========================
       VIDEO GRID SECTION
    =========================== */
    .video-section {
      padding: 38px 0 20px;
    }

    .section-row-title {
      font-size: 16px;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 18px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .section-row-title::before {
      content: '';
      width: 4px;
      height: 18px;
      background: var(--green-main);
      border-radius: 2px;
      flex-shrink: 0;
    }

    /* Video Card */
    .video-card {
      background: #fff;
      border-radius: var(--radius-card);
      overflow: hidden;
      box-shadow: var(--card-shadow);
      transition: transform 0.22s, box-shadow 0.22s;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .video-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--card-shadow-h);
    }

    /* Thumbnail */
    .video-thumb {
      position: relative;
      width: 100%;
      padding-top: 56.25%; /* 16:9 */
      overflow: hidden;
      flex-shrink: 0;
    }

    .thumb-inner {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 10px;
      font-weight: 600;
      color: rgba(255,255,255,0.8);
      text-align: center;
      padding: 8px;
      line-height: 1.4;
    }

    /* Gradient variants for thumbnails */
    .thumb-1 { background: linear-gradient(135deg, #7ec8a4 0%, #2F9054 60%, #1a5c34 100%); }
    .thumb-2 { background: linear-gradient(135deg, #ffd180 0%, #ffa726 55%, #e65100 100%); }
    .thumb-3 { background: linear-gradient(135deg, #80cbc4 0%, #26a69a 55%, #00695c 100%); }
    .thumb-4 { background: linear-gradient(135deg, #a5d6a7 0%, #43a047 55%, #1b5e20 100%); }

    /* Duration badge */
    .duration-badge {
      position: absolute;
      bottom: 8px;
      right: 8px;
      background: rgba(0,0,0,0.68);
      color: #fff;
      font-size: 10px;
      font-weight: 600;
      border-radius: 4px;
      padding: 2px 7px;
      letter-spacing: 0.3px;
    }

    /* Play button overlay */
    .play-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 44px;
      height: 44px;
      background: rgba(255,255,255,0.90);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      color: var(--green-main);
      box-shadow: 0 4px 18px rgba(0,0,0,0.22);
      transition: transform 0.18s, background 0.18s;
    }

    .video-card:hover .play-overlay {
      transform: translate(-50%, -50%) scale(1.12);
      background: #fff;
    }

    /* Card Body */
    .video-card-body {
      padding: 14px 14px 16px;
      display: flex;
      flex-direction: column;
      flex: 1;
    }

    .video-card-title {
      font-size: 13px;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 5px;
      line-height: 1.45;
    }

    .video-card-desc {
      font-size: 11.5px;
      font-weight: 400;
      color: var(--text-muted);
      line-height: 1.6;
      margin-bottom: 12px;
      flex: 1;
      /* 3-line clamp */
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .btn-tonton {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--yellow-btn);
      color: var(--text-dark);
      font-family: 'Poppins', sans-serif;
      font-size: 11.5px;
      font-weight: 700;
      border: none;
      border-radius: var(--radius-pill);
      padding: 8px 16px;
      cursor: pointer;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 3px 10px rgba(249,195,73,0.30);
      width: 100%;
      justify-content: center;
    }

    .btn-tonton:hover {
      background: var(--yellow-hover);
      transform: translateY(-1px);
      box-shadow: 0 6px 16px rgba(249,195,73,0.42);
      color: var(--text-dark);
    }

    /* ===========================
       PAGINATION
    =========================== */
    .pagination-wrap {
      padding: 36px 0 12px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 6px;
    }

    .pag-btn {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      border: 1.5px solid var(--border-col);
      background: #fff;
      font-family: 'Poppins', sans-serif;
      font-size: 13px;
      font-weight: 500;
      color: var(--text-muted);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s;
      text-decoration: none;
    }

    .pag-btn:hover {
      border-color: var(--green-main);
      color: var(--green-main);
    }

    .pag-btn.active {
      background: var(--yellow-btn);
      border-color: var(--yellow-btn);
      color: var(--text-dark);
      font-weight: 700;
      box-shadow: 0 4px 12px rgba(249,195,73,0.38);
    }

    .pag-btn.arrow {
      font-size: 15px;
      color: var(--text-muted);
    }

    .pag-ellipsis {
      font-size: 14px;
      color: var(--text-muted);
      padding: 0 4px;
    }

    /* ===========================
       CTA SECTION
    =========================== */
    .cta-section {
      background: linear-gradient(135deg, #FEF5DC 0%, var(--yellow-accent) 100%);
      padding: 56px 0 0;
      position: relative;
      overflow: hidden;
    }

    .cta-section::before {
      content: '';
      position: absolute;
      bottom: 0;
      left: -40px;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(249,195,73,0.22) 0%, transparent 70%);
      border-radius: 50%;
    }

    .cta-title {
      font-size: clamp(22px, 3vw, 34px);
      font-weight: 900;
      color: var(--text-dark);
      line-height: 1.25;
      margin-bottom: 12px;
      letter-spacing: -0.5px;
    }

    .cta-desc {
      font-size: 13px;
      font-weight: 400;
      color: #5a4a1e;
      line-height: 1.7;
      margin-bottom: 24px;
      max-width: 380px;
    }

    .btn-cta {
      background: var(--green-main);
      color: #fff;
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 13.5px;
      border: none;
      border-radius: var(--radius-pill);
      padding: 12px 28px;
      display: inline-block;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 6px 20px rgba(47,144,84,0.26);
    }

    .btn-cta:hover {
      background: var(--green-dark);
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(47,144,84,0.36);
      color: #fff;
    }

    .cta-note {
      font-size: 12px;
      font-weight: 500;
      color: var(--green-main);
      margin-top: 12px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    /* Bulb placeholder */
    .bulb-wrap {
      display: flex;
      align-items: flex-end;
      justify-content: center;
    }

    .bulb-box {
      width: 160px;
      height: 210px;
      background: linear-gradient(160deg, #ffe082 0%, #ffc107 60%, #ffa000 100%);
      border-radius: 50% 50% 30% 30% / 55% 55% 35% 35%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 9.5px;
      font-weight: 600;
      box-shadow: 0 10px 36px rgba(255,193,7,0.34);
      animation: bulbGlow 3s ease-in-out infinite alternate;
    }

    .bulb-box i { font-size: 56px; filter: drop-shadow(0 2px 8px rgba(255,193,7,0.5)); }

    @keyframes bulbGlow {
      0%   { box-shadow: 0 10px 36px rgba(255,193,7,0.34); }
      100% { box-shadow: 0 10px 56px rgba(255,193,7,0.56); }
    }

    /* Feature grid */
    .cta-features {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      padding-bottom: 52px;
    }

    .cta-feat {
      background: rgba(255,255,255,0.65);
      backdrop-filter: blur(6px);
      border: 1.5px solid rgba(255,255,255,0.80);
      border-radius: 13px;
      padding: 14px;
      display: flex;
      align-items: center;
      gap: 11px;
      transition: background 0.2s, transform 0.2s;
    }

    .cta-feat:hover {
      background: rgba(255,255,255,0.85);
      transform: translateY(-2px);
    }

    .cta-feat-icon {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      background: var(--green-light);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 17px;
      color: var(--green-main);
      flex-shrink: 0;
    }

    .cta-feat-icon.yellow { background: #fff8e1; color: #e6a817; }

    .cta-feat-title { font-size: 12px; font-weight: 700; color: var(--text-dark); line-height: 1.3; }
    .cta-feat-sub   { font-size: 10.5px; color: var(--text-muted); }

    /* ===========================
       FOOTER BAR
    =========================== */
    .footer-bar {
      background: var(--text-dark);
      color: #8ca897;
      text-align: center;
      padding: 16px;
      font-size: 11.5px;
    }

    .footer-bar a { color: var(--green-light); }

    /* ===========================
       RESPONSIVE
    =========================== */
    @media (max-width: 991px) {
      .search-input { width: 130px; }
      .cta-features { padding-bottom: 36px; }
    }

    @media (max-width: 767px) {
      .filter-bar { top: 58px; }
      .bulb-wrap   { display: none; }
      .cta-features { grid-template-columns: 1fr; }
      .cta-section  { padding-top: 40px; }
    }

    @media (max-width: 575px) {
      .search-input { display: none; }
      .page-header-icon { display: none; }
    }
  </style>
</head>
<body>

  <!-- ===================================================
       NAVBAR
  =================================================== -->
  <nav class="navbar-cleanedu">
    <div class="container d-flex align-items-center justify-content-between gap-2 flex-wrap">

      <!-- Brand -->
      <a href="/" class="navbar-brand-wrap">
        <div class="brand-icon"><i class="bi bi-globe-americas"></i></div>
        <div class="brand-texts">
          <span class="brand-name">CleanEdu</span>
          <span class="brand-sub">Energy</span>
        </div>
      </a>

      <!-- Center nav (desktop) -->
      <ul class="nav-links d-none d-lg-flex">
        <li><a href="/"        class="nav-link">Beranda</a></li>
        <li><a href="/dashboard"        class="nav-link">Dashboard</a></li>
        <li><a href="/artikel" class="nav-link">Artikel</a></li>
        <li><a href="/video"   class="nav-link active">Video</a></li>
        <li><a href="/quiz"    class="nav-link">Quiz</a></li>
        <li><a href="/tentang" class="nav-link">Tentang</a></li>
      </ul>

      <!-- Right: search + CTA -->
      <div class="d-flex align-items-center gap-3">
        <input type="text" class="search-input" placeholder="Cari Sesuatu…" />
        <a href="/register" class="btn-daftar">Daftar</a>
      </div>
    </div>
  </nav>


  <!-- ===================================================
       PAGE HEADER
  =================================================== -->
  <div class="page-header">
    <div class="container d-flex align-items-center gap-14" style="gap:14px;">
      <div class="page-header-icon">
        <i class="bi bi-play-circle-fill"></i>
      </div>
      <div>
        <h1 class="page-title">Video Pembelajaran</h1>
        <p class="page-subtitle">Pelajari Energi Terbarukan Melalui Video Kreatif</p>
      </div>
    </div>
  </div>


  <!-- ===================================================
       FILTER BAR
  =================================================== -->
  <div class="filter-bar">
    <div class="container d-flex align-items-center gap-2 flex-wrap">
      <button class="filter-btn active">Semua Video</button>
      <button class="filter-btn">Terbaru</button>
      <button class="filter-btn">Populer</button>
      <button class="filter-btn">
        Durasi <i class="bi bi-chevron-down" style="font-size:10px;"></i>
      </button>
    </div>
  </div>


  <!-- ===================================================
       VIDEO GRID
  =================================================== -->
  <section class="video-section">
    <div class="container">

      <!-- ---- ROW 1: Pengenalan Energi Terbarukan ---- -->
      <div class="section-row-title">1. Pengenalan Energi Terbarukan</div>
      <div class="row g-3 mb-4">

        <!-- Card 1 -->
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-1">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">12:34</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">1. Pengenalan Energi Terbarukan</div>
              <div class="video-card-desc">Memahami konsep dasar energi terbarukan dan pentingnya untuk masa depan.</div>
              <a href="/video/1" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-2">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">09:18</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">1. Pengenalan Energi Terbarukan</div>
              <div class="video-card-desc">Memahami konsep dasar energi terbarukan dan pentingnya untuk masa depan.</div>
              <a href="/video/2" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-3">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">15:02</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">1. Pengenalan Energi Terbarukan</div>
              <div class="video-card-desc">Memahami konsep dasar energi terbarukan dan pentingnya untuk masa depan.</div>
              <a href="/video/3" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-4">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">11:45</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">1. Pengenalan Energi Terbarukan</div>
              <div class="video-card-desc">Memahami konsep dasar energi terbarukan dan pentingnya untuk masa depan.</div>
              <a href="/video/4" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

      </div><!-- /row 1 -->

      <!-- ---- ROW 2: Sumber Energi Matahari ---- -->
      <div class="section-row-title">2. Sumber Energi Matahari</div>
      <div class="row g-3 mb-4">

        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-2">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">18:20</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">2. Sumber Energi Matahari</div>
              <div class="video-card-desc">Mengetahui potensi energi matahari dan penerapannya dalam kehidupan sehari-hari.</div>
              <a href="/video/5" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-3">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">14:55</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">2. Sumber Energi Matahari</div>
              <div class="video-card-desc">Mengetahui potensi energi matahari dan penerapannya dalam kehidupan sehari-hari.</div>
              <a href="/video/6" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-1">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">22:10</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">2. Sumber Energi Matahari</div>
              <div class="video-card-desc">Mengetahui potensi energi matahari dan penerapannya dalam kehidupan sehari-hari.</div>
              <a href="/video/7" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-4">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">16:33</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">2. Sumber Energi Matahari</div>
              <div class="video-card-desc">Mengetahui potensi energi matahari dan penerapannya dalam kehidupan sehari-hari.</div>
              <a href="/video/8" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

      </div><!-- /row 2 -->

      <!-- ---- ROW 3: Energi Yang Terbarukan ---- -->
      <div class="section-row-title">3. Energi Yang Terbarukan</div>
      <div class="row g-3 mb-2">

        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-4">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">20:48</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">3. Energi Yang Terbarukan</div>
              <div class="video-card-desc">Manfaat yang terbarukan bagi manfaat bagi lingkungan dan kehidupan manusia di bumi.</div>
              <a href="/video/9" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-1">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">13:27</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">3. Energi Yang Terbarukan</div>
              <div class="video-card-desc">Manfaat yang terbarukan bagi manfaat bagi lingkungan dan kehidupan manusia di bumi.</div>
              <a href="/video/10" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-3">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">17:09</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">3. Energi Yang Terbarukan</div>
              <div class="video-card-desc">Manfaat yang terbarukan bagi manfaat bagi lingkungan dan kehidupan manusia di bumi.</div>
              <a href="/video/11" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
          <div class="video-card">
            <div class="video-thumb">
              <div class="thumb-inner thumb-2">[Thumbnail Video]</div>
              <div class="play-overlay"><i class="bi bi-play-fill"></i></div>
              <span class="duration-badge">25:00</span>
            </div>
            <div class="video-card-body">
              <div class="video-card-title">3. Energi Yang Terbarukan</div>
              <div class="video-card-desc">Manfaat yang terbarukan bagi manfaat bagi lingkungan dan kehidupan manusia di bumi.</div>
              <a href="/video/12" class="btn-tonton">Tonton Sekarang <i class="bi bi-play-fill" style="font-size:10px;"></i></a>
            </div>
          </div>
        </div>

      </div><!-- /row 3 -->

      <!-- ---- PAGINATION ---- -->
      <div class="pagination-wrap">
        <a href="/video?page=prev" class="pag-btn arrow"><i class="bi bi-chevron-left"></i></a>
        <a href="/video?page=1" class="pag-btn">1</a>
        <a href="/video?page=2" class="pag-btn">2</a>
        <a href="/video?page=3" class="pag-btn">3</a>
        <a href="/video?page=4" class="pag-btn active">4</a>
        <span class="pag-ellipsis">…</span>
        <a href="/video?page=12" class="pag-btn">12</a>
        <a href="/video?page=next" class="pag-btn arrow"><i class="bi bi-chevron-right"></i></a>
      </div>

    </div>
  </section>


  <!-- ===================================================
       CTA SECTION
  =================================================== -->
  <section class="cta-section">
    <div class="container">
      <div class="row align-items-end">

        <!-- Left: text + CTA -->
        <div class="col-lg-4 pb-lg-5 mb-4 mb-lg-0">
          <h2 class="cta-title">Siap Jadi Bagian Dari Perubahan?</h2>
          <p class="cta-desc">Bergabung, kumpulkan poin dan dapatkan sertifikat untuk menjadi bagian dari solusi energi bersih.</p>
          <a href="/register" class="btn-cta">Buat Akun Gratis</a>
          <div class="cta-note mt-3">
            <i class="bi bi-people-fill"></i>
            Bergabung dengan 10.000+ peserta energi bersih
          </div>
        </div>

        <!-- Center: bulb -->
        <div class="col-lg-2 d-none d-lg-flex bulb-wrap">
          <div class="bulb-box">
            <i class="bi bi-lightbulb-fill"></i>
            <span style="margin-top:6px;">[Ilustrasi]</span>
          </div>
        </div>

        <!-- Right: features 2x2 -->
        <div class="col-lg-6 pb-lg-5">
          <div class="cta-features">
            <div class="cta-feat">
              <div class="cta-feat-icon"><i class="bi bi-calendar-check-fill"></i></div>
              <div>
                <div class="cta-feat-title">Belajar Kapan Saja</div>
                <div class="cta-feat-sub">Akses materi 24/7</div>
              </div>
            </div>
            <div class="cta-feat">
              <div class="cta-feat-icon yellow"><i class="bi bi-patch-question-fill"></i></div>
              <div>
                <div class="cta-feat-title">Quiz Interaktif</div>
                <div class="cta-feat-sub">Uji pemahamanmu</div>
              </div>
            </div>
            <div class="cta-feat">
              <div class="cta-feat-icon yellow"><i class="bi bi-award-fill"></i></div>
              <div>
                <div class="cta-feat-title">Dapatkan Sertifikat</div>
                <div class="cta-feat-sub">Diakui secara resmi</div>
              </div>
            </div>
            <div class="cta-feat">
              <div class="cta-feat-icon"><i class="bi bi-bar-chart-line-fill"></i></div>
              <div>
                <div class="cta-feat-title">Pantau Progress</div>
                <div class="cta-feat-sub">Lacak perkembanganmu</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- ===================================================
       FOOTER BAR
  =================================================== -->
  <footer class="footer-bar">
    © 2026 <a href="/">CleanEdu Energy</a>. Platform Edukasi Energi Bersih untuk Indonesia yang Berkelanjutan.
  </footer>


  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Filter button toggle
    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>

</body>
</html>