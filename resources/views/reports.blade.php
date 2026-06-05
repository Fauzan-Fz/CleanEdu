@extends('layouts.app')

@section('title', 'Laporan Progress Belajar')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(24px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-up {
    animation: fadeInUp 0.85s cubic-bezier(0.25, 1, 0.5, 1) forwards;
    opacity: 0;
}
.reports-page {
    min-height: 100vh;
    background-color: #f3f4f6;
    padding: 40px;
}
.stat-card,
.report-card,
.certificate-card {
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.05);
    border: none;
    background: #ffffff;
    padding: 24px;
}
.stat-card {
    min-height: 170px;
}
.stat-icon {
    width: 48px;
    height: 48px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    font-size: 1.25rem;
}
.stat-title {
    color: #6b7280;
    font-size: 0.95rem;
}
.stat-value {
    font-size: 2rem;
    font-weight: 700;
    color: #111827;
}
.table-report {
    border-radius: 16px;
    overflow: hidden;
}
.table-report table {
    margin-bottom: 0;
}
.table-report thead th {
    border-bottom: 2px solid #e5e7eb;
    color: #374151;
    font-weight: 600;
}
.table-report tbody tr {
    border-bottom: 1px solid #e5e7eb;
}
.table-report tbody td {
    color: #4b5563;
}
.badge-status {
    background-color: rgba(34,197,94,0.12);
    color: #16a34a;
    font-weight: 600;
}
.certificate-card {
    background: linear-gradient(135deg, rgba(74,222,128,0.18), rgba(236,193,82,0.18));
    padding: 28px;
}
.certificate-card h3 {
    color: #065f46;
}
.certificate-card p {
    color: #166534;
}
.btn-report {
    background-color: #ecc152;
    border-color: #ecc152;
    color: #2d3748;
    font-weight: 600;
    border-radius: 12px;
    padding: 12px 20px;
}
@media (max-width: 991.98px) {
    .reports-page {
        padding: 24px;
    }
}
</style>

<div class="reports-page">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12 animate-fade-up">
                <h1 class="fw-bold text-dark">Laporan Progress Belajar 🌱</h1>
                <p class="text-muted">Pantau pencapaian, statistik modul, dan skor kuis energi terbarukanmu di sini.</p>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-12 col-md-4 animate-fade-up">
                <div class="stat-card">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <p class="stat-title mb-1">Modul Selesai</p>
                            <p class="stat-value mb-0">12 / 15</p>
                        </div>
                        <span class="stat-icon" style="background: rgba(34,197,94,0.15); color: #16a34a;"><i class="bi bi-journal-check"></i></span>
                    </div>
                    <p class="text-muted small mb-0">Tiga modul lagi untuk mencapai target bulan ini.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 animate-fade-up" style="animation-delay: 0.08s;">
                <div class="stat-card">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <p class="stat-title mb-1">Rata-rata Skor Kuis</p>
                            <p class="stat-value mb-0">88 / 100</p>
                        </div>
                        <span class="stat-icon" style="background: rgba(245,158,11,0.15); color: #ca8a04;"><i class="bi bi-trophy-fill"></i></span>
                    </div>
                    <p class="text-muted small mb-0">Performa meningkat stabil dalam setiap sesi kuis.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 animate-fade-up" style="animation-delay: 0.16s;">
                <div class="stat-card">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <p class="stat-title mb-1">Total Waktu Belajar</p>
                            <p class="stat-value mb-0">14.5 Jam</p>
                        </div>
                        <span class="stat-icon" style="background: rgba(56,189,248,0.15); color: #0ea5e9;"><i class="bi bi-clock-history"></i></span>
                    </div>
                    <p class="text-muted small mb-0">Waktu yang dihabiskan untuk modul dan kuis minggu ini.</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-8 animate-fade-up">
                <div class="report-card table-report">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h3 class="fw-bold mb-1">Riwayat Aktivitas Modul</h3>
                            <p class="text-muted mb-0">Kegiatan terbaru berdasarkan akses modul kamu.</p>
                        </div>
                        <span class="badge badge-status">Terbaru</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Nama Modul</th>
                                    <th>Tanggal Akses</th>
                                    <th>Status</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-semibold">Energi Surya Dasar</td>
                                    <td>02 Juni 2026</td>
                                    <td><span class="badge badge-status">Selesai</span></td>
                                    <td>92</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Pengantar Turbin Angin</td>
                                    <td>31 Mei 2026</td>
                                    <td><span class="badge badge-status">Selesai</span></td>
                                    <td>86</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Teknologi Baterai Hijau</td>
                                    <td>28 Mei 2026</td>
                                    <td><span class="badge badge-status">Selesai</span></td>
                                    <td>89</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Strategi Energi Terbarukan</td>
                                    <td>25 Mei 2026</td>
                                    <td><span class="badge badge-status">Selesai</span></td>
                                    <td>91</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 animate-fade-up" style="animation-delay: 0.08s;">
                <div class="certificate-card">
                    <div class="mb-4">
                        <h3 class="fw-bold">Sertifikat & Pencapaian</h3>
                        <p>Selamat! Kamu sedang berada di jalur yang tepat untuk menjadi ahli energi bersih.</p>
                    </div>
                    <button class="btn btn-report w-100">Unduh Laporan PDF</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection