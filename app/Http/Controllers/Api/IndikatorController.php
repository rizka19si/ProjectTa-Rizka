<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    public function index()
    {
        $indikator = Indikator::latest()->get();
        return response()->json($indikator);
    }
    public function IndikatorShow($idKategoriProduk, $idTkt)
    {
        $indikator = Indikator::latest()->where([['idKategoriProduk',$idKategoriProduk],['idTkt',$idTkt]])->get();
        return $indikator;
    }
    public function tktCount($idKategoriProduk){
        $tkt = Indikator::where('idKategoriProduk',$idKategoriProduk)->groupBy('idTkt')->get();
        return $tkt;
    }

}
