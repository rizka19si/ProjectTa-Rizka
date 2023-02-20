<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\Produk;

class YudisiumController extends Controller
{
    public function index()
    {

        $produk = DB::table('produk_inovasi')->get();
        $kategori = DB::table('kategori')->get();
        $indikator = DB::table('indikator')->get();
         
 
    	// mengirim data pegawai ke view index
    	return view('Yudisium/yudisium',['produk' => $produk, 'kategori' => $kategori, 'indikator' => $indikator]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function produkDetail($id)
    {
        $r = session()->get('email');
        $users = DB::table('users')->where('email', $r)->get();
        $produk = DB::table('produk_inovasi')->where('id_Produk','=',$id)->get();
        $kategori = DB::table('kategori')->get();
        $photo = DB::table('foto_produk')->where('idProdukInovasi','=',$id)->get();
        $video = DB::table('video_produk')->where('idProdukInovasi','=',$id)->get();


        // mengirim data pegawai ke view index
        return view('Yudisium/yudisiumProdukDetail', ['produk' => $produk, 'kategori' => $kategori, 'user' => $users, 'photo' => $photo, 'video' => $video]);
    }
    
}
