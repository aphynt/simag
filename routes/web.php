<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\PenilaianController;
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

    //Dashboard
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    //Pengajuan
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/ajukan', [PengajuanController::class, 'insert'])->name('pengajuan.insert');
    Route::get('/pengajuan/ajukan/edit/{uuid}', [PengajuanController::class, 'edit'])->name('pengajuan.edit');
    Route::post('/pengajuan/ajukan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::post('/pengajuan/ajukan/update/{uuid}', [PengajuanController::class, 'update'])->name('pengajuan.update');
    Route::get('/pengajuan/delete/{uuid}', [PengajuanController::class, 'delete'])->name('pengajuan.delete');

    //Persetujuan
    Route::get('/persetujuan', [PersetujuanController::class, 'index'])->name('persetujuan.index');
    Route::get('/persetujuan/detail/{uuid}', [PersetujuanController::class, 'detail'])->name('persetujuan.detail');
    Route::get('/persetujuan/download/{uuid}', [PersetujuanController::class, 'download'])->name('persetujuan.download');
    Route::put('/persetujuan/{uuid}/verifikasi', [PersetujuanController::class, 'verifikasi'])->name('persetujuan.verifikasi');
    Route::put('/persetujuan/{uuid}/tolak', [PersetujuanController::class, 'tolak'])->name('persetujuan.tolak');

    //Konsultasi
    Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');
    Route::post('/send-message', [KonsultasiController::class, 'sendMessage'])->name('konsultasi.sendmess');

    //Monitoring
    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring.index');
    Route::get('/monitoring/detail/{uuid}', [MonitoringController::class, 'detail'])->name('monitoring.detail');

    //Evaluasi
    Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi.index');

    //Penilaian
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');


    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/list', [UserController::class, 'list'])->name('user.list');
    Route::post('/user/list/insert', [UserController::class, 'listInsert'])->name('user.list.insert');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');

});
