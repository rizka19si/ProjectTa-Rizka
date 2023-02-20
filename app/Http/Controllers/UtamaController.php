<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UtamaController extends Controller
{
       public function index()
       {
              $produk = DB::table('produk_inovasi')->get();
              $kategori = DB::table('kategori')->get();

              return view('index', ['produk' => $produk, 'kategori' => $kategori]);
       }

       public function indexProduk()
       {
              $produk = DB::table('produk_inovasi')->get();
              $kategori = DB::table('kategori')->get();

              return view('User/indexProduk', ['produk' => $produk, 'kategori' => $kategori]);
       }
       public function indexDetail()
       {
              $produk = DB::table('produk_inovasi')->get();
              $kategori = DB::table('kategori')->get();

              return view('User/indexDetail', ['produk' => $produk, 'kategori' => $kategori]);
       }
}
