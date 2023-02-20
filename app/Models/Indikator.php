<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;

    protected $table = "indikator";
    protected $primaryKey = "idIndikator";
    protected $fillable = ["idIndikator", "pertanyaan", "idKategoriProduk", "created_at", "updated_at"];
}
