<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AkunPosyanduController,
    DashboardController,
    MasterPuskesmasController,
    MasterStrataPosyanduController,
    KecamatanController,
    KelurahanController,
    MasterDinasKesehatanController,
    WilayahController,
    RegPosyanduController,
    DataRequestPosyanduController,
    LoginController,
    DataPosyanduController,
    DataKaderController,
    DataSasaranController,
    MasterPeralatanKesController,
    MasterPerbekalanKesController,
    MasterInstrumenController,
    DataPeralatanKesController,
    DataPerbekalanKesController,
    DataInstrumenKesController,
    BulananBalitaController,
    BulananIbuHamilController,
    BulananAnakDanRemajaController,
    BulananDewasaDanLansiaController,
    ListPosyanduController,
    ListPuskesmasController,
    AkunDinasKesehatanController,
    AkunPuskesmasController,
    AkunSuperadminController,
    DashboardDinkesController,
    DashboardPosyanduController,
    DashboardPuskesmasController,
    DashboardSuperadminController};

Route::get('/run-superadmin', function () {
    Artisan::call('db:seed', [
        '--class' => 'SuperAdminSeeder'
    ]);

    return "SuperAdminSeeder has been create successfully!";
});

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


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('registrasi', [RegPosyanduController::class, 'showRegistrationForm'])->name('register.index');
Route::post('registrasi', [RegPosyanduController::class, 'register'])->name('register.store')->withoutMiddleware('auth');


Route::group(['middleware' => ['role:posyandu']], function () {
Route::get('/dashboard-posyandu', [DashboardPosyanduController::class, 'index'])->name('posyandu.dashboard');
});

Route::group(['middleware' => ['role:puskesmas']], function () {
Route::get('/dashboard-puskesmas', [DashboardPuskesmasController::class, 'index'])->name('puskesmas.dashboard');
});

Route::group(['middleware' => ['role:dinaskesehatan']], function () {
Route::get('/dashboard-dinaskesehatan', [DashboardDinkesController::class, 'index'])->name('dinaskesehatan.dashboard');
});

Route::group(['middleware' => ['role:superadmin']], function () {
Route::get('/dashboard-superadmin', [DashboardSuperadminController::class, 'index'])->name('superadmin.dashboard');
});


// SUPERADMIN
Route::group(['middleware' => ['role:superadmin']], function () {

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

Route::get('master-peralatankes', [MasterPeralatanKesController::class, 'index'])->name('master-peralatankes.index');
Route::get('master-peralatankes/create', [MasterPeralatanKesController::class, 'create'])->name('master-peralatankes.create');
Route::post('master-peralatankes', [MasterPeralatanKesController::class, 'store'])->name('master-peralatankes.store');
Route::get('master-peralatankes/{id}/edit', [MasterPeralatanKesController::class, 'edit'])->name('master-peralatankes.edit');
Route::put('master-peralatankes/{id}', [MasterPeralatanKesController::class, 'update'])->name('master-peralatankes.update');
Route::delete('master-peralatankes/{id}', [MasterPeralatanKesController::class, 'destroy'])->name('master-peralatankes.destroy');

Route::get('master-perbekalankes', [MasterPerbekalanKesController::class, 'index'])->name('master-perbekalankes.index');
Route::get('master-perbekalankes/create', [MasterPerbekalanKesController::class, 'create'])->name('master-perbekalankes.create');
Route::post('master-perbekalankes', [MasterPerbekalanKesController::class, 'store'])->name('master-perbekalankes.store');
Route::get('master-perbekalankes/{id}/edit', [MasterPerbekalanKesController::class, 'edit'])->name('master-perbekalankes.edit');
Route::put('master-perbekalankes/{id}', [MasterPerbekalanKesController::class, 'update'])->name('master-perbekalankes.update');
Route::delete('master-perbekalankes/{id}', [MasterPerbekalanKesController::class, 'destroy'])->name('master-perbekalankes.destroy');

Route::get('master-instrumen', [MasterInstrumenController::class, 'index'])->name('master-instrumen.index');
Route::get('master-instrumen/create', [MasterInstrumenController::class, 'create'])->name('master-instrumen.create');
Route::post('master-instrumen', [MasterInstrumenController::class, 'store'])->name('master-instrumen.store');
Route::get('master-instrumen/{id}/edit', [MasterInstrumenController::class, 'edit'])->name('master-instrumen.edit');
Route::put('master-instrumen/{id}', [MasterInstrumenController::class, 'update'])->name('master-instrumen.update');
Route::delete('master-instrumen/{id}', [MasterInstrumenController::class, 'destroy'])->name('master-instrumen.destroy');
});

// SUPERADMIN


