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

Route::get('/', [PublicController::class, 'home']);

// Deteksi Penyakit
Route::get('/deteksi', [DiagnosaController::class, 'index'])
    ->name('deteksi');

Route::post('/deteksi/proses', [DiagnosaController::class, 'proses'])
    ->name('deteksi.proses'); Auth::routes();

Route::get('/deteksi/pdf/{id}', [DiagnosaController::class, 'pdf'])
    ->name('deteksi.pdf');

Route::get('/penyakit', [PublicController::class, 'penyakit']);

Route::get('/penyakit/{id}', [PublicController::class, 'detailPenyakit']);

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
        Route::get('/riwayat', [RiwayatController::class, 'index'])
            ->name('riwayat.index');

        Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy'])
            ->name('riwayat.destroy');
    });