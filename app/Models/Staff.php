<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public $table="staff";
     public $fillable=[
        "nama","nuptk",'tgl_masuk',"tanggal_lahir","alamat","pedidikan_terakhir","jabatan","jk","foto","jenis","tempat_lahir","email","no_hp",'id_guru'
    ];
}
