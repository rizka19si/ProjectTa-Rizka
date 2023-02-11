<?php

namespace App\Http\Controllers;

use App\Models\FotoProduk;
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
        return view('produk', ['produk' => $produk, 'kategori' => $kategori, 'user' => $users]);
    }
    public function dashboard()
    {
        $r = session()->get('email');
        $users = DB::table('users')->where('email', $r)->get();
        $produk = DB::table('produk_inovasi')->get();
        $kategori = DB::table('kategori')->get();

        // mengirim data pegawai ke view index
        return view('dashboard', ['produk' => $produk, 'kategori' => $kategori, 'user' => $users]);
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
        $randomId = time() . $this->getRandomId(5);

        // DB::table('produk_inovasi')->insert([
        //     'id_Produk' => $randomId,
        //     'id_Kategori' => $request->id_kategori,
        //     'judul' => $request->judul,
        //     'gambaran_pesaing' => $request->pesaing,
        //     'segmen_customer' => $request->segmen_customer,
        //     'key_partner' => $request->keypartner,
        //     'uniques_selling_point' => $request->sellingpoint,
        // ]);

        // $request->validate([
        //     'mulfoto' => 'required',
        //     'mulfoto.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png,PNG|max:2000'
        // ]);
        if ($request->hasfile('mulfoto')) {
            $files = [];
            foreach ($request->file('mulfoto') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move('img/ProdukImage/', $filename);
                    $files[] = [
                        'idProdukInovasi' => $randomId,
                        'nama_foto' => $filename,
                    ];
                }
            }

            

            FotoProduk::insert($files);
            echo 'Success';
        } else {
            echo 'Gagal';
        }

        return redirect('/yudisium');
    }

    function getRandomId($n)
    {
        $characters = '012345678';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
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
