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

       public function produkDetail($id)
       {
              $r = session()->get('email');
              $users = DB::table('users')->where('email', $r)->get();
              $produk = DB::table('produk_inovasi')->where('id_Produk', '=', $id)->get();
              $kategori = DB::table('kategori')->get();
              $photo = DB::table('foto_produk')->where('idProdukInovasi', '=', $id)->get();
              $video = DB::table('video_produk')->where('idProdukInovasi', '=', $id)->get();


              // mengirim data pegawai ke view index
              return view('User/indexDetail', ['produk' => $produk, 'kategori' => $kategori, 'user' => $users, 'photo' => $photo, 'video' => $video]);
       }
}
