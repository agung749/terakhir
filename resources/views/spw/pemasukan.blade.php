<?php $model="Pemasukan";
$url="pemasukan";
$role="wirausaha";

$columns=['no','nama toko','bulan','tahun','pemasukan','aksi'];
if($isi!=null){
$tambah=true;
$print=true;
$inputs=[
    'nama'=>[
         'pemasukan','foto'
      ],
    'type'=>[
      'number','file'
    ],
    'name'=>[
        'pemasukan','foto'
    ],
    'placeholder'=>
    [
        'pemasukan',''
    ],
    'value'=>['',''],
    'required'=>['required','required']
];
$selects=[
  'kategori'=>[
    'nama'=>'bulan',
    'name'=>'bulan',
    'value'=>[
      'Januari',
      'Febuari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    ],
    'isi'=>[
        'Januari',
        'Febuari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
],
  "required"=>"required"
],
'toko'=>[
  'nama'=>'toko',
  'name'=>'toko',
  'value'=>$isi['id'],
  'isi'=>$isi['nama'],
 'required'=>'required'
],
'tahun'=>[
  'nama'=>'tahun',
  'name'=>'tahun',
  'value'=>[
    '2022',
    '2023',
    '2024',
    '2025',
],
'isi'=>[
    '2022',
    '2023',
    '2024',
    '2025',
],
'required'=>'required'
]
];}
?>
@extends('layouts.app')
@section('var')
form=['pemasukan','bulan','tahun'];
data = [
  {
    'data':'1',
    render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    }
},
{
  'data':'nama','name':'nama'
},
    {
        'data':'bulan','name':'bulan'
    },
     {
        'data':'tahun','name':'tahun'
    },
     {
        'data':'pemasukan','name':'pemasukan'
    },
    {
        'data':'aksi','name':'aksi'
    }
]
@endsection