<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertController;
use App\Http\Controllers\VerifikasiController;

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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::group([
        'prefix' => 'administration',
    ], function () {
        Route::resource('cert', CertController::class);
        Route::post('cert/remove/{id}', [CertController::class, 'remove'])->name('cert.remove');
        Route::get('cert/qr/{qrcode}', [CertController::class, 'download'])->name('qr.download');
        Route::post('cert/upload', [CertController::class, 'upload'])->name('cert.upload');
    });

});

Route::group([
    'prefix' => 'cekvalid',
], function () {
    Route::resource('verifikasi', VerifikasiController::class);
    Route::get('dokumen/{kode}', [VerifikasiController::class, 'dokumen'])->name('dokumen.kode');
    Route::get('dokumen/download/{file}', [VerifikasiController::class, 'dokumen_download'])->name('dokumen.download');
});