<?php

namespace App\Imports;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class staffImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
     
     if($row[0]!=null){
        if($row[0]==1){
            $role=5;
        }
        else{
            $role = 2;
        }
        User::create([
            'email'=>$row[1],
            'name'=>$row[2],
            'password'=>Hash::make('12345678'),
            'role'=>$role
        ]);
        return new Staff([
            'id_guru'=>$row[0],
            'nama'=>$row[2],
            'nuptk'=>$row[3],
            'tempat_lahir'=>$row[4],
            'tanggal_lahir'=>$row[5],
            'alamat'=>$row[6],
            'pedidikan_terakhir'=>$row[7],
            'jabatan'=>$row[8],
            'jk'=>$row[9],
            'jenis'=>$row[10],
            'email'=>$row[1],
            'no_hp'=>$row[11],
            'tgl_masuk'=>$row[12]
        ]);

    }
    }
}
