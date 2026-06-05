<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Management – CleanEdu Energy</title>

  <!-- Google Fonts: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

  <style>
    /* ===========================
       CSS VARIABLES
    =========================== */
    :root {
      --green-main:      #2F7A3B;
      --green-dark:      #1e5228;
      --green-light:     #e6f4ea;
      --sidebar-bg:      #1C2B20;
      --sidebar-text:    #c8d8cc;
      --sidebar-hover:   rgba(255,255,255,0.07);
      --sidebar-active-bg: #F9C349;
      --sidebar-active-text: #1a2e1e;
      --sidebar-width:   200px;
      --yellow-btn:      #F9C349;
      --yellow-hover:    #e0ae3f;
      --yellow-light:    #FEF5DC;
      --red-btn:         #E53E3E;
      --red-light:       #fff5f5;
      --status-active-bg:   #d4edda;
      --status-active-text: #1e7e34;
      --status-inactive-bg:   #f8d7da;
      --status-inactive-text: #c0392b;
      --text-dark:       #1a2e1e;
      --text-muted:      #6b7a6e;
      --border-col:      #e2eee6;
      --table-border:    #4a9fd4;
      --bg-main:         #f0f4f1;
      --topbar-bg:       #fff;
      --card-radius:     14px;
      --radius-pill:     50px;
    }

    /* ===========================
       GLOBAL
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
       WRAPPER
    =========================== */
    .app-wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* ===========================
       SIDEBAR
    =========================== */
    .sidebar {
      width: var(--sidebar-width);
      min-width: var(--sidebar-width);
      background: var(--sidebar-bg);
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      z-index: 200;
      overflow-y: auto;
      overflow-x: hidden;
      transition: transform 0.28s ease;
    }

    /* Brand */
    .sidebar-brand {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 22px 20px 20px;
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    .brand-logo {
      width: 42px;
      height: 42px;
      border-radius: 12px;
      background: var(--yellow-btn);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      color: var(--sidebar-bg);
      flex-shrink: 0;
      box-shadow: 0 3px 10px rgba(249,195,73,0.40);
    }

    .brand-info { display: flex; flex-direction: column; line-height: 1.2; }
    .brand-info .b-name { font-size: 15px; font-weight: 800; color: #fff; letter-spacing: -0.3px; }
    .brand-info .b-sub  { font-size: 10px; font-weight: 400; color: rgba(255,255,255,0.45); letter-spacing: 0.4px; }

    /* Nav */
    .sidebar-nav {
      flex: 1;
      padding: 18px 12px;
      display: flex;
      flex-direction: column;
      gap: 3px;
    }

    .nav-item-link {
      display: flex;
      align-items: center;
      gap: 11px;
      padding: 10px 12px;
      border-radius: 10px;
      font-size: 13px;
      font-weight: 500;
      color: var(--sidebar-text);
      transition: background 0.18s, color 0.18s;
      cursor: pointer;
      white-space: nowrap;
    }

    .nav-item-link i {
      font-size: 16px;
      flex-shrink: 0;
      width: 20px;
      text-align: center;
    }

    .nav-item-link:hover {
      background: var(--sidebar-hover);
      color: #fff;
    }

    .nav-item-link.active {
      background: var(--sidebar-active-bg);
      color: var(--sidebar-active-text);
      font-weight: 700;
      box-shadow: 0 4px 14px rgba(249,195,73,0.30);
    }

    .nav-item-link.active i { color: var(--sidebar-active-text); }

    /* Logout */
    .sidebar-footer {
      padding: 12px 12px 20px;
      border-top: 1px solid rgba(255,255,255,0.08);
    }

    .logout-link {
      display: flex;
      align-items: center;
      gap: 11px;
      padding: 10px 12px;
      border-radius: 10px;
      font-size: 13px;
      font-weight: 500;
      color: rgba(255,255,255,0.50);
      transition: background 0.18s, color 0.18s;
      cursor: pointer;
    }

    .logout-link i { font-size: 16px; width: 20px; text-align: center; }

    .logout-link:hover {
      background: rgba(255,80,80,0.12);
      color: #ff7b7b;
    }

    /* ===========================
       MAIN AREA
    =========================== */
    .main-area {
      margin-left: var(--sidebar-width);
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ===========================
       TOP BAR
    =========================== */
    .topbar {
      background: var(--topbar-bg);
      padding: 14px 28px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid var(--border-col);
      position: sticky;
      top: 0;
      z-index: 100;
      gap: 16px;
    }

    .topbar-title { font-size: 22px; font-weight: 800; color: var(--text-dark); margin: 0; letter-spacing: -0.4px; }
    .topbar-sub   { font-size: 11.5px; font-weight: 400; color: var(--text-muted); margin: 1px 0 0; }

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .notif-btn {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      border: 1.5px solid var(--border-col);
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 17px;
      color: var(--text-muted);
      cursor: pointer;
      position: relative;
      transition: border-color 0.2s, color 0.2s;
    }

    .notif-btn:hover { border-color: var(--green-main); color: var(--green-main); }

    .notif-dot {
      position: absolute;
      top: 7px;
      right: 8px;
      width: 7px;
      height: 7px;
      background: var(--yellow-btn);
      border-radius: 50%;
      border: 1.5px solid #fff;
    }

    .admin-badge {
      display: flex;
      align-items: center;
      gap: 9px;
      cursor: pointer;
      padding: 5px 10px 5px 5px;
      border-radius: var(--radius-pill);
      border: 1.5px solid var(--border-col);
      background: #fff;
      transition: border-color 0.2s;
    }

    .admin-badge:hover { border-color: var(--green-main); }

    .admin-avatar {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: linear-gradient(135deg, #ffd180, #ffa726);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      color: #7a4000;
      flex-shrink: 0;
      overflow: hidden;
    }

    .admin-name { font-size: 13px; font-weight: 600; color: var(--text-dark); }
    .admin-chevron { font-size: 11px; color: var(--text-muted); }

    /* ===========================
       PAGE CONTENT
    =========================== */
    .page-content {
      padding: 28px 28px 36px;
      flex: 1;
    }

    /* Action Row */
    .action-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 14px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .search-wrap {
      position: relative;
      flex: 1;
      max-width: 300px;
    }

    .search-wrap .bi-search {
      position: absolute;
      left: 13px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 13px;
      color: var(--text-muted);
      pointer-events: none;
    }

    .search-input {
      width: 100%;
      border: 1.5px solid var(--border-col);
      border-radius: var(--radius-pill);
      padding: 9px 16px 9px 36px;
      font-family: 'Poppins', sans-serif;
      font-size: 12.5px;
      color: var(--text-dark);
      background: #fff;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    .search-input:focus {
      border-color: var(--green-main);
      box-shadow: 0 0 0 3px rgba(47,122,59,0.11);
    }

    .search-input::placeholder { color: #b0bcb5; }

    .action-btns { display: flex; gap: 10px; flex-wrap: wrap; }

    .btn-filter {
      display: flex;
      align-items: center;
      gap: 7px;
      background: var(--yellow-btn);
      color: var(--text-dark);
      font-family: 'Poppins', sans-serif;
      font-size: 12.5px;
      font-weight: 700;
      border: none;
      border-radius: var(--radius-pill);
      padding: 9px 22px;
      cursor: pointer;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 4px 14px rgba(249,195,73,0.32);
    }

    .btn-filter:hover {
      background: var(--yellow-hover);
      transform: translateY(-1px);
      box-shadow: 0 7px 20px rgba(249,195,73,0.44);
    }

    .btn-add {
      display: flex;
      align-items: center;
      gap: 7px;
      background: var(--yellow-btn);
      color: var(--text-dark);
      font-family: 'Poppins', sans-serif;
      font-size: 12.5px;
      font-weight: 700;
      border: none;
      border-radius: var(--radius-pill);
      padding: 9px 22px;
      cursor: pointer;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 4px 14px rgba(249,195,73,0.32);
    }

    .btn-add:hover {
      background: var(--yellow-hover);
      transform: translateY(-1px);
      box-shadow: 0 7px 20px rgba(249,195,73,0.44);
    }

    /* ===========================
       TABLE CARD
    =========================== */
    .table-card {
      background: #fff;
      border-radius: var(--card-radius);
      border: 2px solid var(--table-border);
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(74,159,212,0.10);
    }

    .custom-table {
      width: 100%;
      border-collapse: collapse;
      margin: 0;
    }

    .custom-table thead tr {
      background: #fff;
      border-bottom: 1.5px solid var(--border-col);
    }

    .custom-table thead th {
      font-size: 13px;
      font-weight: 700;
      color: var(--text-dark);
      padding: 14px 18px;
      white-space: nowrap;
      letter-spacing: -0.1px;
    }

    .custom-table tbody tr {
      border-bottom: 1px solid #f0f5f2;
      transition: background 0.15s;
    }

    .custom-table tbody tr:last-child { border-bottom: none; }
    .custom-table tbody tr:hover { background: #f7fdf9; }

    .custom-table tbody td {
      padding: 13px 18px;
      font-size: 13px;
      font-weight: 400;
      color: var(--text-dark);
      vertical-align: middle;
    }

    /* User cell */
    .user-cell {
      display: flex;
      align-items: center;
      gap: 11px;
    }

    .user-avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: linear-gradient(135deg, #ffd180, #ffa726);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 15px;
      color: #7a4000;
      flex-shrink: 0;
      overflow: hidden;
    }

    .user-name {
      font-size: 13px;
      font-weight: 600;
      color: var(--text-dark);
    }

    /* Email link */
    .email-link {
      color: #4a9fd4;
      font-size: 12.5px;
      text-decoration: underline;
      text-underline-offset: 2px;
      transition: color 0.2s;
    }

    .email-link:hover { color: #2371a8; }

    /* Role */
    .role-text {
      font-size: 12.5px;
      color: var(--text-muted);
    }

    /* Status badges */
    .status-badge {
      display: inline-block;
      font-size: 11.5px;
      font-weight: 600;
      border-radius: var(--radius-pill);
      padding: 4px 14px;
      letter-spacing: 0.2px;
    }

    .status-badge.active {
      background: var(--status-active-bg);
      color: var(--status-active-text);
    }

    .status-badge.inactive {
      background: var(--status-inactive-bg);
      color: var(--status-inactive-text);
    }

    /* Date */
    .date-text {
      font-size: 12.5px;
      color: var(--text-muted);
      white-space: nowrap;
    }

    /* Action buttons */
    .action-cell {
      display: flex;
      gap: 8px;
      align-items: center;
    }

    .act-btn {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      cursor: pointer;
      transition: transform 0.15s, box-shadow 0.15s;
    }

    .act-btn:hover { transform: translateY(-1px); }

    .act-btn.edit {
      background: var(--yellow-light);
      color: #b07d00;
    }

    .act-btn.edit:hover {
      background: #fde68a;
      box-shadow: 0 4px 10px rgba(249,195,73,0.32);
    }

    .act-btn.delete {
      background: var(--red-light);
      color: var(--red-btn);
    }

    .act-btn.delete:hover {
      background: #fed7d7;
      box-shadow: 0 4px 10px rgba(229,62,62,0.22);
    }

    /* ===========================
       TABLE FOOTER (Pagination)
    =========================== */
    .table-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 14px 18px;
      border-top: 1.5px solid var(--border-col);
      flex-wrap: wrap;
      gap: 12px;
    }

    .showing-text {
      font-size: 12px;
      color: var(--text-muted);
      font-weight: 400;
    }

    .pagination-wrap {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .pag-btn {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      border: 1.5px solid var(--border-col);
      background: #fff;
      font-family: 'Poppins', sans-serif;
      font-size: 12px;
      font-weight: 500;
      color: var(--text-muted);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.18s;
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
      box-shadow: 0 3px 10px rgba(249,195,73,0.38);
    }

    .pag-btn.arrow { font-size: 13px; }
    .pag-ellipsis { font-size: 12px; color: var(--text-muted); padding: 0 3px; }

    /* ===========================
       MOBILE SIDEBAR OVERLAY
    =========================== */
    .sidebar-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.45);
      z-index: 199;
    }

    .hamburger {
      display: none;
      background: none;
      border: none;
      font-size: 22px;
      color: var(--text-dark);
      cursor: pointer;
      padding: 4px 8px;
    }

    /* ===========================
       RESPONSIVE
    =========================== */
    @media (max-width: 991px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.open {
        transform: translateX(0);
      }

      .sidebar-overlay.show { display: block; }

      .main-area {
        margin-left: 0;
      }

      .hamburger { display: block; }

      .page-content { padding: 20px 16px 28px; }
      .topbar { padding: 12px 16px; }
    }

    @media (max-width: 600px) {
      .action-row { flex-direction: column; align-items: stretch; }
      .search-wrap { max-width: 100%; }
      .action-btns { justify-content: flex-end; }
      .custom-table thead th:nth-child(3),
      .custom-table tbody td:nth-child(3) { display: none; } /* hide Role col */
      .custom-table thead th:nth-child(5),
      .custom-table tbody td:nth-child(5) { display: none; } /* hide Date col */
    }
  </style>
</head>
<body>

  <!-- Sidebar Overlay (mobile) -->
  <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

  <!-- ===================================================
       APP WRAPPER
  =================================================== -->
  <div class="app-wrapper">

    <!-- ===============================================
         SIDEBAR
    =============================================== -->
    <aside class="sidebar" id="sidebar">

      <!-- Brand -->
      <div class="sidebar-brand">
        <div class="brand-logo">
          <i class="bi bi-globe-americas"></i>
        </div>
        <div class="brand-info">
          <span class="b-name">CleanEdu</span>
          <span class="b-sub">Energy</span>
        </div>
      </div>

      <!-- Nav links -->
      <nav class="sidebar-nav">
        <a href="{{ route('dashboard') }}" class="nav-item-link">
          <i class="bi bi-house-door"></i> Dashboard
        </a>
        <a href="{{ route('users') }}" class="nav-item-link active">
          <i class="bi bi-people"></i> Users
        </a>
        <a href="{{ route('artikel') }}" class="nav-item-link">
          <i class="bi bi-newspaper"></i> Article
        </a>
        <a href="{{ route('video') }}" class="nav-item-link">
          <i class="bi bi-play-circle"></i> Videos
        </a>
        <a href="{{ route('quiz') }}" class="nav-item-link">
          <i class="bi bi-patch-question"></i> Quizer
        </a>
        <a href="{{ route('badges') }}" class="nav-item-link">
          <i class="bi bi-award"></i> Badges
        </a>
        <a href="{{ route('reports') }}" class="nav-item-link">
          <i class="bi bi-bar-chart-line"></i> Reports
        </a>
        <a href="{{ route('settings') }}" class="nav-item-link">
          <i class="bi bi-gear"></i> Settings
        </a>
      </nav>

      <!-- Logout -->
      <div class="sidebar-footer">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <a href="#" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </div>

    </aside>
    <!-- /sidebar -->


    <!-- ===============================================
         MAIN AREA
    =============================================== -->
    <div class="main-area">

      <!-- TOP BAR -->
      <header class="topbar">
        <div class="d-flex align-items-center gap-3">
          <!-- Hamburger (mobile) -->
          <button class="hamburger" onclick="openSidebar()">
            <i class="bi bi-list"></i>
          </button>
          <div>
            <div class="topbar-title">User</div>
            <div class="topbar-sub">Manage all registered users on the platform</div>
          </div>
        </div>

        <div class="topbar-right">
          <!-- Notification -->
          <div class="notif-btn">
            <i class="bi bi-bell"></i>
            <span class="notif-dot"></span>
          </div>

          <!-- Admin badge -->
          <div class="admin-badge">
            <div class="admin-avatar">
              <i class="bi bi-person-fill"></i>
            </div>
            <span class="admin-name">Admin</span>
            <i class="bi bi-chevron-down admin-chevron"></i>
          </div>
        </div>
      </header>


      <!-- PAGE CONTENT -->
      <div class="page-content">

        <!-- Action Row: Search + Buttons -->
        <div class="action-row">
          <div class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="text" class="search-input" placeholder="Search User…" />
          </div>
          <div class="action-btns">
            <button class="btn-filter">
              <i class="bi bi-sliders2" style="font-size:13px;"></i> Filter
            </button>
            <button class="btn-add">
              <i class="bi bi-plus-lg" style="font-size:13px;"></i> + Add Users
            </button>
          </div>
        </div>

        <!-- Table Card -->
        <div class="table-card">
          <div class="table-responsive">
            <table class="custom-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Joined Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

                <!-- Row 1 - Active -->
                <tr>
                  <td>
                    <div class="user-cell">
                      <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                      <span class="user-name">Aristawati</span>
                    </div>
                  </td>
                  <td><a href="mailto:Aris@gmail.com" class="email-link">Aris@gmail.com</a></td>
                  <td><span class="role-text">Learner</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><span class="date-text">May 26, 2025</span></td>
                  <td>
                    <div class="action-cell">
                      <button class="act-btn edit" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="act-btn delete" title="Delete"><i class="bi bi-trash3"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 2 - Inactive -->
                <tr>
                  <td>
                    <div class="user-cell">
                      <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                      <span class="user-name">Aristawati</span>
                    </div>
                  </td>
                  <td><a href="mailto:Aris@gmail.com" class="email-link">Aris@gmail.com</a></td>
                  <td><span class="role-text">Learner</span></td>
                  <td><span class="status-badge inactive">Inactive</span></td>
                  <td><span class="date-text">May 26, 2025</span></td>
                  <td>
                    <div class="action-cell">
                      <button class="act-btn edit" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="act-btn delete" title="Delete"><i class="bi bi-trash3"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 3 - Active -->
                <tr>
                  <td>
                    <div class="user-cell">
                      <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                      <span class="user-name">Aristawati</span>
                    </div>
                  </td>
                  <td><a href="mailto:Aris@gmail.com" class="email-link">Aris@gmail.com</a></td>
                  <td><span class="role-text">Learner</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><span class="date-text">May 26, 2025</span></td>
                  <td>
                    <div class="action-cell">
                      <button class="act-btn edit" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="act-btn delete" title="Delete"><i class="bi bi-trash3"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 4 - Inactive -->
                <tr>
                  <td>
                    <div class="user-cell">
                      <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                      <span class="user-name">Aristawati</span>
                    </div>
                  </td>
                  <td><a href="mailto:Aris@gmail.com" class="email-link">Aris@gmail.com</a></td>
                  <td><span class="role-text">Learner</span></td>
                  <td><span class="status-badge inactive">Inactive</span></td>
                  <td><span class="date-text">May 26, 2025</span></td>
                  <td>
                    <div class="action-cell">
                      <button class="act-btn edit" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="act-btn delete" title="Delete"><i class="bi bi-trash3"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 5 - Active -->
                <tr>
                  <td>
                    <div class="user-cell">
                      <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                      <span class="user-name">Aristawati</span>
                    </div>
                  </td>
                  <td><a href="mailto:Aris@gmail.com" class="email-link">Aris@gmail.com</a></td>
                  <td><span class="role-text">Learner</span></td>
                  <td><span class="status-badge active">Active</span></td>
                  <td><span class="date-text">May 26, 2025</span></td>
                  <td>
                    <div class="action-cell">
                      <button class="act-btn edit" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="act-btn delete" title="Delete"><i class="bi bi-trash3"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 6 - Inactive -->
                <tr>
                  <td>
                    <div class="user-cell">
                      <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
                      <span class="user-name">Aristawati</span>
                    </div>
                  </td>
                  <td><a href="mailto:Aris@gmail.com" class="email-link">Aris@gmail.com</a></td>
                  <td><span class="role-text">Learner</span></td>
                  <td><span class="status-badge inactive">Inactive</span></td>
                  <td><span class="date-text">May 26, 2025</span></td>
                  <td>
                    <div class="action-cell">
                      <button class="act-btn edit" title="Edit"><i class="bi bi-pencil"></i></button>
                      <button class="act-btn delete" title="Delete"><i class="bi bi-trash3"></i></button>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

          <!-- Table Footer: Showing text + Pagination -->
          <div class="table-footer">
            <span class="showing-text">Showing 6 to 120 users</span>

            <div class="pagination-wrap">
              <a href="/users?page=prev" class="pag-btn arrow"><i class="bi bi-chevron-left"></i></a>
              <a href="/users?page=1" class="pag-btn">1</a>
              <a href="/users?page=2" class="pag-btn">2</a>
              <a href="/users?page=3" class="pag-btn">3</a>
              <a href="/users?page=4" class="pag-btn">4</a>
              <a href="/users?page=5" class="pag-btn active">5</a>
              <span class="pag-ellipsis">…</span>
              <a href="/users?page=12" class="pag-btn">12</a>
              <a href="/users?page=next" class="pag-btn arrow"><i class="bi bi-chevron-right"></i></a>
            </div>
          </div>

        </div>
        <!-- /table-card -->

      </div>
      <!-- /page-content -->

    </div>
    <!-- /main-area -->

  </div>
  <!-- /app-wrapper -->


  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Mobile sidebar toggle
    function openSidebar() {
      document.getElementById('sidebar').classList.add('open');
      document.getElementById('sidebarOverlay').classList.add('show');
    }

    function closeSidebar() {
      document.getElementById('sidebar').classList.remove('open');
      document.getElementById('sidebarOverlay').classList.remove('show');
    }

    // Filter button visual feedback (optional)
    document.querySelectorAll('.pag-btn:not(.arrow)').forEach(btn => {
      btn.addEventListener('click', function (e) {
        if (this.classList.contains('pag-ellipsis')) return;
        document.querySelectorAll('.pag-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>

</body>
</html>