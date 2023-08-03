<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\Tagihan\TagihanController;
use App\Http\Controllers\Admin\PajakHotelController;
use App\Http\Controllers\Admin\PajakParkirController;
use App\Http\Controllers\Admin\PajakHiburanController;
use App\Http\Controllers\Admin\PajakRestoranController;
use App\Http\Controllers\Admin\DataObjekPajakController;
use App\Http\Controllers\Admin\DataPembayaranController;
use App\Http\Controllers\Admin\DataWajibPajakController;
use App\Http\Controllers\ObjekPajak\ObjekPajakController;
use App\Http\Controllers\Pembayaran\PembayaranController;
use App\Http\Controllers\WajibPajak\WajibPajakController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'get_login'])->name('login');
Route::get('/reload-captcha-login', [AuthController::class, 'reloadCaptchaLogin']);
Route::post('/login',[AuthController::class,'post_login'])->name('post.login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/registrasi',[AuthController::class,'get_registrasi'])->name('registrasi');
Route::get('/reload-captcha', [AuthController::class, 'reloadCaptcha']);
Route::post('/registrasi',[AuthController::class,'post_registrasi'])->name('post.registrasi');

Route::get('/email/verifiy/need-verification',[VerificationController::class,'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verifiy/{id}/{hash}',[VerificationController::class,'verify'])->middleware(['auth','signed'])->name('verification.verify');
Route::get('/email/verifiy/resend-verification',[VerificationController::class,'resend'])->middleware(['auth','throttle:6,1'])->name('verification.resend');

// Route::get('/getKelurahanObjek/{id}',[ObjekPajakController::class,'getKelurahanObjek'])->name('kelurahan-objek');
Route::get('/getEditKelurahan/{id}',[DataWajibPajakController::class,'getEditKelurahan']);

// Admin
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::get('data-wajib-pajak', [DataWajibPajakController::class, 'index'])->name('data-wajib-pajak');
    Route::get('data-wajib-pajak/dataTableBelumValidasiJson', [DataWajibPajakController::class, 'dataWajibPajakBelumValidasiJson'])->name('datatable-belum-validasi');
    Route::get('data-wajib-pajak/dataTableTerValidasiJson', [DataWajibPajakController::class, 'dataWajibPajakTerValidasiJson'])->name('datatable-tervalidasi');
    
    Route::get('data-wajib-pajak/validasi/{wajibpajak}', [DataWajibPajakController::class, 'validasi'])->name('data-wajib-pajak.validasi');
    Route::get('data-wajib-pajak/edit-validasi/{wajibpajak}', [DataWajibPajakController::class, 'validasi_edit'])->name('data-wajib-pajak.edit-validasi');
    Route::post('data-wajib-pajak/validasi-post/{wajibpajak}', [DataWajibPajakController::class,'validasi_post'])->name('data-wajib-pajak.validasi-post');
    Route::post('data-wajib-pajak/validasi-update/{wajibpajak}', [DataWajibPajakController::class,'validasi_edit_update'])->name('data-wajib-pajak.validasi-update');
    Route::get('data-objek-pajak', [DataObjekPajakController::class, 'dataObjekPajak'])->name('data-objek-pajak');
    
    Route::get('update-password-admin',[AdminController::class,'adminPassword'])->name('admin-password');
    Route::post('update-password-admin',[AdminController::class,'adminPasswordUpdate'])->name('admin-update-password');

    //Data Pengguna
    Route::get('data-pengguna', [AdminController::class, 'dataPengguna'])->name('data-pengguna');
    Route::get('data-pengguna/dataTablePenggunaJson', [AdminController::class, 'dataPenggunaJson'])->name('datatable-pengguna');
    // Route::get('change-password/{id}',[AdminController::class,'changePassword'])->name('data-pengguna.change-password');
    Route::get('data-pengguna/update-password/{user}',[AdminController::class,'edit'])->name('edit-password');
    Route::post('data-pengguna/update-password/{user}',[AdminController::class,'updatePassword'])->name('update-password');


    // Pajak Restoran
    Route::get('data-objek-pajak/pajak-restoran', [PajakRestoranController::class, 'index'])->name('data-objek-pajak.pajak-restoran');
    Route::get('data-objek-pajak/pajak-restoran/dataTableRestoranBelumValidasiJson', [PajakRestoranController::class, 'dataRestoranBelumValidasiJson'])->name('datatable-restoran-belum-validasi');
    Route::get('data-objek-pajak/pajak-restoran/dataTableRestoranTerValidasiJson', [PajakRestoranController::class, 'dataRestoranTerValidasiJson'])->name('datatable-restoran-tervalidasi');
    Route::get('data-objek-pajak/pajak-restoran/validasi/{objekpajak}', [PajakRestoranController::class, 'validasi'])->name('pajak-restoran.validasi');
    Route::post('data-objek-pajak/pajak-restoran/validasi/{objekpajak}', [PajakRestoranController::class,'validasi_post'])->name('pajak-restoran.validasi-post');
    Route::get('data-objek-pajak/pajak-restoran/show/{objekpajak}',[PajakRestoranController::class,'show'])->name('pajak-restoran.show');

     // Pajak Hotel
    Route::get('data-objek-pajak/pajak-hotel', [PajakHotelController::class, 'index'])->name('data-objek-pajak.pajak-hotel');
    Route::get('data-objek-pajak/pajak-hotel/dataTableHotelBelumValidasiJson', [PajakHotelController::class, 'dataHotelBelumValidasiJson'])->name('datatable-hotel-belum-validasi');
    Route::get('data-objek-pajak/pajak-hotel/dataTableHotelTerValidasiJson', [PajakHotelController::class, 'dataHotelTerValidasiJson'])->name('datatable-hotel-tervalidasi');
    Route::get('data-objek-pajak/pajak-hotel/validasi/{objekpajak}', [PajakHotelController::class, 'validasi'])->name('pajak-hotel.validasi');
    Route::post('data-objek-pajak/pajak-hotel/validasi/{objekpajak}', [PajakHotelController::class,'validasi_post'])->name('pajak-hotel.validasi-post');
    Route::get('data-objek-pajak/pajak-hotel/show/{objekpajak}',[PajakHotelController::class,'show'])->name('pajak-hotel.show');

     // Pajak Hiburan
    Route::get('data-objek-pajak/pajak-hiburan', [PajakHiburanController::class, 'index'])->name('data-objek-pajak.pajak-hiburan');
    Route::get('data-objek-pajak/pajak-hiburan/dataTableHiburanBelumValidasiJson', [PajakhiburanController::class, 'dataHiburanBelumValidasiJson'])->name('datatable-hiburan-belum-validasi');
    Route::get('data-objek-pajak/pajak-hiburan/dataTableHiburanTerValidasiJson', [PajakhiburanController::class, 'dataHiburanTerValidasiJson'])->name('datatable-hiburan-tervalidasi');
    Route::get('data-objek-pajak/pajak-hiburan/validasi/{objekpajak}', [PajakHiburanController::class, 'validasi'])->name('pajak-hiburan.validasi');
    Route::post('data-objek-pajak/pajak-hiburan/validasi/{objekpajak}', [PajakHiburanController::class,'validasi_post'])->name('pajak-hiburan.validasi-post');
    Route::get('data-objek-pajak/pajak-hiburan/show/{objekpajak}',[PajakHiburanController::class,'show'])->name('pajak-hiburan.show');
     // Pajak Parkir
    Route::get('data-objek-pajak/pajak-parkir', [PajakParkirController::class, 'index'])->name('data-objek-pajak.pajak-parkir');
    Route::get('data-objek-pajak/pajak-parkir/dataTableParkirBelumValidasiJson', [PajakParkirController::class, 'dataParkirBelumValidasiJson'])->name('datatable-parkir-belum-validasi');
    Route::get('data-objek-pajak/pajak-parkir/dataTableParkirTerValidasiJson', [PajakParkirController::class, 'dataParkirTerValidasiJson'])->name('datatable-parkir-tervalidasi');
    Route::get('data-objek-pajak/pajak-parkir/validasi/{objekpajak}', [PajakParkirController::class, 'validasi'])->name('pajak-parkir.validasi');
    Route::post('data-objek-pajak/pajak-parkir/validasi/{objekpajak}', [PajakParkirController::class,'validasi_post'])->name('pajak-parkir.validasi-post');
    Route::get('data-objek-pajak/pajak-parkir/show/{objekpajak}', [PajakParkirController::class, 'show'])->name('pajak-parkir.show');
    // Data Pembayaran
    Route::get('data-pembayaran', [DataPembayaranController::class, 'dataPembayaran'])->name('data-pembayaran');
    Route::get('data-pembayaran/dataTableDataPembayaran',[DataPembayaranController::class,'dataTableDataPembayaran']);
    // Export
    Route::get('exportTransaksi',[DataPembayaranController::class,'export'])->name('transaksi.export');

});
// Wajib Pajak
Route::middleware(['auth','verified'])->name('wajib-pajak.')->prefix('wajib-pajak')->group(function () {
    Route::get('', [WajibPajakController::class,'index'])->name('index');
    Route::get('getKelurahan/{id}',[WajibPajakController::class,'getKelurahan'])->name('kelurahan');
    Route::post('/store', [WajibPajakController::class,'store'])->name('store');
    
    Route::get('objek-pajak',[ObjekPajakController::class,'index'])->name('objek-pajak.index');
    Route::get('objek-pajak/dataObjekPajak', [ObjekPajakController::class, 'dataObjekPajak'])->name('datatable-data-objek-pajak');
    Route::get('objek-pajak/show/{objekpajak}',[ObjekPajakController::class,'show'])->name('objek-pajak.show');
    Route::get('objek-pajak/tambah',[ObjekPajakController::class,'create'])->name('objek-pajak.tambah');
    Route::post('objek-pajak/store',[ObjekPajakController::class,'store'])->name('objek-pajak.store');
    Route::get('objek-pajak/tambah/getKelurahanObjek/{id}',[ObjekPajakController::class,'getKelurahanObjek']);
    Route::get('objek-pajak/tambah/getRekening/{id}',[ObjekPajakController::class,'getRekening']);

    Route::get('objek-pajak/tambah/getRekening/{id}',[ObjekPajakController::class,'getRekening']);
    // Pembayaran
    Route::get('pembayaran',[PembayaranController::class,'index'])->name('pembayaran.index');
    Route::get('pembayaran/dataTablePembayaran', [PembayaranController::class, 'dataPembayaran'])->name('datatable-pembayaran');
    Route::get('pembayaran/bayar/{objekpajak}', [PembayaranController::class, 'pembayaranObjekPajak'])->name('pembayaran-pajak');
    Route::post('pembayaran/proses-bayar/{objekpajak}', [PembayaranController::class, 'prosesBayar'])->name('proses-bayar');
    Route::get('sukses-bayar', [PembayaranController::class, 'suksesBayar'])->name('sukses-bayar');

    // Tagihan
    Route::get('tagihan', [TagihanController::class, 'index'])->name('tagihan');
    Route::get('tagihan/dataTagihanJson', [TagihanController::class, 'dataTagihanJson'])->name('datatable-tagihan');
    Route::get('tagihan/cetak_pembayaran/{transaksi}', [TagihanController::class,'cetakPembayaran'])->name('cetak-pembayaran');

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
