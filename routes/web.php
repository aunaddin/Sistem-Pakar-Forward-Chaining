<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PenyakitController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/', [PublicController::class, 'home']);

// Deteksi Penyakit
Route::get('/deteksi', [DiagnosaController::class, 'index'])
    ->name('deteksi');

Route::post('/deteksi/proses', [DiagnosaController::class, 'proses'])
    ->name('deteksi.proses');

Route::get('/deteksi/pdf/{id}', [DiagnosaController::class, 'pdf'])
    ->name('deteksi.pdf');

Route::get('/penyakit', [PublicController::class, 'penyakit']);

Route::get('/penyakit/{id}', [PublicController::class, 'detailPenyakit']);

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Lupa Password
Route::get('/lupa-password', [ForgotPasswordController::class, 'showForm'])->name('password.request');
Route::post('/lupa-password', [ForgotPasswordController::class, 'sendLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {

        // Penyakit
        Route::resource('penyakit', PenyakitController::class);

        // Gejala
        Route::resource('gejala', GejalaController::class);

        // Rules
        Route::get('/rules',                        [RuleController::class, 'index'])             ->name('rules.index');
        Route::get('/rules/create',                 [RuleController::class, 'create'])            ->name('rules.create');
        Route::post('/rules/store',                 [RuleController::class, 'store'])             ->name('rules.store');
        Route::get('/rules/{penyakitId}/edit',      [RuleController::class, 'edit'])              ->name('rules.edit');
        Route::put('/rules/{penyakitId}',           [RuleController::class, 'update'])            ->name('rules.update');
        Route::delete('/rules/{penyakitId}/all',    [RuleController::class, 'destroyByPenyakit']) ->name('rules.destroyByPenyakit');

        // Riwayat Diagnosa
        Route::get('/riwayat',          [RiwayatController::class, 'index'])  ->name('riwayat.index');
        Route::get('/riwayat/{id}',     [RiwayatController::class, 'show'])   ->name('riwayat.show');
        Route::delete('/riwayat/{id}',  [RiwayatController::class, 'destroy'])->name('riwayat.destroy');
    });