<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukInovasiController;
use App\Http\Controllers\YudisiumController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


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


Route::get('/', [UtamaController::class, 'index']);
Route::get('/indexproduk', [UtamaController::class, 'indexProduk']);
Route::get('/indexdetail', [UtamaController::class, 'indexDetail']);

Route::get('/loginUser', function () {
    return view('User/indexLogin');
});

Route::get('/adminlogin', function () {
    return view('Admin/adminLogin');
});

// Admin Login
Route::post('/adminlogin/auth', [LoginController::class, 'authenticate']);
Route::get('/adminlogin/logout', [LoginController::class, 'logout']);

// User Login
Route::get('/userlogin/logout', [LoginController::class, 'logoutUser']);



Route::get('/produk', [ProdukInovasiController::class, 'index']);
Route::post('/produk/store', [ProdukInovasiController::class, 'store']);
Route::get('/produk/{id}', [ProdukInovasiController::class, 'produkDetail']);


Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/store', [KategoriController::class, 'store']);
Route::get('/kategori/hapus/{id}', [KategoriController::class, 'hapus']);

Route::get('/kategori/detail/{id}', [KategoriController::class, 'detail']);
Route::post('/kategori/detailstore', [KategoriController::class, 'storePertanyaan']);
Route::get('/kategori/detailhapus/{id}', [KategoriController::class, 'hapusPertanyaan']);

Route::get('/dashboard', [ProdukInovasiController::class, 'dashboard']);

Route::get('/yudisium', [YudisiumController::class, 'index']);
Route::get('/yudisium/{id}', [YudisiumController::class, 'produkDetail']);

