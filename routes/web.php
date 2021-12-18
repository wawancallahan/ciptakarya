<?php

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/ciptakaryabaru', App\Http\Controllers\CiptaKaryaBaruController::class);
    Route::get('ciptakaryabaru/create/gedung', [App\Http\Controllers\CiptaKaryaBaruController::class, 'gedung'])->name('ciptakaryabaru.gedung');
    Route::get('ciptakaryabaru/create/rumah', [App\Http\Controllers\CiptaKaryaBaruController::class, 'rumah'])->name('ciptakaryabaru.rumah');
    
    Route::resource('/ciptakaryalama', App\Http\Controllers\CiptaKaryaLamaController::class);
    
    Route::get('/ciptakaryalama/edit/{id}/bangunan', [App\Http\Controllers\CiptaKaryaLamaController::class, 'editSatu'])->name('lama-edit-satu');
    Route::post('/ciptakaryalama/update/{id}/bangunan', [App\Http\Controllers\CiptaKaryaLamaController::class, 'updateSatu'])->name('lama-update-satu');
    Route::get('/ciptakaryalama/edit/{id}/persyaratan-administrasi', [App\Http\Controllers\CiptaKaryaLamaController::class, 'editDua'])->name('lama-edit-dua');
    Route::post('/ciptakaryalama/update/{id}/persyaratan-administrasi', [App\Http\Controllers\CiptaKaryaLamaController::class, 'updateDua'])->name('lama-update-dua');
    Route::get('/ciptakaryalama/edit/{id}/persyaratan-tata-bangunan', [App\Http\Controllers\CiptaKaryaLamaController::class, 'editTiga'])->name('lama-edit-tiga');
    Route::post('/ciptakaryalama/update/{id}/persyaratan-tata-bangunan', [App\Http\Controllers\CiptaKaryaLamaController::class, 'updateTiga'])->name('lama-update-tiga');
    Route::get('/ciptakaryalama/edit/{id}/kelengkapan-sarana-prasarana', [App\Http\Controllers\CiptaKaryaLamaController::class, 'editEmpat'])->name('lama-edit-empat');
    Route::post('/ciptakaryalama/update/{id}/kelengkapan-sarana-prasarana', [App\Http\Controllers\CiptaKaryaLamaController::class, 'updateEmpat'])->name('lama-update-empat');
    Route::get('/ciptakaryalama/edit/{id}/persyaratan-struktur-bangunan', [App\Http\Controllers\CiptaKaryaLamaController::class, 'editLima'])->name('lama-edit-lima');
    Route::post('/ciptakaryalama/update/{id}/persyaratan-struktur-bangunan', [App\Http\Controllers\CiptaKaryaLamaController::class, 'updateLima'])->name('lama-update-lima');
    Route::get('/ciptakaryalama/edit/{id}/persyaratan-sarana-prasarana-dalam-bangunan', [App\Http\Controllers\CiptaKaryaLamaController::class, 'editEnam'])->name('lama-edit-enam');
    Route::post('/ciptakaryalama/update/{id}/persyaratan-sarana-prasarana-dalam-bangunan', [App\Http\Controllers\CiptaKaryaLamaController::class, 'updateEnam'])->name('lama-update-enam');
    Route::get('/ciptakaryalama/edit/{id}/ketentuan-umum', [App\Http\Controllers\CiptaKaryaLamaController::class, 'editTujuh'])->name('lama-edit-tujuh');
    Route::post('/ciptakaryalama/update/{id}/ketentuan-umum', [App\Http\Controllers\CiptaKaryaLamaController::class, 'updateTujuh'])->name('lama-update-tujuh');
    Route::get('/ciptakaryalama/edit/{id}/rekomendasi', [App\Http\Controllers\CiptaKaryaLamaController::class, 'editRekomendasi'])->name('lama-edit-rekomendasi');
    Route::post('/ciptakaryalama/update/{id}/rekomendasi', [App\Http\Controllers\CiptaKaryaLamaController::class, 'updateRekomendasi'])->name('lama-update-rekomendasi');
    Route::get('/ciptakaryalama/edit/{id}/catatan', [App\Http\Controllers\CiptaKaryaLamaController::class, 'editCatatan'])->name('lama-edit-catatan');
    Route::post('/ciptakaryalama/update/{id}/catatan', [App\Http\Controllers\CiptaKaryaLamaController::class, 'updateCatatan'])->name('lama-update-catatan');
    Route::get('/ciptakaryalama/print/{id}', [App\Http\Controllers\CiptaKaryaLamaController::class, 'print'])->name('lama-print');

    Route::get('/ciptakaryabaru/edit/{id}/bangunan', [App\Http\Controllers\CiptaKaryaBaruController::class, 'editSatu'])->name('baru-edit-satu');
    Route::post('/ciptakaryabaru/update/{id}/bangunan', [App\Http\Controllers\CiptaKaryaBaruController::class, 'updateSatu'])->name('baru-update-satu');
    Route::get('/ciptakaryabaru/edit/{id}/persyaratan-administrasi', [App\Http\Controllers\CiptaKaryaBaruController::class, 'editDua'])->name('baru-edit-dua');
    Route::post('/ciptakaryabaru/update/{id}/persyaratan-administrasi', [App\Http\Controllers\CiptaKaryaBaruController::class, 'updateDua'])->name('baru-update-dua');
    Route::get('/ciptakaryabaru/edit/{id}/persyaratan-tata-bangunan', [App\Http\Controllers\CiptaKaryaBaruController::class, 'editTiga'])->name('baru-edit-tiga');
    Route::post('/ciptakaryabaru/update/{id}/persyaratan-tata-bangunan', [App\Http\Controllers\CiptaKaryaBaruController::class, 'updateTiga'])->name('baru-update-tiga');
    Route::get('/ciptakaryabaru/edit/{id}/kelengkapan-sarana-prasarana', [App\Http\Controllers\CiptaKaryaBaruController::class, 'editEmpat'])->name('baru-edit-empat');
    Route::post('/ciptakaryabaru/update/{id}/kelengkapan-sarana-prasarana', [App\Http\Controllers\CiptaKaryaBaruController::class, 'updateEmpat'])->name('baru-update-empat');
    Route::get('/ciptakaryabaru/edit/{id}/persyaratan-struktur-bangunan', [App\Http\Controllers\CiptaKaryaBaruController::class, 'editLima'])->name('baru-edit-lima');
    Route::post('/ciptakaryabaru/update/{id}/persyaratan-struktur-bangunan', [App\Http\Controllers\CiptaKaryaBaruController::class, 'updateLima'])->name('baru-update-lima');
    Route::get('/ciptakaryabaru/edit/{id}/persyaratan-sarana-prasarana-dalam-bangunan', [App\Http\Controllers\CiptaKaryaBaruController::class, 'editEnam'])->name('baru-edit-enam');
    Route::post('/ciptakaryabaru/update/{id}/persyaratan-sarana-prasarana-dalam-bangunan', [App\Http\Controllers\CiptaKaryaBaruController::class, 'updateEnam'])->name('baru-update-enam');
    Route::get('/ciptakaryabaru/edit/{id}/ketentuan-umum', [App\Http\Controllers\CiptaKaryaBaruController::class, 'editTujuh'])->name('baru-edit-tujuh');
    Route::post('/ciptakaryabaru/update/{id}/ketentuan-umum', [App\Http\Controllers\CiptaKaryaBaruController::class, 'updateTujuh'])->name('baru-update-tujuh');
    Route::get('/ciptakaryabaru/edit/{id}/rekomendasi', [App\Http\Controllers\CiptaKaryaBaruController::class, 'editRekomendasi'])->name('baru-edit-rekomendasi');
    Route::post('/ciptakaryabaru/update/{id}/rekomendasi', [App\Http\Controllers\CiptaKaryaBaruController::class, 'updateRekomendasi'])->name('baru-update-rekomendasi');
    Route::get('/ciptakaryabaru/edit/{id}/catatan', [App\Http\Controllers\CiptaKaryaBaruController::class, 'editCatatan'])->name('baru-edit-catatan');
    Route::post('/ciptakaryabaru/update/{id}/catatan', [App\Http\Controllers\CiptaKaryaBaruController::class, 'updateCatatan'])->name('baru-update-catatan'); 
    Route::get('/ciptakaryabaru/print/{id}', [App\Http\Controllers\CiptaKaryaBaruController::class, 'print'])->name('baru-print');   
});
