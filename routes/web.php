<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/ajukan', [PengajuanController::class, 'insert'])->name('pengajuan.insert');
    Route::get('/pengajuan/ajukan/edit/{uuid}', [PengajuanController::class, 'edit'])->name('pengajuan.edit');
    Route::post('/pengajuan/ajukan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::post('/pengajuan/ajukan/update/{uuid}', [PengajuanController::class, 'update'])->name('pengajuan.update');
    Route::get('/pengajuan/delete/{uuid}', [PengajuanController::class, 'delete'])->name('pengajuan.delete');

    Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');
    Route::post('/send-message', [KonsultasiController::class, 'sendMessage'])->name('konsultasi.sendmess');


    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');

});