// POSYANDU USER
Route::group(['middleware' => ['role:posyandu']], function () {

Route::get('/dataposyandu', [DataPosyanduController::class, 'index'])->name('dataposyandu.index');
Route::post('/dataposyandu', [DataPosyanduController::class, 'storeOrUpdateDataPosyandu'])->name('dataposyandu.store');
Route::put('/dataposyandu/{dataPosyandu}', [DataPosyanduController::class, 'storeOrUpdateDataPosyandu'])->name('dataposyandu.update');

Route::resource('data-kader', DataKaderController::class)->withoutMiddleware('auth');

Route::post('/data-sasaran', [DataSasaranController::class, 'store'])->name('dataSasaran.store');
Route::put('/data-sasaran', [DataSasaranController::class, 'store'])->name('dataSasaran.update');// POSYANDU USER

Route::post('data-peralatan-kes/storeOrUpdate', [DataPeralatanKesController::class, 'storeOrUpdate'])->name('data-peralatan-kes.storeOrUpdate');

Route::post('data-perbekalan-kes/storeOrUpdate', [DataPerbekalanKesController::class, 'storeOrUpdate'])->name('data-perbekalan-kes.storeOrUpdate');

Route::post('data-instrumen-kes/storeOrUpdate', [DataInstrumenKesController::class, 'storeOrUpdate'])->name('data-instrumen-kes.storeOrUpdate');

Route::get('/bulanan-balita', [BulananBalitaController::class, 'index'])->name('bulanan_balita.index');
Route::post('/bulanan-balita/store', [BulananBalitaController::class, 'store'])->name('bulanan_balita.store');

Route::resource('bulanan_ibu_hamil', BulananIbuHamilController::class);

Route::get('/bulanan-anak-dan-remaja', [BulananAnakDanRemajaController::class, 'index'])->name('bulanan_anak_dan_remaja.index');
Route::post('/bulanan-anak-dan-remaja/store', [BulananAnakDanRemajaController::class, 'store'])->name('bulanan_anak_dan_remaja.store');


Route::get('/bulanan-dewasa-dan-lansia', [BulananDewasaDanLansiaController::class, 'index'])->name('bulanan_dewasa_dan_lansia.index');

Route::post('/bulanan-dewasa-dan-lansia/store', [BulananDewasaDanLansiaController::class, 'store'])->name('bulanan_dewasa_dan_lansia.store');
});
// POSYANDU USER



// PUSKESMAS USER
Route::group(['middleware' => ['role:puskesmas']], function () {

Route::get('request-posyandu', [DataRequestPosyanduController::class, 'index'])->name('request-posyandu.index');
Route::get('/request-posyandu/{id}/edit', [DataRequestPosyanduController::class, 'edit'])->name('request-posyandu.edit');
Route::put('/request-posyandu/{id}', [DataRequestPosyanduController::class, 'update'])->name('request-posyandu.update');

Route::get('/daftarposyandu', [ListPosyanduController::class, 'index'])->name('daftarposyandu.index');
Route::get('/daftarposyandu/{user_id}/detail', [ListPosyanduController::class, 'show'])->name('daftarposyandu.detail');
});
// PUSKESMAS USER


// DINAS KESEHATAN USER
Route::group(['middleware' => ['role:dinaskesehatan']], function () {

Route::get('/daftarpuskesmas', [ListPuskesmasController::class, 'index'])->name('daftarpuskesmas.index');
Route::get('/daftarpuskesmas/{puskesmas_id}/posyandu', [ListPuskesmasController::class, 'showPosyandu'])->name('daftarposyandubypuskes.index');
Route::get('/daftarpuskesmas/{user_id}/detailposyandu', [ListPuskesmasController::class, 'show'])->name('daftarposyandubypuskes.detail');

});

// DINAS KESEHATAN USER



// CHANGE USER
Route::group(['middleware' => ['role:posyandu']], function () {
Route::get('/akun-posyandu', [AkunPosyanduController::class, 'index'])->name('akun-posyandu.index');
Route::post('/akun-posyandu/update', [AkunPosyanduController::class, 'update'])->name('akun-posyandu.update');
});

Route::group(['middleware' => ['role:dinaskesehatan']], function () {
Route::get('/akun-dinas-kesehatan', [AkunDinasKesehatanController::class, 'index'])->name('akun-dinas-kesehatan.index');
Route::post('/akun-dinas-kesehatan/update', [AkunDinasKesehatanController::class, 'update'])->name('akun-dinas-kesehatan.update');
});

Route::group(['middleware' => ['role:puskesmas']], function () {
Route::get('/akun-puskesmas', [AkunPuskesmasController::class, 'index'])->name('akun-puskesmas.index');
Route::post('/akun-puskesmas/update', [AkunPuskesmasController::class, 'update'])->name('akun-puskesmas.update');
});

Route::group(['middleware' => ['role:superadmin']], function () {
Route::get('/akun-superadmin', [AkunSuperadminController::class, 'index'])->name('akun-superadmin.index');
Route::put('/akun-superadmin/update', [AkunSuperadminController::class, 'update'])->name('akun-superadmin.update');
});

// CHANGE USER