<?php

use App\Http\Controllers\LecturaController;
use App\Http\Controllers\UrbanizacionController;
use App\Http\Controllers\EspacioController;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/lectura', [App\Http\Controllers\LecturaController::class])->name('lectura');

Route::resource('lectura', LecturaController::class);
Route::post('lectura-buscar', [LecturaController::class,'buscar'])->name('lectura.buscar');
Route::resource('urbanizacion', UrbanizacionController::class);
Route::resource('espacio', EspacioController::class);

