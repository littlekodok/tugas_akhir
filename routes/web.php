<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\VerificationController;
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

Route::get('/registrasi',[AuthController::class,'get_registrasi'])->name('registrasi');
Route::post('/registrasi',[AuthController::class,'post_registrasi'])->name('post.registrasi');

Route::get('/email/verifiy/need-verification',[VerificationController::class,'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verifiy/{id}/{hash}',[VerificationController::class,'verify'])->middleware(['auth','signed'])->name('verification.verify');
Route::get('/email/verifiy/resend-verification',[VerificationController::class,'resend'])->middleware(['auth','throttle:6,1'])->name('verification.resend');

// Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
//     Route::get('/esptpd', [AdminController::class, 'index'])->name('index');
//     Route::resource('/', CategoryController::class);
//     Route::resource('/menus', MenuController::class);
//     Route::resource('/tables', TableController::class);
//     Route::resource('/reservations', ReservationController::class);
// });
// Route::get('/esptpd/', function ($id) {
    
// });

Route::middleware(['auth','verified'])->name('wajib-pajak.')->prefix('wajib-pajak')->group(function () {
    Route::get('', [WajibPajakController::class,'index'])->name('index');
    Route::get('objek-pajak',[ObjekPajakController::class,'index'])->name('objek-pajak.index');
    Route::get('objek-pajak/tambah',[ObjekPajakController::class,'create'])->name('objek-pajak.tambah');
    
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
