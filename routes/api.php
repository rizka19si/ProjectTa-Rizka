<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\IndikatorController;
use App\Http\Controllers\Api\YudisiumController;

use App\Models\Indikator;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/kategori', [KategoriController::class,'index']);


Route::get('/produk', [ProdukController::class,'index']);

Route::get('/yudisium', [YudisiumController::class,'index']);
Route::post('/yudisium', [YudisiumController::class,'store']);


Route::get('/indikator',[IndikatorController::class,'index']);
Route::get('/indikator/{idKategoriProduk}/{idTkt}',[IndikatorController::class,'IndikatorShow']);
Route::get('/tktcount/{id}',[IndikatorController::class,'tktCount']);



