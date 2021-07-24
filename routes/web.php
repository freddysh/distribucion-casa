<?php

use App\Http\Controllers\LecturaController;
use App\Http\Controllers\UrbanizacionController;
use App\Http\Controllers\EspacioController;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\LecturaController::class, 'index'])->name('index');
Route::post('lectura-buscar', [LecturaController::class,'buscar'])->name('lectura.buscar');
Route::resource('lectura', LecturaController::class);
Route::get('urbanizacion-api', [UrbanizacionController::class,'index_api']);
Route::resource('espacio', EspacioController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');;
Route::get('reporte-lecturas-api', [LecturaController::class,'reporte_lecturas_api'])->name('reporte.lecturas.api')->middleware('auth');
Route::get('reporte-lecturas', [LecturaController::class,'reporte_lecturas'])->name('reporte.lecturas')->middleware('auth');
Route::get('reporte-lecturas-api-anios', [LecturaController::class,'reporte_lecturas_api_anios'])->name('reporte.lecturas.api.anios')->middleware('auth');
Route::get('reporte-lecturas-anios', [LecturaController::class,'reporte_lecturas_anios'])->name('reporte.lecturas.anios')->middleware('auth');
Route::get('reporte-lecturas-anios-imagen/{id}', [LecturaController::class,'reporte_lecturas_anios_imagen'])->name('reporte.lecturas.anios.imagen')->middleware('auth');

Route::resource('urbanizacion', UrbanizacionController::class)->middleware('auth');
