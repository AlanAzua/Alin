<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\DatasetController;
use App\Exports\UsersExport;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ExportController;





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
Route::resource('datasets', DatasetController::class);
Route::get('/export', [ExportController::class, 'exportExcel']);
Route::get('/export/cotizaciones', [ExportController::class, 'exportCoti']);
Route::get('/export/precios', [ExportController::class, 'exportPrecios']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/index', function () {
    return view('dataset.index');
})->name('index');
Route::group(['prefix' => 'index'], function () {
Route::get('/cotizaciones', function () {
    return view('dataset.cotizaciones');
});
});

Route::get('index/precios', function () {
    return view('dataset.precios');
});

Auth::routes();

Route::group (['middleware'=>['auth']], function(){
    Route::resource('roles', RolController::Class);
    Route::resource('usuarios', UsuarioController::Class);
    //Route::resource('datasets', DatasetController::Class);
});




