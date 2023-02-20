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
    public function IndikatorShow($id)
    {
        $indikator = Indikator::latest()->where('idKategoriProduk','=',$id)->get();
        return $indikator;
    }

}
