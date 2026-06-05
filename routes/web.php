<?php

use App\Http\Controllers\EduController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EduController::class, 'welcome'])->name('welcome');
Route::get('/artikel', [EduController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{slug}', [EduController::class, 'detailArtikel'])->name('artikel.detail');
Route::get('/video', [EduController::class, 'video'])->name('video');
Route::get('/quiz', [EduController::class, 'quiz'])->name('quiz');
Route::post('/quiz/submit', [EduController::class, 'checkQuiz'])->name('quiz.submit');

Route::get('/register', [EduController::class, 'showRegister'])->name('register');
Route::post('/register', [EduController::class, 'register'])->name('register.submit');

Route::get('/login', [EduController::class, 'showLogin'])->name('login');
Route::post('/login', [EduController::class, 'login'])->name('login.submit');

Route::get('/settings', [EduController::class, 'settings'])->name('settings');
Route::post('/settings', [EduController::class, 'updateSettings'])->name('settings.update');

Route::post('/logout', [EduController::class, 'logout'])->name('logout');

Route::get('/dashboard', [EduController::class, 'dashboard'])->name('dashboard');

Route::view('/reports', 'reports')->name('reports');

Route::view('/dashboard/users', 'users')->name('users');

Route::view('/dashboard/badges', 'badges')->name('badges');

