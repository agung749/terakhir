
<?php
use App\Models\Berita;
$tambah=true;
$model="Kelas";
$url="kelolaKelas";
$role="admin";
$columns=['no','nama','ajaran','aksi'];

foreach ($jurusan as $jurus) {
    $text[]='number';
    $req[]='';
    $val[]=0;

}
$inputs=[
    'nama'=>$namaLengkap,
    'type'=>$text,
    'name'=>$jurusan,
    'placeholder'=>$namaLengkap,
    'value'=>$val,
    'required'=>$req
];
$selects=[
  'kategori'=>[
    'nama'=>'tahun ajaran',
    'name'=>'tahun_ajaran',
    'value'=>$tahun,
    'isi'=>$tahun,
'required'=>'required'
]
];
?>
@extends('layouts.app')
@section('var')
form=[ @php(json_encode($jurusan)) ];
data = [
  {
    'data':'1',
    render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    }
},
    {
        'data':'kelas','name':'kelas'
    },
    {
        'data':'angkatan','name':'angkatan'
    },
    {
        'data':'aksi','name':'aksi'
    }
]
@endsection
