<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemasukan extends Model
{
    use HasFactory;
    public $table="pemasukan";
    protected $fillable=['id','pemasukan','bulan','tahun','foto','toko_id'];
    public function toko()
    {
        return $this->belongsTo('\App\Models\toko','toko_id','id');
    }
}
