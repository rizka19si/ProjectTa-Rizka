<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tkt extends Model
{
    use HasFactory;

    protected $table = "tkt";
    protected $primaryKey = "idTkt";
    protected $fillable = ["idTkt", "tkt", "idKategoriProduk", "created_at", "updated_at"];
}
