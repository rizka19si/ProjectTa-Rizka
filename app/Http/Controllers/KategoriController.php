<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {

        return view('Admin/adminKategori', [
            'kategori' => DB::table('kategori')->paginate(10), 'user' => DB::table('users')->get()
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
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('indikator')->where('idIndikator', $id)->delete();
        $idKategori = DB::table('indikator')->where('idIndikator', $id)->get();
        $idFinal = '';
        foreach($idKategori as $idKate){
            $idFinal = $idKate->idKategoriProduk;
            return $idFinal;
        }
        // alihkan halaman ke halaman pegawai

        return back()->withInput();
    }

    public function detail($id)
    {
        // DB::select('select indikator.idIndikator, indikator.pertanyaan, kategori.idKategoriProduk from indikator, ketegori where indikator.')
        $indikator = DB::table('indikator')
            ->select('*')
            // ->join('indikator','indikator.idPert','=','kategori.idKategoriProduk')
            ->where('idKategoriProduk', '=', $id)
            ->get();
        $kategori = DB::table('kategori')
            ->select('*')
            // ->join('indikator','indikator.idPert','=','kategori.idKategoriProduk')
            ->where('idKategoriProduk', '=', $id)
            ->get();

            $user = DB::table('users')->get();

        return view('Admin/adminKategoriDetail', ['kategori' => $kategori, 'indikator' => $indikator, 'user' => $user]);
    }
    public function storePertanyaan(Request $request)
    {
        DB::table('indikator')->insert([
            'pertanyaan' => $request->pertanyaan,
            'idKategoriProduk' => $request->idKategoriProduk
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/kategori/detail/'.$request->idKategoriProduk);
    }
}
