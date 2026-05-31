<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard – CleanEdu Energy</title>

  <!-- Google Fonts: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

  <style>
    /* ===========================
       CSS VARIABLES
    =========================== */
    :root {
      --green-main:       #2F7A3B;
      --green-dark:       #1e5228;
      --green-light:      #e6f4ea;
      --sidebar-bg:       #1C2B20;
      --sidebar-text:     #c8d8cc;
      --sidebar-hover:    rgba(255,255,255,0.07);
      --sidebar-active:   #F9C349;
      --sidebar-active-t: #1a2e1e;
      --sidebar-w:        200px;
      --yellow:           #F9C349;
      --yellow-hover:     #e0ae3f;
      --bg-main:          #f0f4f1;
      --topbar-bg:        #fff;
      --card-bg:          #fff;
      --text-dark:        #1a2e1e;
      --text-muted:       #6b7a6e;
      --border-col:       #e2eee6;
      --radius-card:      14px;
      --radius-pill:      50px;
      /* Metric accent colours */
      --blue:    #3b82f6;
      --blue-bg: #eff6ff;
      --amber:   #f59e0b;
      --amber-bg:#fffbeb;
      --purple:  #8b5cf6;
      --purple-bg:#f5f3ff;
      --teal:    #10b981;
      --teal-bg: #ecfdf5;
      --orange:  #f97316;
      --orange-bg:#fff7ed;
      /* Status */
      --active-bg:   #d1fae5;
      --active-text: #065f46;
    }

    /* ===========================
       RESET / GLOBAL
    =========================== */
    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--bg-main);
      color: var(--text-dark);
      margin: 0;
      padding: 0;
      min-height: 100vh;
      overflow-x: hidden;
    }

    a { text-decoration: none; color: inherit; }

    /* ===========================
       APP WRAPPER
    =========================== */
    .app-wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* ===========================
       SIDEBAR
    =========================== */
    .sidebar {
      width: var(--sidebar-w);
      min-width: var(--sidebar-w);
      background: var(--sidebar-bg);
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0; left: 0; bottom: 0;
      z-index: 200;
      overflow-y: auto;
      overflow-x: hidden;
      transition: transform 0.28s ease;
    }

    .sidebar-brand {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 22px 20px 20px;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      flex-shrink: 0;
    }

    .brand-logo {
      width: 42px; height: 42px;
      border-radius: 12px;
      background: var(--yellow);
      display: flex; align-items: center; justify-content: center;
      font-size: 20px; color: var(--sidebar-bg);
      flex-shrink: 0;
      box-shadow: 0 3px 10px rgba(249,195,73,.40);
    }

    .brand-info { display: flex; flex-direction: column; line-height: 1.2; }
    .b-name { font-size: 15px; font-weight: 800; color: #fff; letter-spacing: -.3px; }
    .b-sub  { font-size: 10px; font-weight: 400; color: rgba(255,255,255,.45); letter-spacing: .4px; }

    .sidebar-nav {
      flex: 1;
      padding: 18px 12px;
      display: flex; flex-direction: column; gap: 3px;
    }

    .nav-item-link {
      display: flex; align-items: center; gap: 11px;
      padding: 10px 12px;
      border-radius: 10px;
      font-size: 13px; font-weight: 500;
      color: var(--sidebar-text);
      transition: background .18s, color .18s;
      white-space: nowrap;
    }

    .nav-item-link i { font-size: 16px; flex-shrink: 0; width: 20px; text-align: center; }
    .nav-item-link:hover { background: var(--sidebar-hover); color: #fff; }

    .nav-item-link.active {
      background: var(--sidebar-active);
      color: var(--sidebar-active-t);
      font-weight: 700;
      box-shadow: 0 4px 14px rgba(249,195,73,.30);
    }

    .nav-item-link.active i { color: var(--sidebar-active-t); }

    .sidebar-footer {
      padding: 12px 12px 20px;
      border-top: 1px solid rgba(255,255,255,.08);
      flex-shrink: 0;
    }

    .logout-link {
      display: flex; align-items: center; gap: 11px;
      padding: 10px 12px; border-radius: 10px;
      font-size: 13px; font-weight: 500;
      color: rgba(255,255,255,.45);
      transition: background .18s, color .18s;
    }

    .logout-link i { font-size: 16px; width: 20px; text-align: center; }
    .logout-link:hover { background: rgba(255,80,80,.12); color: #ff7b7b; }

    /* ===========================
       MAIN AREA
    =========================== */
    .main-area {
      margin-left: var(--sidebar-w);
      flex: 1;
      display: flex; flex-direction: column;
      min-height: 100vh;
    }

    /* ===========================
       TOPBAR
    =========================== */
    .topbar {
      background: var(--topbar-bg);
      padding: 14px 28px;
      display: flex; align-items: center; justify-content: space-between;
      border-bottom: 1px solid var(--border-col);
      position: sticky; top: 0; z-index: 100;
      gap: 16px;
    }

    .topbar-left .page-title  { font-size: 24px; font-weight: 800; color: var(--text-dark); margin: 0; letter-spacing: -.5px; }
    .topbar-left .page-sub    { font-size: 12px; font-weight: 400; color: var(--text-muted); margin: 2px 0 0; }

    .topbar-right { display: flex; align-items: center; gap: 14px; }

    .notif-btn {
      width: 38px; height: 38px; border-radius: 50%;
      border: 1.5px solid var(--border-col); background: #fff;
      display: flex; align-items: center; justify-content: center;
      font-size: 17px; color: var(--text-muted);
      cursor: pointer; position: relative;
      transition: border-color .2s, color .2s;
    }

    .notif-btn:hover { border-color: var(--green-main); color: var(--green-main); }

    .notif-dot {
      position: absolute; top: 7px; right: 7px;
      width: 7px; height: 7px;
      background: var(--yellow); border-radius: 50%; border: 1.5px solid #fff;
    }

    .admin-badge {
      display: flex; align-items: center; gap: 9px;
      padding: 5px 12px 5px 5px; border-radius: var(--radius-pill);
      border: 1.5px solid var(--border-col); background: #fff;
      cursor: pointer; transition: border-color .2s;
    }

    .admin-badge:hover { border-color: var(--green-main); }

    .admin-avatar {
      width: 30px; height: 30px; border-radius: 50%;
      background: linear-gradient(135deg,#ffd180,#ffa726);
      display: flex; align-items: center; justify-content: center;
      font-size: 14px; color: #7a4000; flex-shrink: 0;
    }

    .admin-name    { font-size: 13px; font-weight: 600; color: var(--text-dark); }
    .admin-chevron { font-size: 11px; color: var(--text-muted); }

    /* Hamburger */
    .hamburger {
      display: none; background: none; border: none;
      font-size: 22px; color: var(--text-dark); cursor: pointer; padding: 4px 8px;
    }

    /* ===========================
       PAGE CONTENT
    =========================== */
    .page-content { padding: 26px 28px 36px; flex: 1; }

    /* ===========================
       METRIC CARDS
    =========================== */
    .metric-grid {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 14px;
      margin-bottom: 22px;
    }

    .metric-card {
      background: var(--card-bg);
      border-radius: var(--radius-card);
      padding: 18px 16px 0;
      box-shadow: 0 3px 16px rgba(0,0,0,.06);
      position: relative;
      overflow: hidden;
      min-height: 130px;
      display: flex;
      flex-direction: column;
      transition: transform .2s, box-shadow .2s;
    }

    .metric-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 28px rgba(0,0,0,.10);
    }

    /* top icon */
    .metric-icon {
      width: 40px; height: 40px; border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 18px; margin-bottom: 8px; flex-shrink: 0;
    }

    .metric-label {
      font-size: 11.5px; font-weight: 500;
      color: var(--text-muted); margin-bottom: 2px;
    }

    .metric-value {
      font-size: 26px; font-weight: 800; color: var(--text-dark);
      letter-spacing: -.8px; line-height: 1.1; margin-bottom: 4px;
    }

    .metric-trend {
      font-size: 11px; font-weight: 500;
      display: flex; align-items: center; gap: 4px;
      margin-bottom: 0; flex: 1;
    }

    .metric-trend .arrow { font-size: 13px; }
    .trend-up   { color: #16a34a; }
    .trend-down { color: #dc2626; }

    /* wave SVG at bottom */
    .metric-wave {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      line-height: 0;
    }

    .metric-wave svg { width: 100%; display: block; }

    /* Colour schemes */
    .mc-blue   .metric-icon { background: var(--blue-bg);   color: var(--blue); }
    .mc-amber  .metric-icon { background: var(--amber-bg);  color: var(--amber); }
    .mc-purple .metric-icon { background: var(--purple-bg); color: var(--purple); }
    .mc-teal   .metric-icon { background: var(--teal-bg);   color: var(--teal); }
    .mc-orange .metric-icon { background: var(--orange-bg); color: var(--orange); }

    /* ===========================
       BOTTOM GRID: Chart + Recent
    =========================== */
    .bottom-grid {
      display: grid;
      grid-template-columns: 1fr 380px;
      gap: 18px;
    }

    /* Chart card */
    .chart-card {
      background: var(--card-bg);
      border-radius: var(--radius-card);
      padding: 22px 22px 18px;
      box-shadow: 0 3px 16px rgba(0,0,0,.06);
    }

    .chart-title {
      font-size: 15px; font-weight: 700;
      color: var(--text-dark); margin-bottom: 16px;
    }

    .chart-title span { font-weight: 400; color: var(--text-muted); }

    .chart-wrap { position: relative; height: 260px; }

    /* Recent users card */
    .recent-card {
      background: var(--card-bg);
      border-radius: var(--radius-card);
      padding: 22px 20px;
      box-shadow: 0 3px 16px rgba(0,0,0,.06);
    }

    .recent-header {
      display: flex; align-items: center; justify-content: space-between;
      margin-bottom: 18px;
    }

    .recent-title { font-size: 15px; font-weight: 700; color: var(--text-dark); margin: 0; }

    .view-all {
      font-size: 12.5px; font-weight: 600;
      color: var(--green-main); transition: color .2s;
    }

    .view-all:hover { color: var(--green-dark); text-decoration: underline; }

    /* User row */
    .user-row {
      display: flex; align-items: center; gap: 12px;
      padding: 11px 0;
      border-bottom: 1px solid #f0f5f2;
    }

    .user-row:last-child { border-bottom: none; padding-bottom: 0; }

    .u-avatar {
      width: 40px; height: 40px; border-radius: 50%;
      background: linear-gradient(135deg,#ffd180,#ffa726);
      display: flex; align-items: center; justify-content: center;
      font-size: 18px; color: #7a4000; flex-shrink: 0;
      overflow: hidden;
    }

    .u-info { flex: 1; min-width: 0; }
    .u-name  { font-size: 13px; font-weight: 600; color: var(--text-dark); line-height: 1.3; }
    .u-email { font-size: 11.5px; color: #4a9fd4; }

    .u-date { font-size: 11px; font-weight: 400; color: var(--text-muted); white-space: nowrap; flex-shrink: 0; }

    /* ===========================
       SIDEBAR OVERLAY (mobile)
    =========================== */
    .sidebar-overlay {
      display: none; position: fixed; inset: 0;
      background: rgba(0,0,0,.45); z-index: 199;
    }

    /* ===========================
       RESPONSIVE
    =========================== */
    @media (max-width: 1280px) {
      .metric-grid { grid-template-columns: repeat(3,1fr); }
    }

    @media (max-width: 1100px) {
      .bottom-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 991px) {
      .sidebar { transform: translateX(-100%); }
      .sidebar.open { transform: translateX(0); }
      .sidebar-overlay.show { display: block; }
      .main-area { margin-left: 0; }
      .hamburger { display: block; }
      .page-content { padding: 18px 16px 28px; }
      .topbar { padding: 12px 16px; }
    }

    @media (max-width: 768px) {
      .metric-grid { grid-template-columns: repeat(2,1fr); }
    }

    @media (max-width: 480px) {
      .metric-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- Sidebar overlay (mobile) -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<!-- ===================================================
     APP WRAPPER
=================================================== -->
<div class="app-wrapper">

  <!-- =============================================
       SIDEBAR
  ============================================= -->
  <aside class="sidebar" id="sidebar">

    <div class="sidebar-brand">
      <div class="brand-logo"><i class="bi bi-globe-americas"></i></div>
      <div class="brand-info">
        <span class="b-name">CleanEdu</span>
        <span class="b-sub">Energy</span>
      </div>
    </div>

    <nav class="sidebar-nav">
      <a href="/dashboard" class="nav-item-link active">
        <i class="bi bi-house-door"></i> Dashboard
      </a>
      <a href="/users" class="nav-item-link">
        <i class="bi bi-people"></i> Users
      </a>
      <a href="/artikel" class="nav-item-link">
        <i class="bi bi-newspaper"></i> Article
      </a>
      <a href="/video" class="nav-item-link">
        <i class="bi bi-play-circle"></i> Videos
      </a>
      <a href="/quiz" class="nav-item-link">
        <i class="bi bi-patch-question"></i> Quizer
      </a>
      <a href="/badges" class="nav-item-link">
        <i class="bi bi-award"></i> Badges
      </a>
      <a href="/reports" class="nav-item-link">
        <i class="bi bi-bar-chart-line"></i> Reports
      </a>
      <a href="/settings" class="nav-item-link">
        <i class="bi bi-gear"></i> Settings
      </a>
    </nav>

    <div class="sidebar-footer">
      <a href="/logout" class="logout-link">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </div>

  </aside>


  <!-- =============================================
       MAIN AREA
  ============================================= -->
  <div class="main-area">

    <!-- TOPBAR -->
    <header class="topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="hamburger" onclick="openSidebar()"><i class="bi bi-list"></i></button>
        <div class="topbar-left">
          <div class="page-title">Dashboard</div>
          <div class="page-sub">Wellcome back, Admin! Here's what's happening on your platform</div>
        </div>
      </div>
      <div class="topbar-right">
        <div class="notif-btn">
          <i class="bi bi-bell"></i>
          <span class="notif-dot"></span>
        </div>
        <div class="admin-badge">
          <div class="admin-avatar"><i class="bi bi-person-fill"></i></div>
          <span class="admin-name">Admin</span>
          <i class="bi bi-chevron-down admin-chevron"></i>
        </div>
      </div>
    </header>


    <!-- PAGE CONTENT -->
    <div class="page-content">

      <!-- ==========================================
           METRIC CARDS (5 columns)
      ========================================== -->
      <div class="metric-grid">

        <!-- 1. Total Users (blue) -->
        <div class="metric-card mc-blue">
          <div class="metric-icon"><i class="bi bi-people-fill"></i></div>
          <div class="metric-label">Total Users</div>
          <div class="metric-value">1,247</div>
          <div class="metric-trend trend-up">
            <i class="bi bi-arrow-up arrow"></i>
            <span>11.5% From Last Month</span>
          </div>
          <div class="metric-wave">
            <svg viewBox="0 0 300 56" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
              <path d="M0 40 C40 20 80 55 120 35 C160 15 200 50 240 30 C270 16 290 28 300 22 L300 56 L0 56 Z"
                    fill="rgba(59,130,246,0.12)"/>
              <path d="M0 48 C50 35 90 52 140 42 C190 32 230 50 270 38 C285 33 295 40 300 36 L300 56 L0 56 Z"
                    fill="rgba(59,130,246,0.07)"/>
            </svg>
          </div>
        </div>

        <!-- 2. Total Article (amber) -->
        <div class="metric-card mc-amber">
          <div class="metric-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
          <div class="metric-label">Total Article</div>
          <div class="metric-value">86</div>
          <div class="metric-trend trend-up">
            <i class="bi bi-arrow-up arrow"></i>
            <span>10.8% From Last Month</span>
          </div>
          <div class="metric-wave">
            <svg viewBox="0 0 300 56" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
              <path d="M0 35 C50 18 100 48 150 30 C200 12 250 45 300 25 L300 56 L0 56 Z"
                    fill="rgba(245,158,11,0.13)"/>
              <path d="M0 46 C60 36 110 52 165 42 C220 32 265 50 300 40 L300 56 L0 56 Z"
                    fill="rgba(245,158,11,0.07)"/>
            </svg>
          </div>
        </div>

        <!-- 3. Total Video (purple) -->
        <div class="metric-card mc-purple">
          <div class="metric-icon"><i class="bi bi-play-circle-fill"></i></div>
          <div class="metric-label">Total Video</div>
          <div class="metric-value">24</div>
          <div class="metric-trend trend-up">
            <i class="bi bi-arrow-up arrow"></i>
            <span>9.8% From Last Month</span>
          </div>
          <div class="metric-wave">
            <svg viewBox="0 0 300 56" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
              <path d="M0 38 C30 22 70 52 120 36 C170 20 220 48 270 32 C285 27 295 34 300 28 L300 56 L0 56 Z"
                    fill="rgba(139,92,246,0.13)"/>
              <path d="M0 47 C45 38 95 53 145 44 C195 35 245 52 300 42 L300 56 L0 56 Z"
                    fill="rgba(139,92,246,0.07)"/>
            </svg>
          </div>
        </div>

        <!-- 4. Total Quizez (teal) -->
        <div class="metric-card mc-teal">
          <div class="metric-icon"><i class="bi bi-patch-check-fill"></i></div>
          <div class="metric-label">Total Quizez</div>
          <div class="metric-value">15</div>
          <div class="metric-trend trend-up">
            <i class="bi bi-arrow-up arrow"></i>
            <span>12.7% From Last Month</span>
          </div>
          <div class="metric-wave">
            <svg viewBox="0 0 300 56" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
              <path d="M0 42 C40 26 90 50 135 34 C180 18 225 46 270 30 C285 24 295 32 300 26 L300 56 L0 56 Z"
                    fill="rgba(16,185,129,0.13)"/>
              <path d="M0 50 C55 42 100 54 155 46 C210 38 255 52 300 44 L300 56 L0 56 Z"
                    fill="rgba(16,185,129,0.07)"/>
            </svg>
          </div>
        </div>

        <!-- 5. Total Badges (orange) -->
        <div class="metric-card mc-orange">
          <div class="metric-icon"><i class="bi bi-award-fill"></i></div>
          <div class="metric-label">Total Badges</div>
          <div class="metric-value">31</div>
          <div class="metric-trend trend-up">
            <i class="bi bi-arrow-up arrow"></i>
            <span>4.5% From Last Month</span>
          </div>
          <div class="metric-wave">
            <svg viewBox="0 0 300 56" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
              <path d="M0 36 C35 20 75 50 125 34 C175 18 215 46 265 28 C282 22 293 30 300 24 L300 56 L0 56 Z"
                    fill="rgba(249,115,22,0.13)"/>
              <path d="M0 46 C50 38 100 52 150 44 C200 36 248 51 300 43 L300 56 L0 56 Z"
                    fill="rgba(249,115,22,0.07)"/>
            </svg>
          </div>
        </div>

      </div><!-- /metric-grid -->


      <!-- ==========================================
           BOTTOM GRID: Chart + Recent Users
      ========================================== -->
      <div class="bottom-grid">

        <!-- Chart Card -->
        <div class="chart-card">
          <div class="chart-title">
            User Activity <span>(Last 7 Days)</span>
          </div>
          <div class="chart-wrap">
            <canvas id="activityChart"></canvas>
          </div>
        </div>

        <!-- Recent Users Card -->
        <div class="recent-card">
          <div class="recent-header">
            <div class="recent-title">Recent User</div>
            <a href="/users" class="view-all">View All</a>
          </div>

          <!-- User rows -->
          <div class="user-row">
            <div class="u-avatar"><i class="bi bi-person-fill"></i></div>
            <div class="u-info">
              <div class="u-name">Siti Nurhaya</div>
              <div class="u-email">siti@gmail.com</div>
            </div>
            <div class="u-date">May 26, 2025</div>
          </div>

          <div class="user-row">
            <div class="u-avatar" style="background:linear-gradient(135deg,#a7f3d0,#34d399); color:#065f46;">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="u-info">
              <div class="u-name">Siti Nurhaya</div>
              <div class="u-email">siti@gmail.com</div>
            </div>
            <div class="u-date">May 26, 2025</div>
          </div>

          <div class="user-row">
            <div class="u-avatar" style="background:linear-gradient(135deg,#c4b5fd,#8b5cf6); color:#fff;">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="u-info">
              <div class="u-name">Siti Nurhaya</div>
              <div class="u-email">siti@gmail.com</div>
            </div>
            <div class="u-date">May 26, 2025</div>
          </div>

          <div class="user-row">
            <div class="u-avatar" style="background:linear-gradient(135deg,#fbcfe8,#ec4899); color:#fff;">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="u-info">
              <div class="u-name">Siti Nurhaya</div>
              <div class="u-email">siti@gmail.com</div>
            </div>
            <div class="u-date">May 26, 2025</div>
          </div>

        </div><!-- /recent-card -->

      </div><!-- /bottom-grid -->

    </div><!-- /page-content -->
  </div><!-- /main-area -->

</div><!-- /app-wrapper -->


<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  /* =============================================
     SIDEBAR MOBILE TOGGLE
  ============================================= */
  function openSidebar() {
    document.getElementById('sidebar').classList.add('open');
    document.getElementById('sidebarOverlay').classList.add('show');
  }

  function closeSidebar() {
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('sidebarOverlay').classList.remove('show');
  }

  /* =============================================
     CHART.JS — User Activity Line Chart
  ============================================= */
  (function () {
    const ctx = document.getElementById('activityChart').getContext('2d');

    // Green gradient fill
    const gradient = ctx.createLinearGradient(0, 0, 0, 260);
    gradient.addColorStop(0,   'rgba(47, 122, 59, 0.30)');
    gradient.addColorStop(0.6, 'rgba(47, 122, 59, 0.08)');
    gradient.addColorStop(1,   'rgba(47, 122, 59, 0.00)');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['May 10','May 11','May 12','May 13','May 14','May 15','May 16','May 17','May 18'],
        datasets: [{
          label: 'Active Users',
          data: [110, 160, 195, 175, 220, 240, 210, 280, 410],
          fill: true,
          backgroundColor: gradient,
          borderColor: '#2F7A3B',
          borderWidth: 2.5,
          pointBackgroundColor: '#2F7A3B',
          pointBorderColor: '#fff',
          pointBorderWidth: 2,
          pointRadius: 5,
          pointHoverRadius: 7,
          tension: 0.40,
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: { mode: 'index', intersect: false },
        plugins: {
          legend: { display: false },
          tooltip: {
            backgroundColor: '#fff',
            titleColor: '#1a2e1e',
            bodyColor: '#6b7a6e',
            borderColor: '#e2eee6',
            borderWidth: 1,
            padding: 10,
            titleFont: { family: 'Poppins', weight: '600', size: 12 },
            bodyFont:  { family: 'Poppins', size: 12 },
            callbacks: {
              label: ctx => '  ' + ctx.parsed.y + ' users'
            }
          }
        },
        scales: {
          x: {
            grid: { color: '#f0f5f2', drawBorder: false },
            ticks: {
              font: { family: 'Poppins', size: 11 },
              color: '#9aab9e',
              maxRotation: 0,
            },
            border: { dash: [4,4] }
          },
          y: {
            min: 0,
            max: 500,
            ticks: {
              stepSize: 100,
              font: { family: 'Poppins', size: 11 },
              color: '#9aab9e',
            },
            grid: { color: '#f0f5f2', drawBorder: false },
            border: { display: false, dash: [4,4] }
          }
        }
      }
    });
  })();
</script>

</body>
</html>