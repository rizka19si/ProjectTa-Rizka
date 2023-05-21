<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Kategori;
use App\Models\Tkt;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $emailSes = session()->get('email');
        return view('Admin/adminKategori', [
            'kategori' => DB::table('kategori')->paginate(10), 'user' => DB::table('users')->where('email', '=', $emailSes)->get()
        ]);
    }

    public function store(Request $request)
    {
        DB::table('kategori')->insert([
            'idKategoriProduk' => $request->idKategoriProduk,
            'nama_kategori' => $request->nama_kategori
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/kategori');
    }
    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('kategori')->where('idKategoriProduk', $id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/Kategori');
    }

    public function hapusPertanyaan($id)
    {
      
        Indikator::where('idIndikator', $id)->delete();
        $idKategori = Indikator::where('idIndikator', $id)->get();
        $idFinal = '';
        foreach ($idKategori as $idKate) {
            $idFinal = $idKate->idKategoriProduk;
            return $idFinal;
        }
    

        return back()->withInput();
    }



    public function detail($id)
    {
   
        $Tkt = Tkt::where('idKategoriProduk', '=', $id)->get();
        $kategori = Kategori::where('idKategoriProduk', '=', $id)->get();
        $emailSes = session()->get('email');
        $user = DB::table('users')->where('email', '=', $emailSes)->get();

        return view('Admin/adminKategoriDetail', ['kategori' => $kategori, 'tkt' => $Tkt, 'user' => $user]);
    }


    public function pertanyaan($idKategoriProduk, $idTkt)
    {

        $indikator = Indikator::where([['idKategoriProduk', $idKategoriProduk], ['idTkt', $idTkt]])->get();
        $tkt = Tkt::where([['idKategoriProduk', $idKategoriProduk], ['idTkt', $idTkt]])->get();
        $kategori = Kategori::where('idKategoriProduk', $idKategoriProduk)->get();
        $emailSes = session()->get('email');
        $user = DB::table('users')->where('email', '=', $emailSes)->get();

        return view('Admin/adminKategoriPertanyaan', ['tkt' => $tkt, 'indikator' => $indikator,'kategori'=>$kategori, 'user' => $user]);
    }
    public function storePertanyaan(Request $request)
    {
        Indikator::insert([
            'pertanyaan' => $request->pertanyaan,
            'idKategoriProduk' => $request->idKategoriProduk,
            'idTkt' => $request->idTkt
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/kategori/pertanyaan/' . $request->idKategoriProduk.'/'.$request->idTkt);
    }

    public function storeTKT(Request $request)
    {
        $Tkt = Tkt::where('idKategoriProduk', '=', $request->idKategoriProduk)->latest('created_at')->first();
        $checkTkt = Tkt::where('idKategoriProduk', '=', $request->idKategoriProduk)->first();
        $i = 0;
        try {
            if ($checkTkt != null) {
                Tkt::insert([
                    'tkt' => $Tkt->tkt + 1,
                    'idKategoriProduk' => $request->idKategoriProduk,
                    'created_at' => Carbon::now(),
                ]);
            } else {
                Tkt::insert([
                    'tkt' => 1,
                    'idKategoriProduk' => $request->idKategoriProduk,
                    'created_at' => Carbon::now(),
                ]);
            }
            return redirect()->back();
        } catch (Exception $e) {
            return  $e->getMessage();
        }
    }
    public function hapusTkt($id)
    {
        Tkt::where('idTkt', $id)->delete();
        return back()->withInput();
    }
    
}
