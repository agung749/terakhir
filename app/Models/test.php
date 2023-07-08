<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class test extends Model
{
    use HasFactory;
    protected $table="test";
    protected $fillable=["nilai_wawancara","nilai_btq","nilai_diagnostik",'nilai_total',"siswa_id","catatan"];
    public function siswa()  {
        return $this->hasOne("\App\Models\Siswa","id","siswa_id");
    }
}
