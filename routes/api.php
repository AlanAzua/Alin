<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatasetController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lala', [DatasetController::class, 'index'])->name('api-lala');
Route::get('/coti', [DatasetController::class, 'cotizaciones'])->name('api-coti');
Route::get('/coti/{numcot}', [DatasetController::class, 'cotizaciones'])->name('api-cotizacion');
Route::get('/precios', [DatasetController::class, 'precios'])->name('api-precios');
Route::get('/precios/{codpro}', [DatasetController::class, 'precios'])->name('api-preci');