<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;


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
Route::get('/templates', [BarangController::class, 'templates'])->name('utama');
Route::get('/barang', [BarangController::class, 'create'])->name('barang.form');
Route::post('/barang/process', [BarangController::class, 'process'])->name('barang.process');

Route::get('/', function () {
    return view('welcome');
});
