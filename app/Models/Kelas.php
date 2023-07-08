<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table="kelas";
    protected $fillable=["id",'kelas',"jumlah","jurusan","posisi","angkatan",'status'];
    public function jurusans() {
      return $this->belongsTo('\App\Models\jurusan','jurusan','id');
    }
}
