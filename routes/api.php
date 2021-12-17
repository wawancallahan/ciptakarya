<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['as' => 'api.'], function () {
    Route::post('ciptakarya/rumah', [App\Http\Controllers\Api\CiptaKaryaController::class, 'rumah'])->name('ciptakarya.rumah');
    Route::post('ciptakarya/gedung', [App\Http\Controllers\Api\CiptaKaryaController::class, 'gedung'])->name('ciptakarya.gedung');
});