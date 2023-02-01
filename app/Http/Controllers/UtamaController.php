<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UtamaController extends Controller
{
       public function index()
       {
        $produk = DB::table('produk')->get();

        return view('index',['produk' => $produk]);
       }
}
