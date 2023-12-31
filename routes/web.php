<?php

use App\Http\Controllers\CabangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PendataanTahunanController;
use App\Http\Controllers\SubmitPendataanController;
use App\Http\Controllers\SubmitPembaruanController;
use App\Http\Controllers\RantingController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PasportController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PersetujuanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('pendataan/detail-admin/{pendataanId}', [PendataanTahunanController::class, 'detailAdmin'])->name('pendataan.detailAdmin');
    Route::get('submit-pendataan/{user}/{id}', [SubmitPendataanController::class, 'detailAdmin'])->name('submit-pendataan.detailAdmin');
    Route::get('/get-no-polisi/{mobilId}', [TransaksiController::class, 'getNoPolisi']);
    Route::post('/setujui-transaksi/{transaksiId}', [PersetujuanController::class, 'setujuiTransaksi']);

    

    Route::get('pembaruan-paspor/detail-admin/{pembaruanPasporId}', [PasportController::class, 'detailAdmin'])->name('pembaruan-paspor.detailAdmin');
    Route::get('submit-pembaruan-paspor/{user}/{id}', [SubmitPembaruanController::class, 'detailAdmin'])->name('submit-pembaruan-paspor.detailAdmin');
    Route::get('/download-file/{id}', [SubmitPembaruanController::class, 'downloadFile'])->name('download-file');
    Route::resources([
        'cabang' => CabangController::class,
        'ranting' => RantingController::class,
        'pendataan' => PendataanTahunanController::class,
        'profile' => MyProfileController::class,
        'submit-pendataan' => SubmitPendataanController::class,
        'informasi' => InformationController::class,
        'pembaruan-paspor' => PasportController::class,
        'submit-pembaruan-paspor' => SubmitPembaruanController::class,
        'mobil' => MobilController::class,
        'sopir' => SopirController::class,
        'transaksi' => TransaksiController::class,
        'persetujuan' => PersetujuanController::class,
        ]);
});


