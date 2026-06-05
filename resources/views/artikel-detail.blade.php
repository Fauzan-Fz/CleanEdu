<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $artikel['title'] }} - CleanEdu Energy</title>

    {{-- Google Fonts: Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2F9054;
            --primary-light: #e8f5ee;
            --text-main: #1a1a1a;
            --text-muted: #555;
            --bg: #f8f9fa;
            --card-bg: #ffffff;
            --border: #e9ecef;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            margin: 0;
        }

        .navbar-cleanedu {
            background-color: #fff;
            border-bottom: 1px solid var(--border);
            padding: 1rem 0;
        }

        .navbar-brand-logo {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-weight: 700;
            font-size: 1rem;
            color: var(--primary);
            text-decoration: none;
        }

        .navbar-brand-logo i {
            font-size: 1.25rem;
        }

        .page-header {
            padding: 2.5rem 0 1rem;
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.45rem;
        }

        .page-header p {
            color: var(--text-muted);
            margin-bottom: 0;
        }

        .detail-card {
            background: var(--card-bg);
            border-radius: 18px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 14px 36px rgba(0, 0, 0, 0.06);
        }

        .detail-image {
            width: 100%;
            height: 420px;
            object-fit: cover;
            display: block;
        }

        .detail-body {
            padding: 2rem;
        }

        .detail-badge {
            display: inline-block;
            padding: 0.45rem 0.95rem;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 600;
            color: #fff;
            background-color: var(--primary);
            margin-bottom: 1rem;
        }

        .badge-solar {
            background: rgba(249, 195, 73, 0.88);
            color: #5a3d00;
        }

        .badge-angin {
            background: rgba(47, 144, 84, 0.88);
            color: #fff;
        }

        .badge-biomassa {
            background: rgba(139, 92, 246, 0.82);
            color: #fff;
        }

        .badge-geo {
            background: rgba(239, 68, 68, 0.82);
            color: #fff;
        }

        .badge-tips {
            background: rgba(249, 195, 73, 0.92);
            color: #5a3d00;
        }

        .badge-lingk {
            background: rgba(59, 130, 246, 0.82);
            color: #fff;
        }

        .detail-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .detail-content {
            color: #4d4d4d;
            line-height: 1.85;
            font-size: 1rem;
        }

        .btn-back {
            border-radius: 10px;
            font-weight: 600;
            padding: 0.85rem 1.35rem;
        }

        @media (max-width: 767.98px) {
            .detail-image {
                height: 260px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-cleanedu sticky-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('welcome') }}" class="navbar-brand-logo">
            <i class="bi bi-lightning-charge-fill"></i>
            CleanEdu Energy
        </a>
        <a href="{{ route('artikel') }}" class="btn btn-outline-success btn-back">Kembali ke Artikel</a>
    </div>
</nav>

<main>
    <div class="container">
        <div class="page-header text-center text-md-start">
            <h1>{{ $artikel['title'] }}</h1>
            <p>Pelajari lebih lanjut mengenai energi bersih dan dampaknya untuk masa depan.</p>
        </div>

        <div class="detail-card mb-5">
            <img src="{{ $artikel['image'] }}" alt="{{ $artikel['title'] }}" class="detail-image">
            <div class="detail-body">
                <span class="detail-badge {{ $artikel['badge_class'] }}">{{ $artikel['category'] }}</span>
                <div class="detail-title">{{ $artikel['title'] }}</div>
                <div class="detail-content">
                    <p>{{ $artikel['content'] }}</p>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <a href="{{ route('artikel') }}" class="btn btn-success btn-back">Kembali ke Semua Artikel</a>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
