<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_cicilan extends Model
{
    use HasFactory;
    protected $table="data_cicilan";
    protected $fillable=["id","noPembayaran","id_siswa","id_tunggakan","admin","pembayaran","penyetor"];
 
        public function tunggakan()
        {
            return $this->belongsTo(\App\Models\data_tunggakan::class, 'id_tunggakan', 'id');
        }
    
}
