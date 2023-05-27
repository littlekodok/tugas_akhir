<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\Admin\DataObjekPajakController;
use App\Http\Controllers\Admin\DataPembayaranController;
use App\Http\Controllers\Admin\DataWajibPajakController;
use App\Http\Controllers\ObjekPajak\ObjekPajakController;
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
Route::post('/login',[AuthController::class,'post_login'])->name('post.login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/registrasi',[AuthController::class,'get_registrasi'])->name('registrasi');
Route::get('/reload-captcha', [AuthController::class, 'reloadCaptcha']);
Route::post('/registrasi',[AuthController::class,'post_registrasi'])->name('post.registrasi');

Route::get('/email/verifiy/need-verification',[VerificationController::class,'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verifiy/{id}/{hash}',[VerificationController::class,'verify'])->middleware(['auth','signed'])->name('verification.verify');
Route::get('/email/verifiy/resend-verification',[VerificationController::class,'resend'])->middleware(['auth','throttle:6,1'])->name('verification.resend');

// Route::get('/getKelurahanObjek/{id}',[ObjekPajakController::class,'getKelurahanObjek'])->name('kelurahan-objek');


Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::get('/data-wajib-pajak', [DataWajibPajakController::class, 'index'])->name('data-wajib-pajak');
    Route::get('/data-wajib-pajak/json', [DataWajibPajakController::class, 'dataWajibPajakJson']);

    Route::get('/data-objek-pajak', [DataObjekPajakController::class, 'dataObjekPajak'])->name('data-objek-pajak');
    Route::get('/data-pembayaran', [DataPembayaranController::class, 'dataPembayaran'])->name('data-pembayaran');

});

Route::middleware(['auth','verified'])->name('wajib-pajak.')->prefix('wajib-pajak')->group(function () {
    Route::get('', [WajibPajakController::class,'index'])->name('index');
    Route::get('getKelurahan/{id}',[WajibPajakController::class,'getKelurahan'])->name('kelurahan');
    Route::post('/store', [WajibPajakController::class,'store'])->name('store');
    
    Route::get('objek-pajak',[ObjekPajakController::class,'index'])->name('objek-pajak.index');
    Route::get('objek-pajak/tambah',[ObjekPajakController::class,'create'])->name('objek-pajak.tambah');
    Route::get('objek-pajak/tambah/getKelurahanObjek/{id}',[ObjekPajakController::class,'getKelurahanObjek']);
    Route::get('objek-pajak/tambah/getRekening/{id}',[ObjekPajakController::class,'getRekening']);

  
    
    
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
