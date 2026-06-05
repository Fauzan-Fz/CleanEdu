@extends('layouts.app')

@section('title', 'Daftar Badges')

@section('content')
<div style="background: #f8f9fa; min-height: 100vh; padding: 40px 0;">
    <div class="container-fluid px-4">
        <!-- Header Section -->
        <div class="mb-5">
            <h1 class="h3 fw-bold mb-2" style="color: #111827;">Daftar Badges</h1>
            <p class="text-muted" style="font-size: 1rem;">Raih berbagai pencapaian dan badges eksklusif dengan menyelesaikan tantangan di platform CleanEdu Energy. Setiap badge merepresentasikan milestone penting dalam perjalanan belajarmu.</p>
        </div>

        <!-- Badges Grid -->
        <div class="row g-3">
            <!-- Badge 1: Pahlawan Energi -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #fbbf24;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Pahlawan Energi</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Selesaikan 5 artikel tentang energi terbarukan.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 2: Pelajar Sejati -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #fbbf24;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Pelajar Sejati</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Tonton 10 video edukasi dan selesaikan quiz.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 3: Master Kuis -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #fbbf24;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Master Kuis</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Dapatkan skor 80% atau lebih di 5 kuis berbeda.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 4: Pencinta Keberlanjutan -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #fbbf24;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Pencinta Keberlanjutan</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Kunjungi platform selama 30 hari berturut-turut.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 5: Peneliti Energi -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #d4af37;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Peneliti Energi</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Baca lebih dari 20 artikel mendalam tentang energi baru.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 6: Ahli Video -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #d4af37;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Ahli Video</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Tonton semua video tutorial yang tersedia di platform.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 7: Juara Kompetisi -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #c0c0c0;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Juara Kompetisi</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Menangkan kompetisi quiz bulanan dengan skor tertinggi.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 8: Duta Lingkungan -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #22c55e;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Duta Lingkungan</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Raih semua badges dan menjadi ambassador komunitas.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 9: Inovator Hijau -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #10b981;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Inovator Hijau</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Selesaikan proyek energi terbarukan khusus dengan sempurna.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 10: Spektalis Energi -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #06b6d4;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Spesialis Energi</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Kuasai semua topik energi terbarukan dengan mendalam.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 11: Kontributor Komunitas -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #f59e0b;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Kontributor Komunitas</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Berbagi pengetahuan dan membantu 10 pengguna lainnya.</p>
                    </div>
                </div>
            </div>

            <!-- Badge 12: Legenda Keberlanjutan -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-body p-4 d-flex flex-column align-items-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-trophy-fill" style="font-size: 3rem; color: #8b5cf6;"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #111827; font-size: 1.1rem;">Legenda Keberlanjutan</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">Raih kesempurnaan mutlak dengan skor dan pencapaian maksimal.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12) !important;
    }
</style>
@endsection
