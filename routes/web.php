<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\PernikahanController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\SidController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing.index');
});

/*
|--------------------------------------------------------------------------
| Dashboard Default
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Dashboard Pages
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/kartu-keluarga', [DashboardController::class, 'kartuKeluarga'])
        ->name('dashboard.kartu_keluarga');
    Route::get('/dashboard/penduduk', [DashboardController::class, 'penduduk'])
        ->name('dashboard.penduduk');

    /*
    |--------------------------------------------------------------------------
    | Dashboard Surat (FORM ONLY)
    |--------------------------------------------------------------------------
    */
    Route::prefix('dashboard/surat')->group(function () {
        Route::get('/kematian', [DashboardController::class, 'formKematian'])
            ->name('dashboard.surat.kematian');

        Route::get('/kelahiran', [DashboardController::class, 'formKelahiran'])
            ->name('dashboard.surat.kelahiran');

        Route::get('/domisili', [DashboardController::class, 'formDomisili'])
            ->name('dashboard.surat.domisili');

        Route::get('/pernikahan', [DashboardController::class, 'formPernikahan'])
            ->name('dashboard.surat.pernikahan');

        Route::get('/update', [DashboardController::class, 'formUpdate'])
            ->name('dashboard.surat.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Surat Generic (Kalau Masih Dipakai)
    |--------------------------------------------------------------------------
    */
    Route::get('/surat/{jenis}', [SuratController::class, 'form'])
        ->name('surat.form');

    Route::post('/surat/preview', [SuratController::class, 'preview'])
        ->name('surat.preview');

    Route::post('/surat/print/{jenis}', [SuratController::class, 'print'])
        ->name('surat.print');

    Route::post('/surat/preview/kelahiran', [KelahiranController::class, 'preview'])
        ->name('surat.preview.kelahiran');

    /*
    |--------------------------------------------------------------------------
    | API Autofill Penduduk (NIK)
    |--------------------------------------------------------------------------
    */
    Route::get('/api/penduduk/{nik}', [KematianController::class, 'cariPenduduk']);
    Route::get('/api/pernikahan/penduduk/{nik}', [PernikahanController::class, 'cariPenduduk'])
        ->name('api.pernikahan.cariPenduduk');

    Route::get('/kelahiran/cari/{nik}', [KelahiranController::class, 'cariPenduduk']);
    Route::get('/kematian/cari/{nik}', [KematianController::class, 'cariPenduduk']);

    /*
    |-------------------------------------------------------------------------- 
    | Generate LaTeX (.tex) Surat
    |-------------------------------------------------------------------------- 
    */
    Route::post('/surat/generate-tex', [SuratController::class, 'generateLatex'])
        ->name('surat.generateLatex');

    /*
    |--------------------------------------------------------------------------
    | Kartu Keluarga
    |--------------------------------------------------------------------------
    */
    Route::get('/kartu-keluarga', [KartuKeluargaController::class, 'index'])
        ->name('kk.index');

    Route::get('/kartu-keluarga/{no_kk}', [KartuKeluargaController::class, 'show'])
        ->name('kk.show');

    /*
    |--------------------------------------------------------------------------
    | IMPORT / EXPORT EXCEL
    |--------------------------------------------------------------------------
    */
    Route::get('/penduduk/export/excel', [PendudukController::class, 'export'])
        ->name('penduduk.export');

    Route::post('/penduduk/import/excel', [PendudukController::class, 'import'])
        ->name('penduduk.import');

    /*
    |--------------------------------------------------------------------------
    | Resource Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('penduduk', PendudukController::class);
    Route::resource('sid', SidController::class);
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
