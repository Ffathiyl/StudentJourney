<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AktifitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RfidController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//routes Admin
Route::get('admins',[AdminController::class,'index'])->name('admins.index');
Route::get('admins/create',[AdminController::class,'create'])->name('admins.create');
Route::post('admins',[AdminController::class,'store'])->name('admins.store'); 
Route::get('admins/{id}/edit',[AdminController::class,'edit'])->name('admins.edit')->middleware('auth.admin:Admin');
Route::put('admins/{id}',[AdminController::class,'update'])->name('admins.update')->middleware('auth.admin:Admin');
Route::delete('admins/{id}',[AdminController::class,'destroy'])->name('admins.destroy')->middleware('auth.admin:Admin');
Route::post('adminr/{id}',[AdminController::class,'recovery'])->name('admins.recovery')->middleware('auth.admin:Admin');

//routes Mahasiswa
Route::get('mahasiswas',[MahasiswaController::class,'index'])->name('mahasiswas.index')->middleware('auth.admin:Admin');
Route::get('mahasiswas/create',[MahasiswaController::class,'create'])->name('mahasiswas.create')->middleware('auth.admin:Admin');
Route::post('mahasiswas',[MahasiswaController::class,'store'])->name('mahasiswas.store')->middleware('auth.admin:Admin');
Route::get('mahasiswas/{id}/edit',[MahasiswaController::class,'edit'])->name('mahasiswas.edit')->middleware('auth.admin:Admin');
Route::put('mahasiswas/{id}',[MahasiswaController::class,'update'])->name('mahasiswas.update')->middleware('auth.admin:Admin');
Route::delete('mahasiswas/{id}',[MahasiswaController::class,'destroy'])->name('mahasiswas.destroy')->middleware('auth.admin:Admin');

//routes RFID
Route::get('rfids',[RfidController::class,'index'])->name('rfids.index');
Route::get('rfids/create',[RfidController::class,'create'])->name('rfids.create');
Route::post('rfids',[RfidController::class,'store'])->name('rfids.store');
Route::get('rfids/{rfid}/edit',[RfidController::class,'edit'])->name('rfids.edit');
Route::put('rfids/{rfid}',[RfidController::class,'update'])->name('rfids.update');
Route::delete('rfids/{rfid}',[RfidController::class,'destroy'])->name('rfids.destroy');

//routes Kegiatan
Route::get('kegiatans',[KegiatanController::class,'index'])->name('kegiatans.index')->middleware('auth.admin:Admin');
Route::get('kegiatans/create',[KegiatanController::class,'create'])->name('kegiatans.create')->middleware('auth.admin:Admin');
Route::post('kegiatans',[KegiatanController::class,'store'])->name('kegiatans.store')->middleware('auth.admin:Admin');
Route::get('kegiatans/{id}/edit',[KegiatanController::class,'edit'])->name('kegiatans.edit')->middleware('auth.admin:Admin');
Route::put('kegiatans/{id}',[KegiatanController::class,'update'])->name('kegiatans.update')->middleware('auth.admin:Admin');
Route::delete('kegiatans/{id}',[KegiatanController::class,'destroy'])->name('kegiatans.destroy')->middleware('auth.admin:Admin');

//routes Pengajuan
Route::get('pengajuans',[PengajuanController::class,'index'])->name('pengajuans.index');
Route::get('pengajuan/mahasiswa',[PengajuanController::class,'indexs'])->name('pengajuans.indexs');
Route::get('pengajuans/create',[PengajuanController::class,'create'])->name('pengajuans.create');
Route::post('pengajuans',[PengajuanController::class,'store'])->name('pengajuans.store');
Route::get('pengajuans/{id}/edit',[PengajuanController::class,'edit'])->name('pengajuans.edit');
Route::put('pengajuans/{id}',[PengajuanController::class,'update'])->name('pengajuans.update');
Route::post('pengajuans/tolak',[PengajuanController::class,'TolakPengajuan'])->name('pengajuans.tolak')->middleware('auth.admin:Admin');
Route::post('pengajuans/aju/{id}',[PengajuanController::class,'Mengajukan'])->name('pengajuans.aju');
Route::post('pengajuans/acc/{id}',[PengajuanController::class,'Pengajuan'])->name('pengajuans.penga');

