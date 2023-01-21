<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class link_toko extends Model
{
    use HasFactory;
    public $table="link_toko";
    protected $fillable=['id','toko_id','link'];
    public function toko()
    {
        return $this->belongsTo('App/Models/toko','toko_id','id');
    }
}   
