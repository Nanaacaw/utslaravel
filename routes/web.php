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
Route::get('/', [BarangController::class, 'index'])->name('home');
Route::get('/barang', [BarangController::class, 'create'])->name('barang.form');
Route::post('/barang/process', [BarangController::class, 'process'])->name('barang.process');
Route::get('/edit-form/{id}', [BarangController::class, 'formedit'])->name('edit_form');
Route::post('/edit-form/{id}', [BarangController::class, 'edit'])->name('edit');
Route::get('/hapus/{id}', [BarangController::class,'hapus'])->name('hapus');