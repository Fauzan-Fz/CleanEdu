<?php

use Illuminate\Support\Facades\Route;

// 1. Halaman Beranda / Landing Page Utama
Route::get('/', function () {
    return view('welcome');
});

// 2. Halaman Daftar Artikel
Route::get('/artikel', function () {
    return view('artikel');
});

// 3. Halaman Detail Artikel (Isi Bacaan)
Route::get('/detail-artikel', function () {
    return view('detail-artikel');
});

// 4. Halaman Artikel Terkait
Route::get('/tentang', function () {
    return view('terkait-artikel');
});

// 5. Halaman Pertanyaan Kuis
Route::get('/quiz', function () {
    return view('quiz');
});

// 6. Halaman Profil & Badge User
Route::get('/badges', function () {
    return view('profil');
});

// Halaman Profil
Route::get('/profil', function () {
    return view('profil');
});

// 7. Halaman Login
Route::get('/daftar', function () {
    return view('login');
});

// 8. Halaman Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// 9. Halaman User
Route::get('/users', function () {
    return view('users');
});

// 10. Halaman Video
Route::get('/video', function () {
    return view('video');
});