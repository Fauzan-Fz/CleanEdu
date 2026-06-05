@extends('layouts.app')

@section('title', 'Register')

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
.delay-1 { animation-delay: 0.1s; }
.delay-2 { animation-delay: 0.18s; }
.delay-3 { animation-delay: 0.26s; }
.register-page {
    min-height: 100vh;
    background-color: #f3f4f6;
}
.auth-card {
    border-radius: 24px;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    border: none;
    background: #ffffff;
    padding: 40px;
}
.auth-card input.form-control {
    border-radius: 12px;
    border: 1px solid #d7dde2;
    padding: 14px 16px;
}
.auth-card button[type="submit"] {
    border-radius: 12px;
    background-color: #ecc152;
    border: 1px solid #ecc152;
    color: #2d3748;
    font-weight: 600;
    padding: 14px 18px;
    width: 100%;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.auth-card button[type="submit"]:hover {
    transform: translateY(-1px);
    box-shadow: 0 12px 22px rgba(0, 0, 0, 0.12);
}
.panel-illustration {
    border-top-left-radius: 240px 100%;
    border-bottom-left-radius: 120px 100%;
    overflow: hidden;
    height: 100vh;
    position: relative;
    background: #4ca64c;
}
.panel-illustration .bg-image {
    position: absolute;
    inset: 0;
    object-fit: cover;
    width: 100%;
    height: 100%;
}
.panel-illustration .overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0.38), rgba(0,0,0,0.7));
}
.panel-illustration .panel-copy {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 4rem;
    color: #ffffff;
}
.panel-illustration .panel-copy h1 {
    font-size: clamp(2rem, 3.3vw, 3.4rem);
    line-height: 1.05;
    max-width: 520px;
}
.panel-illustration .panel-copy p {
    margin-top: 1rem;
    color: rgba(255,255,255,0.85);
    max-width: 420px;
    font-size: 1rem;
}
@media (max-width: 991.98px) {
    .panel-illustration {
        display: none;
    }
}
</style>

<div class="d-flex register-page">
    <div class="container-fluid">
        <div class="row gx-0 align-items-center min-vh-100">
            <div class="col-12 col-lg-5 d-flex align-items-center justify-content-center px-4 px-md-5 py-5">
                <div class="auth-card animate-fade-up delay-1" style="width:100%; max-width: 460px;">
                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-2 mb-3 animate-fade-up delay-2">
                            <span class="fs-4">🌱</span>
                            <span class="fs-5 fw-bold text-dark">CleanEdu Energy</span>
                        </div>
                        <h2 class="fw-bold text-dark animate-fade-up delay-3">Mulai Belajar! ✨</h2>
                        <p class="lead text-muted mb-0 animate-fade-up delay-3">Daftar Untuk Memulai Perjalanan Belajarmu</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success py-2">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger py-2">{{ session('error') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger py-2 mb-3">
                            <ul class="mb-0 small">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label small text-uppercase letter-spacing-1">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nama lengkap" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label small text-uppercase letter-spacing-1">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label small text-uppercase letter-spacing-1">Kata Sandi</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required style="border-top-left-radius: 12px; border-bottom-left-radius: 12px; border-right: none;">
                                <span class="input-group-text" id="toggleRegisterPassword" style="cursor: pointer; background: #ffffff; border-left: none; border-top-right-radius: 12px; border-bottom-right-radius: 12px; color: #6c757d;"><i class="bi bi-eye" id="eyeIconReg"></i></span>
                            </div>
                        </div>

                        <button type="submit" class="animate-fade-up delay-3">Daftar</button>
                    </form>

                    <div class="text-center mt-4 small text-muted">
                        <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="fw-semibold" style="color:#2f7f2f; text-decoration:none;">Masuk disini</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 d-none d-lg-block position-relative">
                <div class="panel-illustration">
                    <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?auto=format&fit=crop&w=1300&q=80" alt="Eco energy" class="bg-image">
                    <div class="overlay"></div>
                    <div class="panel-copy animate-fade-up delay-2">
                        <div>
                            <h1>Masa Depan Energi Bersih Mulai dari Sini</h1>
                            <p>Temukan inspirasi dan pengetahuan tentang energi terbarukan melalui perjalanan belajar CleanEdu Energy.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const toggleRegisterPassword = document.querySelector('#toggleRegisterPassword');
    const passwordReg = document.querySelector('#password');
    const eyeIconReg = document.querySelector('#eyeIconReg');

    if (toggleRegisterPassword && passwordReg && eyeIconReg) {
        toggleRegisterPassword.addEventListener('click', function () {
            const type = passwordReg.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordReg.setAttribute('type', type);
            
            if (type === 'text') {
                eyeIconReg.classList.remove('bi-eye');
                eyeIconReg.classList.add('bi-eye-slash');
            } else {
                eyeIconReg.classList.remove('bi-eye-slash');
                eyeIconReg.classList.add('bi-eye');
            }
        });
    }
</script>
@endsection