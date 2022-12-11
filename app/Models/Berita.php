<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Berita extends Model
{
    use HasFactory;
    public $table="Berita";
    protected $fillable=['judul','isi','foto','video','user_id','suka','kategori','tidak_suka'];
    public function komentar()
    {
        return $this->hasMany('App\Models\komentar','berita_id','id');
    } 
    public function user()
    {
        return $this->hasOne('App\Models\user','id','user_id');
    } 
}
