<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatusController extends Controller
{
    public function status(){
       
        return view('Admin.adminStatus');
    }
}
