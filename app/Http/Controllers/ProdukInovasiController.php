<?php

namespace App\Http\Controllers;

use App\Models\FotoProduk;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\VideoProduk;
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
        $emailSes = session()->get('email');
        $users = DB::table('users')->where('email','=',$emailSes)->get();
        $produk = DB::table('produk_inovasi')->get();
        $kategori = DB::table('kategori')->get();
        

        // mengirim data pegawai ke view index
        return view('Admin/adminProduk', ['produk' => $produk, 'kategori' => $kategori, 'user' => $users]);
    }
    public function dashboard()
    {
        $emailSes = session()->get('email');
        $users = DB::table('users')->where('email','=',$emailSes)->get();
        $produk = DB::table('produk_inovasi')->get();
        $kategori = DB::table('kategori')->get();

        // mengirim data pegawai ke view index
        return view('Admin/adminDashboard', ['produk' => $produk, 'kategori' => $kategori, 'user' => $users]);
    }
    public function produkDetail($id)
    {
        $emailSes = session()->get('email');
        $users = DB::table('users')->where('email','=',$emailSes)->get();
        $produk = DB::table('produk_inovasi')->where('id_Produk','=',$id)->get();
        $kategori = DB::table('kategori')->get();
        $photo = DB::table('foto_produk')->where('idProdukInovasi','=',$id)->get();
        $video = DB::table('video_produk')->where('idProdukInovasi','=',$id)->get();


        // mengirim data pegawai ke view index
        return view('Admin/adminProdukDetail', ['produk' => $produk, 'kategori' => $kategori, 'user' => $users, 'photo' => $photo, 'video' => $video]);
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
        $randomId = round(time()/20000) . $this->getRandomId(5);
        
        DB::table('produk_inovasi')->insert([
            'id_Produk' => $randomId,
            'id_Kategori' => $request->id_kategori,
            'id_mahasiswa' => $request->id_mahasiswa,
            'judul' => $request->judul,
            'gambaran_pesaing' => $request->pesaing,
            'segmen_customer' => $request->segmen_customer,
            'key_partner' => $request->keypartner,
            'nilai_tkt' => $request->tkt,
            'uniques_selling_point' => $request->sellingpoint,
        ]);

        $request->validate([
            'Video' => 'required',
            'Photos' => 'required',
            'Photos.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png,PNG|max:2000'
        ]);
        if ($request->hasfile('Photos')) {
            $files = [];
            foreach ($request->file('Photos') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move('img/ProdukImage/', $filename);
                    $files[] = [
                        'idProdukInovasi' => $randomId,
                        'nama_foto' => $filename,
                    ];
                } else {
                    return redirect()->back()->withErrors(['msg', 'Your Photo is size is not under 2000kb or wrong extention.']);
                }
            }
            FotoProduk::insert($files);

            $videoFile = [];
            if ($request->hasfile('Video')) {
                $video = $request->file('Video');
                $videoname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $video->getClientOriginalName());
                $video->move('img/ProdukVideo/', $videoname);
                $videoFile[] = [
                    'idProdukInovasi' => $randomId,
                    'keterangan' => $videoname,
                    'url' => $videoname,
                ];
            }
            VideoProduk::insert($videoFile);

            return redirect('/yudisium');
        } else {
            return redirect()->back()->with('failed_upload', 'Your Photo is size is not under 2000kb or wrong extention.');
        }
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
