<?php

use App\Http\Controllers\ApiDropdownD2Controller;
use App\Http\Controllers\ApiDropdownD3Controller;
use App\Http\Controllers\ApiDropdownD4Controller;
use App\Http\Controllers\ApiDropdownD5Controller;
use App\Http\Controllers\ApiDropdownD6Controller;
use App\Http\Controllers\ApiDropdownNilaiD6Controller;
use App\Http\Controllers\ApiDropdownNilaiD8Controller;
use App\Http\Controllers\ApiDropdownNilaiD10Controller;
use App\Http\Controllers\ApiDropdownNilaiD12Controller;
use App\Http\Controllers\ApiDropdownNilaiD14Controller;
use App\Http\Controllers\ApiDropdownNilaiD16Controller;
use App\Http\Controllers\ApiDropdownNilaiD18Controller;
use App\Http\Controllers\ApiDropdownNilaiD20Controller;
use App\Http\Controllers\ApiDropdownNilaiD22Controller;
use App\Http\Controllers\ApiDropdownNilaiD24Controller;
use App\Http\Controllers\ApiSimpanSpesifikasiController;
use App\Http\Controllers\BarangBelumDiperbaruiController;
use App\Http\Controllers\BarangSudahDiperbaruiController;
use App\Http\Controllers\DaftarBarangController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\KamusKodeController;
use App\Http\Controllers\PerbaruiBarangController;
use App\Http\Controllers\TambahBarangController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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
Route::get('/barang_sudah_diperbarui', BarangSudahDiperbaruiController::class)->name('barang_sudah_diperbarui');
Route::get('/barang_belum_diperbarui', BarangBelumDiperbaruiController::class)->name('barang_belum_diperbarui');
Route::get('/perbarui_barang/{id}', [PerbaruiBarangController::class, 'index'])->name('perbarui_barang.index');
Route::post('/perbarui_barang/{id}', [PerbaruiBarangController::class, 'process'])->name('perbarui_barang.process');
Route::get('/api_dropdown_d2/{ka}', ApiDropdownD2Controller::class)->name('api_dropdown_d2');
Route::get('/api_dropdown_d3/{kb}', ApiDropdownD3Controller::class)->name('api_dropdown_d3');
Route::get('/api_dropdown_d4/{kb}', ApiDropdownD4Controller::class)->name('api_dropdown_d4');
Route::get('/api_dropdown_d5/{kb}', ApiDropdownD5Controller::class)->name('api_dropdown_d5');
Route::get('/api_dropdown_d6/{d5}', ApiDropdownD6Controller::class)->name('api_dropdown_d6');
// Route::get('/api_dropdown_nilai_d6/{d5}/{keterangan}', ApiDropdownNilaiD6Controller::class)->name('api_dropdown_nilai_d6');
Route::get('/api_dropdown_nilai_d6/{d5}/{keterangan}', ApiDropdownNilaiD6Controller::class)->name('api_dropdown_nilai_d6');
Route::get('/api_dropdown_nilai_d8/{d5}/{keterangan}', ApiDropdownNilaiD8Controller::class)->name('api_dropdown_nilai_d8');
Route::get('/api_dropdown_nilai_d10/{d5}/{keterangan}', ApiDropdownNilaiD10Controller::class)->name('api_dropdown_nilai_d10');
Route::get('/api_dropdown_nilai_d12/{d5}/{keterangan}', ApiDropdownNilaiD12Controller::class)->name('api_dropdown_nilai_d12');
Route::get('/api_dropdown_nilai_d14/{d5}/{keterangan}', ApiDropdownNilaiD14Controller::class)->name('api_dropdown_nilai_d14');
Route::get('/api_dropdown_nilai_d16/{d5}/{keterangan}', ApiDropdownNilaiD16Controller::class)->name('api_dropdown_nilai_d16');
Route::get('/api_dropdown_nilai_d18/{d5}/{keterangan}', ApiDropdownNilaiD18Controller::class)->name('api_dropdown_nilai_d18');
Route::get('/api_dropdown_nilai_d20/{d5}/{keterangan}', ApiDropdownNilaiD20Controller::class)->name('api_dropdown_nilai_d20');
Route::get('/api_dropdown_nilai_d22/{d5}/{keterangan}', ApiDropdownNilaiD22Controller::class)->name('api_dropdown_nilai_d22');
Route::get('/api_dropdown_nilai_d24/{d5}/{keterangan}', ApiDropdownNilaiD24Controller::class)->name('api_dropdown_nilai_d24');
Route::post('/api_simpan_spesifikasi/d6', [ApiSimpanSpesifikasiController::class, 'simpanD6'])->name('api_simpan_spesifikasi.d6');
Route::post('/api_simpan_spesifikasi/d8', [ApiSimpanSpesifikasiController::class, 'simpanD8'])->name('api_simpan_spesifikasi.d8');
Route::post('/api_simpan_spesifikasi/d10', [ApiSimpanSpesifikasiController::class, 'simpanD10'])->name('api_simpan_spesifikasi.d10');
Route::post('/api_simpan_spesifikasi/d12', [ApiSimpanSpesifikasiController::class, 'simpanD12'])->name('api_simpan_spesifikasi.d12');
Route::post('/api_simpan_spesifikasi/d14', [ApiSimpanSpesifikasiController::class, 'simpanD14'])->name('api_simpan_spesifikasi.d14');
Route::post('/api_simpan_spesifikasi/d16', [ApiSimpanSpesifikasiController::class, 'simpanD16'])->name('api_simpan_spesifikasi.d16');
Route::post('/api_simpan_spesifikasi/d18', [ApiSimpanSpesifikasiController::class, 'simpanD18'])->name('api_simpan_spesifikasi.d18');
Route::post('/api_simpan_spesifikasi/d20', [ApiSimpanSpesifikasiController::class, 'simpanD20'])->name('api_simpan_spesifikasi.d20');
Route::post('/api_simpan_spesifikasi/d22', [ApiSimpanSpesifikasiController::class, 'simpanD22'])->name('api_simpan_spesifikasi.d22');
Route::post('/api_simpan_spesifikasi/d24', [ApiSimpanSpesifikasiController::class, 'simpanD24'])->name('api_simpan_spesifikasi.d24');
Route::get('/test', TestController::class)->name('test');
Route::get('/tambah_barang', [TambahBarangController::class, 'index'])->name('tambah_barang.index');
Route::post('/tambah_barang', [TambahBarangController::class, 'process'])->name('tambah_barang.process');
Route::get('/detail_barang/{id}', DetailBarangController::class)->name('detail_barang');

// Baru
Route::post('/api_simpan_spesifikasi/d2', [ApiSimpanSpesifikasiController::class, 'simpanD2'])->name('api_simpan_spesifikasi.d2');
Route::post('/api_simpan_spesifikasi/d3', [ApiSimpanSpesifikasiController::class, 'simpanD3'])->name('api_simpan_spesifikasi.d3');
Route::post('/api_simpan_spesifikasi/d4', [ApiSimpanSpesifikasiController::class, 'simpanD4'])->name('api_simpan_spesifikasi.d4');
Route::post('/api_simpan_spesifikasi/d5', [ApiSimpanSpesifikasiController::class, 'simpanD5'])->name('api_simpan_spesifikasi.d5');
Route::get('/kamus_kode', KamusKodeController::class)->name('kamus_kode');
