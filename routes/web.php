<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarBarangController;
use App\Http\Controllers\ApiDropdownD2Controller;
use App\Http\Controllers\ApiDropdownD3Controller;
use App\Http\Controllers\ApiDropdownD4Controller;
use App\Http\Controllers\ApiDropdownD5Controller;
use App\Http\Controllers\PerbaruiBarangController;
use App\Http\Controllers\ApiSimpanSpesifikasiController;

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

Route::get('/', DaftarBarangController::class)->name('daftar_barang');
Route::get('/perbarui_barang/{id}', [PerbaruiBarangController::class, 'index'])->name('perbarui_barang.index');
Route::post('/perbarui_barang/{id}', [PerbaruiBarangController::class, 'process'])->name('perbarui_barang.process');
Route::get('/api_dropdown_d2/{ka}', ApiDropdownD2Controller::class)->name('api_dropdown_d2');
Route::get('/api_dropdown_d3/{kb}', ApiDropdownD3Controller::class)->name('api_dropdown_d3');
Route::get('/api_dropdown_d4/{kb}', ApiDropdownD4Controller::class)->name('api_dropdown_d4');
Route::get('/api_dropdown_d5/{kb}', ApiDropdownD5Controller::class)->name('api_dropdown_d5');
Route::get('/api_simpan_spesifikasi/d6', [ApiSimpanSpesifikasiController::class, 'simpanD6'])->name('api_simpan_spesifikasi.d6');
Route::get('/api_simpan_spesifikasi/d8', [ApiSimpanSpesifikasiController::class, 'simpanD8'])->name('api_simpan_spesifikasi.d8');
Route::get('/api_simpan_spesifikasi/d10', [ApiSimpanSpesifikasiController::class, 'simpanD10'])->name('api_simpan_spesifikasi.d10');
Route::get('/api_simpan_spesifikasi/d12', [ApiSimpanSpesifikasiController::class, 'simpanD12'])->name('api_simpan_spesifikasi.d12');
