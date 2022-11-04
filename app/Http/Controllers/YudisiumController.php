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
         
 
    	// mengirim data pegawai ke view index
    	return view('yudisium',['produk' => $produk, 'kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        DB::table('produk_inovasi')->insert([
            'id_Kategori' => $request->judul,
            'judul' => $request->judul,
            'segmen_customer' => $request->segmen_customer
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/produk');
    }
}
