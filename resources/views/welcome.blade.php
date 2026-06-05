<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CleanEdu Energy - Belajar Energi Bersih</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

  <style>
    /* ===========================
        CSS VARIABLES & RESET
    =========================== */
    :root {
      --green-main: #2F9054;
      --green-dark: #236b3e;
      --green-light: #e8f7ee;
      --green-bg: #F8FEF5;
      --yellow-btn: #F9C349;
      --yellow-hover: #e0ae3f;
      --yellow-cta-bg: #FEF5DC;
      --yellow-cta-accent: #FDE7A0;
      --text-dark: #1a2e1e;
      --text-muted: #6b7a6e;
      --shadow-card: 0 8px 32px rgba(47,144,84,0.10);
      --shadow-stat: 0 12px 40px rgba(47,144,84,0.13);
      --radius-pill: 50px;
      --radius-card: 16px;
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--green-bg);
      color: var(--text-dark);
      overflow-x: hidden;
    }

    /* ===========================
        NAVBAR
    =========================== */
    .navbar-custom {
      background: #fff;
      box-shadow: 0 2px 16px rgba(47,144,84,0.08);
      padding: 14px 0;
      position: sticky;
      top: 0;
      z-index: 1030;
    }

    .navbar-brand-wrap {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .brand-logo-placeholder {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      background: var(--green-light);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 10px;
      color: var(--green-main);
      font-weight: 700;
      text-align: center;
      line-height: 1.2;
      border: 2px solid var(--green-main);
    }

    .brand-text {
      display: flex;
      flex-direction: column;
      line-height: 1.1;
    }

    .brand-text .brand-name {
      font-size: 16px;
      font-weight: 800;
      color: var(--green-main);
      letter-spacing: -0.3px;
    }

    .brand-text .brand-sub {
      font-size: 10px;
      font-weight: 400;
      color: var(--text-muted);
      letter-spacing: 0.5px;
    }

    .nav-center .nav-link {
      font-size: 14px;
      font-weight: 500;
      color: var(--text-dark);
      padding: 6px 14px;
      position: relative;
      transition: color 0.2s;
    }

    .nav-center .nav-link:hover,
    .nav-center .nav-link.active {
      color: var(--green-main);
    }

    .nav-center .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 14px;
      right: 14px;
      height: 2.5px;
      background: var(--green-main);
      border-radius: 2px;
    }

    .search-bar {
      border: 1.5px solid #d8ead0;
      border-radius: var(--radius-pill);
      padding: 7px 18px;
      font-size: 13px;
      font-family: 'Poppins', sans-serif;
      color: var(--text-muted);
      background: var(--green-bg);
      outline: none;
      width: 180px;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    .search-bar:focus {
      border-color: var(--green-main);
      box-shadow: 0 0 0 3px rgba(47,144,84,0.12);
    }

    .btn-daftar {
      background: var(--yellow-btn);
      color: var(--text-dark);
      font-weight: 700;
      font-size: 14px;
      border: none;
      border-radius: var(--radius-pill);
      padding: 9px 28px;
      text-decoration: none;
      display: inline-block;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 4px 14px rgba(249,195,73,0.35);
    }

    .btn-daftar:hover {
      background: var(--yellow-hover);
      color: var(--text-dark);
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(249,195,73,0.45);
    }

    /* ===========================
        HERO SECTION
    =========================== */
    .hero-section {
      background: var(--green-bg);
      padding: 70px 0 120px;
      position: relative;
      overflow: hidden;
    }

    .hero-section::before {
      content: '';
      position: absolute;
      top: -60px;
      right: -80px;
      width: 600px;
      height: 600px;
      background: radial-gradient(ellipse at 60% 40%, #c8edd4 0%, #e8f7ee 50%, transparent 72%);
      border-radius: 50% 40% 60% 50% / 50% 60% 40% 50%;
      z-index: 0;
      animation: blobFloat 8s ease-in-out infinite alternate;
    }

    .hero-section::after {
      content: '';
      position: absolute;
      top: 40px;
      right: 40px;
      width: 420px;
      height: 420px;
      background: radial-gradient(ellipse at 50% 50%, #b2e0c2 0%, #d4f0df 45%, transparent 68%);
      border-radius: 60% 40% 50% 60% / 40% 55% 45% 60%;
      z-index: 0;
      animation: blobFloat 10s ease-in-out 2s infinite alternate;
    }

    @keyframes blobFloat {
      0%   { transform: scale(1) translate(0, 0) rotate(0deg); }
      100% { transform: scale(1.06) translate(10px, -15px) rotate(5deg); }
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .hero-eyebrow {
      font-size: 13px;
      font-weight: 600;
      color: var(--green-main);
      text-transform: uppercase;
      letter-spacing: 1.5px;
      margin-bottom: 10px;
    }

    .hero-title {
      font-size: clamp(32px, 4.5vw, 52px);
      font-weight: 900;
      line-height: 1.15;
      color: var(--text-dark);
      margin-bottom: 18px;
      letter-spacing: -1px;
    }

    .hero-title .highlight {
      color: var(--green-main);
    }

    .hero-desc {
      font-size: 15px;
      font-weight: 400;
      color: var(--text-muted);
      line-height: 1.7;
      max-width: 460px;
      margin-bottom: 32px;
    }

    .btn-hero-primary {
      background: var(--green-main);
      color: #fff;
      font-weight: 700;
      font-size: 14px;
      text-decoration: none;
      display: inline-block;
      border: none;
      border-radius: var(--radius-pill);
      padding: 13px 30px;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 6px 20px rgba(47,144,84,0.28);
    }

    .btn-hero-primary:hover {
      background: var(--green-dark);
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(47,144,84,0.38);
      color: #fff;
    }

    .btn-hero-video {
      background: #fff;
      color: var(--text-dark);
      font-weight: 600;
      font-size: 14px;
      text-decoration: none;
      border: 2px solid #d8ead0;
      border-radius: var(--radius-pill);
      padding: 11px 26px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: border-color 0.2s, box-shadow 0.2s, transform 0.15s;
    }

    .btn-hero-video:hover {
      border-color: var(--green-main);
      color: var(--green-main);
      box-shadow: 0 4px 14px rgba(47,144,84,0.14);
      transform: translateY(-1px);
    }

    .play-icon {
      width: 30px;
      height: 30px;
      background: var(--yellow-btn);
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      color: var(--text-dark);
    }

    .earth-img-box {
      width: 420px;
      max-width: 100%;
      height: 380px;
      background: linear-gradient(135deg, #c5e8d1 0%, #90cfaa 40%, #5ab880 70%, #2F9054 100%);
      border-radius: 50% 44% 50% 44% / 44% 50% 44% 50%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 13px;
      font-weight: 600;
      text-align: center;
      box-shadow: 0 24px 64px rgba(47,144,84,0.22), inset 0 -10px 30px rgba(0,0,0,0.06);
      animation: earthFloat 6s ease-in-out infinite alternate;
      gap: 8px;
      position: relative;
      z-index: 5;
    }

    .earth-img-box i {
      font-size: 64px;
      opacity: 0.85;
    }

    @keyframes earthFloat {
      0%   { transform: translateY(0px) rotate(-1deg); }
      100% { transform: translateY(-14px) rotate(1deg); }
    }

    /* ===========================
        STATS FLOATING BOX
    =========================== */
    .stats-section {
      position: relative;
      z-index: 10;
      margin-top: -60px;
      padding-bottom: 20px;
    }

    .stats-box {
      background: #fff;
      border-radius: var(--radius-card);
      box-shadow: var(--shadow-stat);
      padding: 30px 40px;
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
    }

    .stat-item {
      display: flex;
      align-items: center;
      gap: 14px;
      flex: 1;
      min-width: 140px;
    }

    .stat-item + .stat-item {
      border-left: 1.5px solid #edf5e9;
      padding-left: 28px;
    }

    .stat-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: var(--green-light);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      color: var(--green-main);
      flex-shrink: 0;
    }

    .stat-info .stat-number {
      font-size: 20px;
      font-weight: 800;
      color: var(--text-dark);
      line-height: 1.2;
    }

    .stat-info .stat-label {
      font-size: 12px;
      font-weight: 400;
      color: var(--text-muted);
    }

    /* ===========================
        KATEGORI BELAJAR
    =========================== */
    .section-kategori {
      padding: 70px 0 50px;
      background: #fff;
    }

    .section-label {
      font-size: 13px;
      font-weight: 600;
      color: var(--green-main);
      text-transform: uppercase;
      letter-spacing: 1.5px;
      margin-bottom: 6px;
    }

    .section-title {
      font-size: clamp(22px, 3vw, 32px);
      font-weight: 800;
      color: var(--text-dark);
      margin-bottom: 4px;
      letter-spacing: -0.5px;
    }

    .section-subtitle {
      font-size: 14px;
      font-weight: 400;
      color: var(--text-muted);
      margin-bottom: 36px;
    }

    .kategori-card {
      background: var(--green-bg);
      border: 1.5px solid #e4f2e9;
      border-radius: var(--radius-card);
      padding: 18px 16px;
      display: flex;
      align-items: center;
      gap: 14px;
      transition: box-shadow 0.22s, transform 0.22s, border-color 0.22s;
      cursor: pointer;
      text-decoration: none;
      color: inherit;
    }

    .kategori-card:hover {
      box-shadow: 0 8px 28px rgba(47,144,84,0.15);
      transform: translateY(-4px);
      border-color: var(--green-main);
      color: inherit;
    }

    .kat-thumb {
      width: 64px;
      height: 64px;
      border-radius: 12px;
      background: linear-gradient(135deg, #b8e4c8, #78c49a);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 9px;
      font-weight: 600;
      color: var(--green-dark);
      text-align: center;
      flex-shrink: 0;
      line-height: 1.3;
      padding: 4px;
    }

    .kat-thumb.kat-orange {
      background: linear-gradient(135deg, #ffe0b2, #ffb74d);
      color: #7a4700;
    }

    .kat-thumb.kat-blue {
      background: linear-gradient(135deg, #b3e5fc, #4fc3f7);
      color: #015a7a;
    }

    .kat-thumb.kat-teal {
      background: linear-gradient(135deg, #b2dfdb, #4db6ac);
      color: #004d40;
    }

    .kat-info .kat-title {
      font-size: 13px;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 3px;
      line-height: 1.3;
    }

    .kat-info .kat-desc {
      font-size: 11.5px;
      font-weight: 400;
      color: var(--text-muted);
      line-height: 1.5;
    }

    .dots-indicator {
      display: flex;
      gap: 7px;
      justify-content: center;
      margin-top: 28px;
    }

    .dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #d8ead0;
      transition: background 0.2s, transform 0.2s;
    }

    .dot.active {
      background: var(--green-main);
      transform: scale(1.2);
    }

    /* ===========================
        ARTIKEL & VIDEO TERBARU
    =========================== */
    .section-artikel {
      padding: 60px 0 70px;
      background: var(--green-bg);
    }

    .artikel-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      margin-bottom: 30px;
    }

    .lihat-semua {
      font-size: 13px;
      font-weight: 600;
      color: var(--green-main);
      text-decoration: none;
      transition: color 0.2s;
    }

    .lihat-semua:hover {
      color: var(--green-dark);
      text-decoration: underline;
    }

    .artikel-card {
      background: #fff;
      border-radius: var(--radius-card);
      overflow: hidden;
      box-shadow: var(--shadow-card);
      text-decoration: none;
      display: block;
      transition: transform 0.22s, box-shadow 0.22s;
      cursor: pointer;
      height: 100%;
    }

    .artikel-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 18px 48px rgba(47,144,84,0.16);
    }

    .artikel-thumb-wrap {
      position: relative;
      width: 100%;
      height: 160px;
      overflow: hidden;
    }

    .thumb-placeholder {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      font-weight: 600;
      color: #6b7a6e;
      text-align: center;
      padding: 8px;
      line-height: 1.4;
    }

    .thumb-green  { background: linear-gradient(135deg, #a5d6b0, #5cb87a); }
    .thumb-orange { background: linear-gradient(135deg, #ffd180, #ffa726); }
    .thumb-blue   { background: linear-gradient(135deg, #80cbc4, #26a69a); }
    .thumb-dark   { background: linear-gradient(135deg, #78909c, #37474f); }

    .badge-artikel {
      position: absolute;
      top: 10px;
      left: 10px;
      background: var(--yellow-btn);
      color: var(--text-dark);
      font-size: 10px;
      font-weight: 700;
      border-radius: 20px;
      padding: 3px 10px;
      letter-spacing: 0.3px;
    }

    .badge-video {
      position: absolute;
      top: 10px;
      left: 10px;
      background: rgba(0,0,0,0.55);
      color: #fff;
      font-size: 10px;
      font-weight: 700;
      border-radius: 20px;
      padding: 3px 10px;
      letter-spacing: 0.3px;
    }

    .play-btn-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 42px;
      height: 42px;
      background: rgba(255,255,255,0.92);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      color: var(--green-main);
      box-shadow: 0 4px 14px rgba(0,0,0,0.20);
    }

    .artikel-body {
      padding: 16px 16px 20px;
    }

    .artikel-title {
      font-size: 13.5px;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 7px;
      line-height: 1.45;
    }

    .artikel-desc {
      font-size: 12px;
      font-weight: 400;
      color: var(--text-muted);
      line-height: 1.6;
      margin-bottom: 14px;
    }

    .artikel-meta {
      font-size: 11px;
      color: var(--text-muted);
      display: flex;
      align-items: center;
      gap: 5px;
    }

    /* =======================================================
        SECTION KUNING (SIAP JADI BAGIAN DARI PERUBAHAN)
    =========================== */
    .cta-section {
      background: linear-gradient(135deg, #FEF5DC 0%, var(--yellow-cta-accent) 100%);
      padding: 70px 0 0;
      position: relative;
      overflow: hidden;
    }

    .cta-title {
      font-size: clamp(26px, 3.5vw, 38px);
      font-weight: 900;
      color: var(--text-dark);
      line-height: 1.25;
      margin-bottom: 16px;
      letter-spacing: -0.5px;
    }

    .cta-desc {
      font-size: 14px;
      font-weight: 400;
      color: #5a4a1e;
      line-height: 1.7;
      margin-bottom: 28px;
      max-width: 400px;
    }

    .btn-cta-main {
      background: var(--green-main);
      color: #fff;
      font-weight: 700;
      font-size: 14px;
      border: none;
      border-radius: var(--radius-pill);
      padding: 13px 32px;
      text-decoration: none;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 6px 20px rgba(47,144,84,0.28);
      display: inline-block;
    }

    .btn-cta-main:hover {
      background: var(--green-dark);
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(47,144,84,0.38);
      color: #fff;
    }

    .cta-join-note {
      font-size: 12px;
      font-weight: 500;
      color: var(--green-main);
      margin-top: 14px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .bulb-placeholder-wrap {
      display: flex;
      align-items: flex-end;
      justify-content: center;
      padding-top: 20px;
    }

    .bulb-placeholder {
      width: 180px;
      height: 230px;
      background: linear-gradient(160deg, #ffe082 0%, #ffc107 60%, #ffa000 100%);
      border-radius: 50% 50% 30% 30% / 55% 55% 35% 35%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      font-weight: 600;
      color: #5a3e00;
      text-align: center;
      position: relative;
      animation: bulbGlow 3s ease-in-out infinite alternate;
    }

    .bulb-placeholder i {
      font-size: 60px;
      color: #fff;
      filter: drop-shadow(0 2px 8px rgba(255,193,7,0.5));
    }

    @keyframes bulbGlow {
      0%   { box-shadow: 0 12px 40px rgba(255,193,7,0.38); }
      100% { box-shadow: 0 12px 60px rgba(255,193,7,0.60); }
    }

    .cta-features-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
      padding: 10px 0 60px;
    }

    .cta-feature-item {
      background: rgba(255,255,255,0.65);
      backdrop-filter: blur(6px);
      border: 1.5px solid rgba(255,255,255,0.8);
      border-radius: 14px;
      padding: 16px 16px;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: background 0.2s, transform 0.2s;
    }

    .cta-feature-item:hover {
      background: rgba(255,255,255,0.85);
      transform: translateY(-2px);
    }

    .cta-feat-icon {
      width: 42px;
      height: 42px;
      border-radius: 10px;
      background: var(--green-light);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      color: var(--green-main);
      flex-shrink: 0;
    }

    .cta-feat-text .feat-title {
      font-size: 12.5px;
      font-weight: 700;
      color: var(--text-dark);
      line-height: 1.3;
    }

    .cta-feat-text .feat-desc {
      font-size: 11px;
      color: var(--text-muted);
    }

    .footer-bar {
      background: var(--text-dark);
      color: #8ca897;
      text-align: center;
      padding: 18px;
      font-size: 12px;
    }

    @media (max-width: 991px) {
      .hero-section { padding: 50px 0 90px; }
      .earth-img-box { width: 320px; height: 290px; }
      .stat-item + .stat-item { border-left: none; padding-left: 0; }
    }

    @media (max-width: 767px) {
      .hero-section { padding: 40px 0 100px; text-align: center; }
      .hero-desc { margin: 0 auto 28px; }
      .earth-placeholder { margin-top: 30px; }
      .earth-img-box { width: 280px; height: 260px; }
      .stats-section { margin-top: -40px; }
      .cta-features-grid { grid-template-columns: 1fr; }
      .artikel-header { flex-direction: column; align-items: flex-start; gap: 6px; }
      .bulb-placeholder-wrap { margin-top: 30px; }
    }
  </style>
</head>
<body>

  <nav class="navbar-custom">
    <div class="container d-flex align-items-center justify-content-between gap-2">
      <a href="{{ route('welcome') }}" class="navbar-brand-wrap text-decoration-none">
        <div class="brand-logo-placeholder">CE</div>
        <div class="brand-text">
          <span class="brand-name">CleanEdu</span>
          <span class="brand-sub">Energy</span>
        </div>
      </a>
      <ul class="nav nav-center d-none d-lg-flex mb-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('artikel*') ? 'active' : '' }}" href="{{ route('artikel') }}">Artikel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('video') ? 'active' : '' }}" href="{{ route('video') }}">Video</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('quiz') ? 'active' : '' }}" href="{{ route('quiz') }}">Quiz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tentang</a>
        </li>
      </ul>
      <div class="d-flex align-items-center gap-3">
        <input class="search-bar" type="text" placeholder="Cari Sesuatu…" />
        <a href="{{ route('register') }}" class="btn-daftar text-center">Daftar</a>
      </div>
    </div>
  </nav>

  <section class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 hero-content">
          <p class="hero-eyebrow">Platform Edukasi Energi Bersih</p>
          <h1 class="hero-title">Belajar <span class="highlight">Energi Bersih</span>,<br />Ciptakan Masa Depan<br />Yang Lebih Baik.</h1>
          <p class="hero-desc">Platform edukasi interaktif untuk memahami pentingnya energi bersih dan cara mewujudkan masa depan yang berkelanjutan.</p>
          <div class="d-flex flex-wrap gap-3">
            <a href="{{ route('login') }}" class="btn-hero-primary">Mulai Belajar</a>
            <a href="{{ route('video') }}" class="btn-hero-video"><span class="play-icon"><i class="bi bi-play-fill"></i></span>Tonton Video</a>
          </div>
        </div>
        <div class="col-lg-6 earth-placeholder mt-4 mt-lg-0">
          <div class="earth-img-box mx-auto">
            <i class="bi bi-globe-americas"></i>
            <span>[Ilustrasi Bumi]</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="stats-section">
    <div class="container">
      <div class="stats-box">
        <div class="stat-item">
          <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
          <div class="stat-info"><div class="stat-number">10.000+</div><div class="stat-label">Pengguna Aktif</div></div>
        </div>
        <div class="stat-item">
          <div class="stat-icon"><i class="bi bi-book-fill"></i></div>
          <div class="stat-info"><div class="stat-number">250+</div><div class="stat-label">Artikel &amp; Video</div></div>
        </div>
        <div class="stat-item">
          <div class="stat-icon"><i class="bi bi-patch-check-fill"></i></div>
          <div class="stat-info"><div class="stat-number">50+</div><div class="stat-label">Quiz Interaktif</div></div>
        </div>
        <div class="stat-item">
          <div class="stat-icon" style="background:#fff8e1; color:#e6a817;"><i class="bi bi-trophy-fill"></i></div>
          <div class="stat-info"><div class="stat-number">15.000+</div><div class="stat-label">Sertifikat Diterbitkan</div></div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-kategori">
    <div class="container">
      <p class="section-label">Pilih Topik</p>
      <h2 class="section-title">Kategori Belajar</h2>
      <p class="section-subtitle">Pilih Topik Yang Ingin Kamu Pelajari</p>
      <div class="row g-3">
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{ route('artikel') }}" class="kategori-card d-block">
            <div class="kat-thumb kat-orange"><i class="bi bi-sun-fill fs-4 d-block"></i><span style="font-size:8px">[Energi Surya]</span></div>
            <div class="kat-info"><div class="kat-title">Energi Yang Terbarukan</div><div class="kat-desc">Mengenal Sumber Energi Terbarukan</div></div>
          </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{ route('artikel') }}" class="kategori-card d-block">
            <div class="kat-thumb"><i class="bi bi-lightning-charge-fill fs-4 d-block"></i><span style="font-size:8px">[Hemat Energi]</span></div>
            <div class="kat-info"><div class="kat-title">Hemat Energi</div><div class="kat-desc">Tips Menghemat Energi Listrik</div></div>
          </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{ route('artikel') }}" class="kategori-card d-block">
            <div class="kat-thumb kat-blue"><i class="bi bi-cpu-fill fs-4 d-block"></i><span style="font-size:8px">[Inovasi]</span></div>
            <div class="kat-info"><div class="kat-title">Teknologi Bersih</div><div class="kat-desc">Inovasi Hijau Masa Depan</div></div>
          </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{ route('artikel') }}" class="kategori-card d-block">
            <div class="kat-thumb kat-teal"><i class="bi bi-tree-fill fs-4 d-block"></i><span style="font-size:8px">[Lingkungan]</span></div>
            <div class="kat-info"><div class="kat-title">Lingkungan &amp; Energi</div><div class="kat-desc">Dampak Energi ke Alam</div></div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="section-artikel">
    <div class="container">
      <div class="artikel-header">
        <div>
          <p class="section-label mb-1">Konten Terbaru</p>
          <h2 class="section-title mb-0">Artikel &amp; Video Terbaru</h2>
        </div>
        <a href="{{ route('artikel') }}" class="lihat-semua">Lihat semua →</a>
      </div>
      <div class="row g-3">
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{ route('artikel') }}" class="artikel-card text-decoration-none">
            <div class="artikel-thumb-wrap"><div class="thumb-placeholder thumb-green">[Thumbnail Artikel 1]</div><span class="badge-artikel">Artikel</span></div>
            <div class="artikel-body"><div class="artikel-title">Apa Itu Energi Surya?</div><div class="artikel-desc">Pelajari sistem panel surya mandiri.</div></div>
          </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{ route('video') }}" class="artikel-card text-decoration-none">
            <div class="artikel-thumb-wrap"><div class="thumb-placeholder thumb-orange">[Thumbnail Video 2]</div><span class="badge-video">Video</span><div class="play-btn-overlay"><i class="bi bi-play-fill"></i></div></div>
            <div class="artikel-body"><div class="artikel-title">Mengenal Turbin Angin</div><div class="artikel-desc">Cara kerja kincir angin raksasa listrik.</div></div>
          </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{ route('artikel') }}" class="artikel-card text-decoration-none">
            <div class="artikel-thumb-wrap"><div class="thumb-placeholder thumb-blue">[Thumbnail Artikel 3]</div><span class="badge-artikel">Artikel</span></div>
            <div class="artikel-body"><div class="artikel-title">Energi Air Mikrohidro</div><div class="artikel-desc">Memanfaatkan aliran sungai desa.</div></div>
          </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{ route('artikel') }}" class="artikel-card text-decoration-none">
            <div class="artikel-thumb-wrap"><div class="thumb-placeholder thumb-dark">[Thumbnail Artikel 4]</div><span class="badge-artikel">Artikel</span></div>
            <div class="artikel-body"><div class="artikel-title">Tips Hemat Listrik</div><div class="artikel-desc">Langkah mudah memotong tagihan bulanan.</div></div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-section">
    <div class="container">
      <div class="row align-items-center">
        
        <div class="col-md-9 col-lg-8">
          <h2 class="cta-title">Siap Jadi Bagian<br>Dari Perubahan?</h2>
          <p class="cta-desc">
            Bergabung, kumpulkan poin dan dapatkan sertifikat untuk menjadi bagian dari solusi energi bersih.
          </p>
          
          <div class="mb-4">
            <a href="{{ route('register') }}" class="btn-cta-main">Buat Akun Gratis</a>
            <div class="cta-join-note">
              <i class="bi bi-people-fill"></i> Bergabung dengan 10.000+ peserta energi bersih
            </div>
          </div>

          <div class="cta-features-grid">
            <div class="cta-feature-item">
              <div class="cta-feat-icon"><i class="bi bi-calendar-event"></i></div>
              <div class="cta-feat-text">
                <div class="feat-title">Belajar Kapan Saja</div>
                <div class="feat-desc">Akses materi 24/7</div>
              </div>
            </div>
            <div class="cta-feature-item">
              <div class="cta-feat-icon"><i class="bi bi-question-circle"></i></div>
              <div class="cta-feat-text">
                <div class="feat-title">Quiz Interaktif</div>
                <div class="feat-desc">Uji pemahamanmu</div>
              </div>
            </div>
            <div class="cta-feature-item">
              <div class="cta-feat-icon"><i class="bi bi-award"></i></div>
              <div class="cta-feat-text">
                <div class="feat-title">Dapatkan Sertifikat</div>
                <div class="feat-desc">Diakui secara resmi</div>
              </div>
            </div>
            <div class="cta-feature-item">
              <div class="cta-feat-icon"><i class="bi bi-graph-up-arrow"></i></div>
              <div class="cta-feat-text">
                <div class="feat-title">Pantau Progress</div>
                <div class="feat-desc">Lacak perkembanganmu</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-lg-4 bulb-placeholder-wrap d-none d-md-flex">
          <div class="bulb-placeholder">
            <i class="bi bi-lightbulb-fill"></i>
            <span class="mt-2">[Ilustrasi Bohlam]</span>
          </div>
        </div>

      </div>
    </div>
  </section>

  <div class="footer-bar">
    &copy; 2026 <strong>CleanEdu Energy</strong>. Platform Edukasi Energi Bersih untuk Indonesia yang Berkelanjutan.
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>