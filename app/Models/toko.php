<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
    use HasFactory;
    public $table="toko";
    protected $fillable=['id', 'nama', 'isi', 'lokasi','foto','owner_id'];
    public function  pemasukan()
    {
        return $this->hasMany('App\Models\pemasukan','toko_id','id');
    }
    public function  owner()
    {
        return $this->hasMany('App\Models\User','id','owner_id');
    }
}
