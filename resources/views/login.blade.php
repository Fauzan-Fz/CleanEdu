<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login – CleanEdu Energy</title>

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
        VARIABLES & RESET
    =========================== */
    :root {
      --green-main:  #2F9054;
      --green-dark:  #236b3e;
      --green-light: #e8f7ee;
      --green-bg:    #F8FEF5;
      --yellow-btn:  #F9C349;
      --yellow-hover:#e0ae3f;
      --text-dark:   #1a2e1e;
      --text-muted:  #6b7a6e;
      --border-col:  #d8e8de;
      --shadow-card: 0 12px 48px rgba(47,144,84,0.12);
      --radius-pill: 50px;
      --radius-card: 22px;
      --radius-input:12px;
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f6f3;
      margin: 0;
      padding: 0;
      min-height: 100vh;
    }

    /* ===========================
        SPLIT-SCREEN WRAPPER
    =========================== */
    .split-wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* ===========================
        LEFT COLUMN – FORM PANEL
    =========================== */
    .panel-form {
      width: 45%;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px 32px;
      position: relative;
      z-index: 2;
    }

    .login-card {
      width: 100%;
      max-width: 420px;
    }

    /* Logo placeholder */
    .logo-wrap {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 9px;
      margin-bottom: 28px;
    }

    .logo-icon {
      width: 40px;
      height: 40px;
      border-radius: 11px;
      background: var(--green-light);
      border: 2px solid var(--green-main);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      color: var(--green-main);
    }

    .logo-text-wrap {
      display: flex;
      flex-direction: column;
      line-height: 1.15;
    }

    .logo-name {
      font-size: 17px;
      font-weight: 800;
      color: var(--green-main);
      letter-spacing: -0.3px;
    }

    .logo-sub {
      font-size: 11px;
      font-weight: 400;
      color: var(--text-muted);
      letter-spacing: 0.4px;
    }

    /* Heading */
    .login-title {
      font-size: 26px;
      font-weight: 800;
      color: var(--text-dark);
      margin-bottom: 4px;
      letter-spacing: -0.4px;
    }

    .login-subtitle {
      font-size: 13.5px;
      font-weight: 400;
      color: var(--text-muted);
      margin-bottom: 30px;
    }

    /* Form labels */
    .form-label-custom {
      font-size: 13px;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 7px;
    }

    /* Input group */
    .input-group-custom {
      border: 1.5px solid var(--border-col);
      border-radius: var(--radius-input);
      overflow: hidden;
      transition: border-color 0.2s, box-shadow 0.2s;
      background: #fff;
    }

    .input-group-custom:focus-within {
      border-color: var(--green-main);
      box-shadow: 0 0 0 3.5px rgba(47,144,84,0.13);
    }

    .input-group-custom .ig-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 14px;
      background: #fff;
      color: var(--text-muted);
      font-size: 15px;
      border: none;
    }

    .input-group-custom input {
      border: none;
      outline: none;
      box-shadow: none !important;
      font-family: 'Poppins', sans-serif;
      font-size: 13.5px;
      color: var(--text-dark);
      padding: 12px 10px 12px 0;
      background: transparent;
      flex: 1;
      min-width: 0;
    }

    .input-group-custom input::placeholder {
      color: #b0bcb5;
      font-weight: 400;
    }

    .input-group-custom .ig-icon-right {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 14px;
      background: #fff;
      border: none;
      cursor: pointer;
      color: var(--text-muted);
      font-size: 15px;
      transition: color 0.2s;
    }

    .input-group-custom .ig-icon-right:hover {
      color: var(--green-main);
    }

    /* Lupa kata sandi */
    .forgot-link {
      font-size: 12.5px;
      font-weight: 600;
      color: var(--green-main);
      text-decoration: none;
      display: block;
      text-align: right;
      margin-top: 8px;
      transition: color 0.2s;
    }

    .forgot-link:hover {
      color: var(--green-dark);
      text-decoration: underline;
    }

    /* Tombol Masuk */
    .btn-masuk {
      background: var(--yellow-btn);
      color: var(--text-dark);
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
      font-weight: 700;
      border: none;
      border-radius: var(--radius-pill);
      padding: 13px;
      width: 100%;
      margin-top: 6px;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 5px 18px rgba(249,195,73,0.38);
      letter-spacing: 0.2px;
    }

    .btn-masuk:hover {
      background: var(--yellow-hover);
      transform: translateY(-2px);
      box-shadow: 0 9px 26px rgba(249,195,73,0.48);
    }

    /* Register link */
    .register-note {
      font-size: 13px;
      font-weight: 400;
      color: var(--text-muted);
      text-align: center;
      margin-top: 32px;
    }

    .register-note a {
      color: var(--green-main);
      font-weight: 700;
      text-decoration: none;
      transition: color 0.2s;
    }

    .register-note a:hover {
      color: var(--green-dark);
      text-decoration: underline;
    }

    /* ===========================
        RIGHT COLUMN – ILLUSTRATION
    =========================== */
    .panel-illustration {
      width: 55%;
      position: relative;
      overflow: hidden;
      background: linear-gradient(145deg, #d6f0de 0%, #a8dcb8 35%, #6ec48e 65%, #3fa868 100%);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Decorative blobs */
    .panel-illustration::before {
      content: '';
      position: absolute;
      top: -80px;
      right: -60px;
      width: 380px;
      height: 380px;
      background: rgba(255,255,255,0.18);
      border-radius: 50% 40% 60% 50% / 50% 60% 40% 50%;
      animation: blobDrift 9s ease-in-out infinite alternate;
    }

    .panel-illustration::after {
      content: '';
      position: absolute;
      bottom: -60px;
      left: -50px;
      width: 320px;
      height: 320px;
      background: rgba(255,255,255,0.12);
      border-radius: 60% 40% 50% 60% / 40% 55% 45% 60%;
      animation: blobDrift 12s ease-in-out 3s infinite alternate;
    }

    @keyframes blobDrift {
      0%   { transform: scale(1) translate(0,0) rotate(0deg); }
      100% { transform: scale(1.08) translate(15px,-20px) rotate(8deg); }
    }

    .illus-content {
      position: relative;
      z-index: 2;
      text-align: center;
      padding: 40px 48px;
    }

    /* Sun decorative */
    .sun-deco {
      width: 90px;
      height: 90px;
      background: radial-gradient(circle, #ffe082 30%, #ffc107 70%, #ff8f00 100%);
      border-radius: 50%;
      margin: 0 auto 32px;
      box-shadow: 0 0 0 18px rgba(255,224,130,0.3), 0 0 0 36px rgba(255,224,130,0.12);
      display: flex;
      align-items: center;
      justify-content: center;
      animation: sunPulse 4s ease-in-out infinite;
    }

    .sun-deco i {
      font-size: 44px;
      color: #fff;
      filter: drop-shadow(0 2px 8px rgba(255,193,7,0.6));
    }

    @keyframes sunPulse {
      0%, 100% { box-shadow: 0 0 0 18px rgba(255,224,130,0.3), 0 0 0 36px rgba(255,224,130,0.12); }
      50%       { box-shadow: 0 0 0 24px rgba(255,224,130,0.4), 0 0 0 48px rgba(255,224,130,0.16); }
    }

    /* Illustration placeholder area */
    .illus-placeholder-box {
      width: 320px;
      max-width: 90%;
      height: 220px;
      background: rgba(255,255,255,0.22);
      border: 2px dashed rgba(255,255,255,0.55);
      border-radius: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin: 0 auto 28px;
      color: rgba(255,255,255,0.9);
      font-size: 13px;
      font-weight: 500;
      gap: 10px;
      padding: 16px;
      text-align: center;
      line-height: 1.5;
    }

    .illus-placeholder-box i {
      font-size: 48px;
      opacity: 0.8;
    }

    /* Floating icons */
    .float-icons {
      display: flex;
      justify-content: center;
      gap: 18px;
      margin-bottom: 20px;
    }

    .float-icon-item {
      width: 54px;
      height: 54px;
      background: rgba(255,255,255,0.28);
      backdrop-filter: blur(6px);
      border: 1.5px solid rgba(255,255,255,0.45);
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      color: #fff;
      animation: iconFloat 5s ease-in-out infinite alternate;
    }

    .float-icon-item:nth-child(2) { animation-delay: 1.2s; }
    .float-icon-item:nth-child(3) { animation-delay: 2.4s; }

    @keyframes iconFloat {
      0%   { transform: translateY(0); }
      100% { transform: translateY(-8px); }
    }

    .illus-caption {
      font-size: 20px;
      font-weight: 800;
      color: #fff;
      letter-spacing: -0.4px;
      text-shadow: 0 2px 12px rgba(0,0,0,0.12);
      margin-bottom: 8px;
    }

    .illus-subcaption {
      font-size: 13px;
      font-weight: 400;
      color: rgba(255,255,255,0.82);
      line-height: 1.6;
      max-width: 280px;
      margin: 0 auto;
    }

    /* ===========================
        RESPONSIVE
    =========================== */
    @media (max-width: 991px) {
      .panel-form         { width: 100%; padding: 40px 24px; }
      .panel-illustration {
        display: none; /* hidden on mobile/tablet; form is full-width */
      }
      .split-wrapper { justify-content: center; }
    }

    @media (max-width: 480px) {
      .login-title { font-size: 22px; }
      .login-card  { padding: 0 4px; }
    }
  </style>
</head>
<body>

  <!-- ===================================================
       SPLIT-SCREEN WRAPPER
  =================================================== -->
  <div class="split-wrapper">

    <!-- ===============================================
          LEFT PANEL — LOGIN FORM
    =============================================== -->
    <div class="panel-form">
      <div class="login-card">

        <!-- Logo -->
        <div class="logo-wrap">
          <div class="logo-icon">
            <i class="bi bi-globe-americas"></i>
          </div>
          <div class="logo-text-wrap">
            <span class="logo-name">CleanEdu</span>
            <span class="logo-sub">Energy</span>
          </div>
        </div>

        <!-- Heading -->
        <h1 class="login-title">Selamat Kembali! 👋</h1>
        <p class="login-subtitle">Masuk Untuk Melanjutkan Perjalanan Belajarmu</p>

        <!-- Email Field -->
        <div class="mb-3">
          <label class="form-label-custom">Email</label>
          <div class="input-group-custom d-flex align-items-center">
            <span class="ig-icon"><i class="bi bi-envelope"></i></span>
            <input type="email" placeholder="nama@gmail.com" autocomplete="email" />
          </div>
        </div>

        <!-- Password Field -->
        <div class="mb-1">
          <label class="form-label-custom">Kata Sandi</label>
          <div class="input-group-custom d-flex align-items-center">
            <span class="ig-icon"><i class="bi bi-lock"></i></span>
            <input type="password" id="passwordInput" placeholder="Masukan kata sandi" autocomplete="current-password" />
            <button class="ig-icon-right" type="button" onclick="togglePassword()" title="Tampilkan/Sembunyikan Kata Sandi" aria-label="Toggle password">
              <i class="bi bi-eye" id="eyeIcon"></i>
            </button>
          </div>
        </div>

        <!-- Lupa Kata Sandi -->
        <a href="#" class="forgot-link">Lupa kata sandi?</a>

        <!-- Tombol Masuk -->
        <button class="btn-masuk mt-4" type="button">Masuk</button>

        <!-- Register Note -->
        <p class="register-note">
          Belum punya akun? <a href="#">Daftar disini</a>
        </p>

      </div>
    </div><!-- /panel-form -->


    <!-- ===============================================
          RIGHT PANEL — ILLUSTRATION PLACEHOLDER
    =============================================== -->
    <div class="panel-illustration">
      <div class="illus-content">

        <!-- Sun decoration -->
        <div class="sun-deco">
          <i class="bi bi-sun-fill"></i>
        </div>

        <!-- Floating energy icons -->
        <div class="float-icons">
          <div class="float-icons">
            <div class="float-icon-item"><i class="bi bi-wind"></i></div>
            <div class="float-icon-item"><i class="bi bi-lightning-charge-fill"></i></div>
            <div class="float-icon-item"><i class="bi bi-droplet-fill"></i></div>
          </div>
        </div>

        <!-- Illustration placeholder box -->
        <div class="illus-placeholder-box">
          <i class="bi bi-house-heart-fill"></i>
          [Area Gambar Ilustrasi Energi Bersih]<br />
          <span style="font-size:11px; opacity:0.75">(Turbin angin, panel surya, rumah hijau)</span>
        </div>

        <!-- Caption -->
        <div class="illus-caption">Masa Depan Lebih Hijau</div>
        <p class="illus-subcaption">
          Platform edukasi interaktif untuk memahami energi bersih dan mewujudkan masa depan berkelanjutan.
        </p>

      </div>
    </div><!-- /panel-illustration -->

  </div><!-- /split-wrapper -->


  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Toggle password visibility
    function togglePassword() {
      const input   = document.getElementById('passwordInput');
      const eyeIcon = document.getElementById('eyeIcon');
      if (input.type === 'password') {
        input.type = 'text';
        eyeIcon.classList.replace('bi-eye', 'bi-eye-slash');
      } else {
        input.type = 'password';
        eyeIcon.classList.replace('bi-eye-slash', 'bi-eye');
      }
    }
  </script>

</body>
</html>