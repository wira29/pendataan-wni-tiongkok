<?php

use App\Http\Controllers\CabangController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PendataanTahunanController;
use App\Http\Controllers\RantingController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\PasportController;
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

Route::get('/', function () {
    return view('admin.pages.blank.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::resources([
        'cabang' => CabangController::class,
        'ranting' => RantingController::class,
        'pendataan' => PendataanTahunanController::class,
        'profile' => MyProfileController::class,
        'informasi' => InformationController::class,
        'pembaruan-paspor' => PasportController::class,
        ]);
});


