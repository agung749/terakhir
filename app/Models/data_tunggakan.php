<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_tunggakan extends Model
{
    use HasFactory;
    protected $table="data_tunggakan";
    protected $fillable=["id_siswa","semester",'status',"total_bayar","total_tunggakan","tahun_ajaran","jenis_pembayaran"];
    public function siswa()
    {
        return $this->belongsTo(\App\Models\Siswa::class, 'id_siswa', 'id');
    }
    public function  cicilan()
    {
        return $this->hasMany(\App\Models\data_cicilan::class, 'id', 'id_tunggakan');
    }
}