Route::get('pendaftarans',[PendaftaranController::class,'index'])->name('pendaftarans.index');
Route::post('pendaftaran/{id}',[PendaftaranController::class,'Approval'])->name('pendaftarans.app');
Route::get('pengajuans/pend',[PengajuanController::class,'createPend'])->name('pendaftaran.create');
Route::post('pendaftaran',[PengajuanController::class,'storePend'])->name('pendaftarans.store');
Route::delete('pendaftaran/{id}',[PengajuanController::class,'destroyPend'])->name('pendaftarans.destroy');

Route::get('/', function () {
    return view('logins.halamanAwal');
});

//Routes Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('Dashboard.dashboard')->middleware('auth.admin:Admin');
Route::get('dashboard/sekprod', [DashboardController::class, 'indexsek'])->name('Dashboard.dashboardsek')->middleware('auth.admin:Sekretaris Prodi');
Route::get('dashboard/mahasiswa', [DashboardController::class, 'indexp'])->name('Dashboard.dashboardtrl')->middleware('auth.mhs');

//routes Pengajuan
Route::get('pengajuans/create',[PengajuanController::class,'create'])->name('pengajuans.create');

//routes Login
Route::get('login',[LoginController::class,'index'])->name('logins.index');
Route::get('tap',[LoginController::class,'indexss'])->name('logins.logins');
Route::post('logins',[LoginController::class,'Login'])->name('logins.login');
Route::get('logout',[LoginController::class,'Logout'])->name('logins.logout');
Route::get('logouts',[LoginController::class,'Logouts'])->name('logins.logouts');
Route::get('auth',[LoginController::class,'Auth'])->name('logins.auth');
Route::post('pin/{nim}',[LoginController::class,'Indexs'])->name('logins.pin');
Route::post('pins/{nim}',[LoginController::class,'PIN'])->name('logins.PINS');

//Routes POV Mahasiswa TRL
Route::get('Main',[MhsController::class,'index'])->name('Dashboard.dashboardtrls')->middleware('auth.mhs');


Route::get('getTanggal', [PengajuanController::class, 'getTanggal'])->name('getTanggal');

//routes Aktifitas
Route::get('aktifitas',[AktifitasController::class,'index'])->name('aktifitas.index')->middleware('auth.admin:Admin');
Route::get('aktifitas/create',[AktifitasController::class,'create'])->name('aktifitas.create')->middleware('auth.admin:Admin');
Route::post('aktifitas',[AktifitasController::class,'store'])->name('aktifitas.store')->middleware('auth.admin:Admin');
Route::get('aktifitas/{id}/edit',[AktifitasController::class,'edit'])->name('aktifitas.edit')->middleware('auth.admin:Admin');
Route::put('aktifitas/{id}',[AktifitasController::class,'update'])->name('aktifitas.update')->middleware('auth.admin:Admin');
Route::delete('aktifitas/{id}',[AktifitasController::class,'destroy'])->name('aktifitas.destroy')->middleware('auth.admin:Admin');

// ROUTES SEKRETARIS PRODI -------------------------------------------------------------------

Route::get('/export-to-excel/{id}', [LaporanController::class, 'export'])->name('export.excel')->middleware('auth.admin:Sekretaris Prodi');

Route::get('plusvsminus',[LaporanController::class,'index'])->name('laporans.index')->middleware('auth.admin:Sekretaris Prodi');
Route::get('detailplusminus/{id}',[LaporanController::class,'detailLaporan'])->name('laporans.detail')->middleware('auth.admin:Sekretaris Prodi');
