<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukInovasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $produk = DB::table('produk_inovasi')->get();
        $kategori = DB::table('kategori')->get();
         
 
    	// mengirim data pegawai ke view index
    	return view('produk',['produk' => $produk, 'kategori' => $kategori, 'user' => $users]);
    }
    public function dashboard()
    {
        $r= session()->get('email');
        $users = DB::table('users')->where('email',$r)->get();
        $produk = DB::table('produk_inovasi')->get();
        $kategori = DB::table('kategori')->get();
        
    	// mengirim data pegawai ke view index
    	return view('dashboard',['produk' => $produk, 'kategori' => $kategori,'user' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
