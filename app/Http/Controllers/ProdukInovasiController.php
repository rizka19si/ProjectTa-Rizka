<?php

namespace App\Http\Controllers;

use App\Models\FotoProduk;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\VideoProduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
        $userRole = DB::table('users')->where('email','=',$emailSes)->value('role');

        // mengirim data pegawai ke view index
        if($userRole != "3"){
            return view('Admin/adminProduk', ['produk' => $produk, 'kategori' => $kategori, 'user' => $users]);
        }else{
            return redirect('/');
        }
    }

    public function filter(Request $req)
    
    {
        $emailSes = session()->get('email');
        $users = DB::table('users')->where('email','=',$emailSes)->get();
        $produk = DB::table('produk_inovasi')->where('id_Kategori',$req->id_Kategori)->where('segmen_customer',$req->segmen_customer)->get();
        $kategori = DB::table('kategori')->get();
        
        $userRole = DB::table('users')->where('email','=',$emailSes)->value('role');

        // mengirim data pegawai ke view index
        if($userRole != "3"){
            return view('Admin/adminProduk', ['produk' => $produk, 'kategori' => $kategori, 'user' => $users]);
        }else{
            return redirect('/');
        }
    }
    public function dashboard()
    {
        if(session()->get('role') != "3"){
        $startDate = Carbon::now();
        $endDate = Carbon::now()->subDays(5);
        $emailSes = session()->get('email');
        $users = DB::table('users')->where('email','=',$emailSes)->get();
        $produk = DB::table('produk_inovasi')->get();
        $perJenis = DB::table('produk_inovasi')->select('jenis',DB::raw('COUNT(*) as jumlah'))->groupBy('jenis')->get();
        $perKategori = DB::table('produk_inovasi')->select('id_Kategori',DB::raw('COUNT(*) as jumlah'))->groupBy('id_Kategori')->get();

        $produkBaru = Produk::whereBetween("created_at",[$endDate,$startDate])->get();
        $kategori = DB::table('kategori')->get();
    


        $userRole = DB::table('users')->where('email','=',$emailSes)->value('role');

     
            return view('Admin/adminDashboard', ['perKategori'=>$perKategori,'perJenis'=>$perJenis,'produkBaru' => $produkBaru,'produk' => $produk, 'kategori' => $kategori, 'user' => $users]);
        }else{
            return redirect('/');
        }

        
    }
    public function produkDetail($id)
    {
        $emailSes = session()->get('email');
        $users = DB::table('users')->where('email','=',$emailSes)->get();
        $produk = DB::table('produk_inovasi')->where('id_Produk',$id)->get();
        $kategori = DB::table('kategori')->get();
        $photo = DB::table('foto_produk')->where('idProdukInovasi','=',$id)->get();
        $video = DB::table('video_produk')->where('idProdukInovasi','=',$id)->get();



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
                    Produk::create([
                        'id_Produk' => $randomId,
                        'id_Kategori' => $request->id_Kategori,
                        'id_mahasiswa' => $request->id_mahasiswa,
                        'judul' => $request->judul,
                        'gambaran_pesaing' => $request->gambaran_pesaing,
                        'segmen_customer' => $request->segmen_customer,
                        'key_partner' => $request->key_partner,
                        'nilai_tkt' => $request->nilai_tkt,
                        'jenis' => $request->jenis,
                        'uniques_selling_point' => $request->uniques_selling_point,
                    ]);
                } else {
                    return redirect()->back()->withErrors(['msg', 'Your Photo is size is not under 2000kb or wrong extention.']);
                }
            }
            FotoProduk::create($files);

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
            VideoProduk::create($videoFile);

<<<<<<< HEAD
            return redirect()->back();
=======
            return redirect()->back();
>>>>>>> 2f4f0f74fc3259f6b0bfb4b33fceea683d633349
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
    public function update(Request $request)
    {
        DB::table('produk_inovasi')->where("id_Produk",$request->id_produk)->update([
            'judul' => $request->judul,
            'gambaran_pesaing' => $request->gambaran_pesaing,
            'segmen_customer' => $request->segmen_customer,
            'key_partner' => $request->key_partner,    
            'jenis' => $request->jenis,
            'uniques_selling_point' => $request->uniques_selling_point,
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
                    FotoProduk::where("idProdukInovasi",$request->id_produk)->delete();
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move('img/ProdukImage/', $filename);
                    $files[] = [
                        'idProdukInovasi' => $request->id_produk,
                        'nama_foto' => $filename,
                    ];
                } else {
                    return redirect()->back()->withErrors(['msg', 'Your Photo is size is not under 2000kb or wrong extention.']);
                }
            }
            FotoProduk::insert($files);

            $videoFile = [];
            if ($request->hasfile('Video')) {
                VideoProduk::where("idProdukInovasi",$request->id_produk)->delete();
                $video = $request->file('Video');
                $videoname = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $video->getClientOriginalName());
                $video->move('img/ProdukVideo/', $videoname);
                $videoFile[] = [
                    'idProdukInovasi' => $request->id_produk,
                    'keterangan' => $videoname,
                    'url' => $videoname,
                ];
            }
            VideoProduk::insert($videoFile);

            return redirect()->back();
        } else {
            return redirect()->back()->with('failed_upload', 'Your Photo is size is not under 2000kb or wrong extention.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::where("id_Produk",$id)->delete();
        FotoProduk::where("idProdukInovasi",$id)->delete();
        VideoProduk::where("idProdukInovasi",$id)->delete();
        return redirect()->back();

    }
}
