<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoProduk extends Model
{
    use HasFactory;

    protected $table = 'video_produk';
    protected $primaryKey = 'idVideo';
    protected $fillable = ['idProdukInovasi','keterangan','url','created_at','updated_at'];
}
