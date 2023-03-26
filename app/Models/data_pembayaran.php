<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_pembayaran extends Model
{
    use HasFactory;
    protected $table="data_pembayaran";
    protected $fillable=["id","nama","nominal","semester"];
}
