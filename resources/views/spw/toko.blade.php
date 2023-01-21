<?php $tambah=true;
$model="Toko";
$url="toko";
$role="wirausaha";

$columns=['no','nama','aksi'];
$inputs=[
    'nama'=>[
         'nama',  'lokasi','foto'
      ],
    'type'=>[
      'text','text','file'
    ],
    'name'=>[
             'nama',  'lokasi','foto'
    ],
    'placeholder'=>
    [
         'nama',  'lokasi','foto',
    ],
    'value'=>['','',''],
    'required'=>['required','required','required']
];
$textArea=[
    'nama'=>[
        'deskripsi'
      ],
    'type'=>[
      'text'
    ],
    'name'=>[
            'isi'
    ],
    'placeholder'=>
    [
        'deskripsi'
    ],
    'value'=>
    [''],
    'required'=>['required']
  
];




?>
@extends('layouts.app')
@section('var')
form=['nama', 'isi', 'lokasi','foto','shopee','tiktok','tokped'];
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
        'data':'aksi','name':'aksi'
    }
]
@endsection