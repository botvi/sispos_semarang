<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    MasterPuskesmasController,
    MasterStrataPosyanduController,
    KecamatanController,
    KelurahanController,
    MasterDinasKesehatanController,
    WilayahController,
    RegPosyanduController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/kelurahan/{kecamatan_id}', [RegPosyanduController::class, 'getKelurahanByKecamatan'])->name('kelurahan.get');



Route::get('registrasi', [RegPosyanduController::class, 'showRegistrationForm'])->name('register.index');
Route::post('registrasi', [RegPosyanduController::class, 'register'])->name('register.store')->withoutMiddleware('auth');



Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

// SUPERADMIN
Route::get('/puskesmas', [MasterPuskesmasController::class, 'index'])->name('puskesmas.index');
Route::get('/puskesmas/create', [MasterPuskesmasController::class, 'create'])->name('puskesmas.create');
Route::post('/puskesmas/store', [MasterPuskesmasController::class, 'store'])->name('puskesmas.store');
Route::get('/puskesmas/edit/{id}', [MasterPuskesmasController::class, 'edit'])->name('puskesmas.edit');
Route::put('/puskesmas/update/{id}', [MasterPuskesmasController::class, 'update'])->name('puskesmas.update');
Route::delete('/puskesmas/delete/{id}', [MasterPuskesmasController::class, 'destroy'])->name('puskesmas.destroy');

Route::get('/dinaskesehatan', [MasterDinasKesehatanController::class, 'index'])->name('dinkes.index');
Route::get('/dinaskesehatan/create', [MasterDinasKesehatanController::class, 'create'])->name('dinkes.create');
Route::post('/dinaskesehatan/store', [MasterDinasKesehatanController::class, 'store'])->name('dinkes.store');
Route::get('/dinaskesehatan/edit/{id}', [MasterDinasKesehatanController::class, 'edit'])->name('dinkes.edit');
Route::put('/dinaskesehatan/update/{id}', [MasterDinasKesehatanController::class, 'update'])->name('dinkes.update');
Route::delete('/dinaskesehatan/delete/{id}', [MasterDinasKesehatanController::class, 'destroy'])->name('dinkes.destroy');

Route::get('/stratapos', [MasterStrataPosyanduController::class, 'index'])->name('stratapos.index');
Route::get('/stratapos/create', [MasterStrataPosyanduController::class, 'create'])->name('stratapos.create');
Route::post('/stratapos-store', [MasterStrataPosyanduController::class, 'store'])->name('stratapos.store');
Route::get('/stratapos/{id}/edit', [MasterStrataPosyanduController::class, 'edit'])->name('stratapos.edit');
Route::put('/stratapos/{id}', [MasterStrataPosyanduController::class, 'update'])->name('stratapos.update');
Route::delete('/stratapos/{id}', [MasterStrataPosyanduController::class, 'destroy'])->name('stratapos.destroy');

Route::get('/save-kecamatan', [KecamatanController::class, 'storeKecamatanData']);
Route::get('/save-kelurahan', [KelurahanController::class, 'storeKelurahanData']);
Route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah.index');
Route::post('/wilayah/delete-all', [WilayahController::class, 'deleteAll'])->name('wilayah.deleteAll');
// SUPERADMIN




