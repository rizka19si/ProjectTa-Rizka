<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoProduk extends Model
{
    use HasFactory;

    protected $table = 'foto_produk';
    protected $primaryKey = 'idFoto';
    protected $fillable = array('idProdukInovasi','nama_foto','created_at','updated_at');
}
