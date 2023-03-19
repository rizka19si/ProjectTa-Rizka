<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table="produk_inovasi";
    protected $primaryKey = "id_Produk";
    protected $fillable = ['id_Produk','id_Kategori','id_mahasiswa','judul','gambaran_pesaing','segmen_customer','key_partner','nilai_tkt','uniques_selling_point'];

}
