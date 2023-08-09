<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\Paginator;
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

              $produk = DB::table('produk_inovasi')->paginate(3);
              $fotoproduk = DB::table('foto_produk')->get();
              $kategori = DB::table('kategori')->get();
              $users = DB::table('users')->get();
              return view('User/indexProduk', ['produk' => $produk, 'kategori' => $kategori, 'fotoproduk' => $fotoproduk, 'users' => $users]);
       }
       public function indexProfil($idMahasiswa)
       {
              $produk = DB::table('produk_inovasi')->where('id_mahasiswa', $idMahasiswa)->get();
              $fotoproduk = DB::table('foto_produk')->get();
              $kategori = DB::table('kategori')->get();
              $users = DB::table('users')->where('id', $idMahasiswa)->get();
              return view('User/indexProfile', ['produk' => $produk, 'kategori' => $kategori, 'fotoproduk' => $fotoproduk, 'users' => $users]);
       }

       public function cari(Request $request)
       {
              if ($request->filled('cari') && $request->filled('jenis') && $request->filled('kategori')) {
                     $produk = DB::table('produk_inovasi')->whereRaw("judul LIKE '" . $request->cari . "%'")->paginate(3);

              } elseif ($request->filled('cari')) {
                     $produk = DB::table('produk_inovasi')->whereRaw("judul LIKE '" . $request->cari . "%'")->paginate(3);
              } elseif ($request->filled('jenis')) {
                     $produk = DB::table('produk_inovasi')->where("jenis", $request->jenis)->paginate(3);
              } elseif ($request->filled('kategori')) {
                     $produk = DB::table('produk_inovasi')->where("id_Kategori", $request->kategori)->paginate(3);
              }

              // $produk = DB::table('produk_inovasi')->whereRaw("judul LIKE '" . $request->cari . "%'")->paginate(3);
              // $produk->appends(['cari' => $request->cari,]);
              $fotoproduk = DB::table('foto_produk')->get();
              $kategori = DB::table('kategori')->get();
              $users = DB::table('users')->get();
              return view('User/indexProduk', ['produk' => $produk, 'kategori' => $kategori, 'fotoproduk' => $fotoproduk, 'users' => $users]);
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
