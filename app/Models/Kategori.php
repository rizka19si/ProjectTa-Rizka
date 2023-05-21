<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'idKategoriProduk';
    protected $fillable = ['idKategoriProduk','nama_kategori','created_at','updated_at'];
}
