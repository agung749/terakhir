<?php
use App\Models\Berita;
$tambah=true;
$model="foto";
$url="kelolaGallery";
$role="admin";
$columns=['no','nama','aksi','deskripsi'];
$inputs=[
    'nama'=>[
        'judul','foto'
      ],
    'type'=>[
      'text','file'
    ],
    'name'=>[
            'nama','foto'
    ],
    'placeholder'=>
    [
        'judul','foto',
    ],
    'value'=>['','',''],
    'required'=>['required','required','']
];
$textArea=[
    'nama'=>[
        'Deskripsi'
      ],
    'type'=>[
      'text'
    ],
    'name'=>[
            'deskripsi'
    ],
    'placeholder'=>
    [
        'deskripsi'
    ],
    'value'=>
    [''],
    'required'=>['required']
  
];
$selects=[
  'kategori'=>[
    'nama'=>'kategori',
    'name'=>'kategory',
    'value'=>[
      'Berita',
      'Prestasi',
      'Eskul',
      'fasilitas'
    ],
    'isi'=>[
      'Berita',
      'Prestasi',
      'Eskul',
      'fasilitas'
],
'required'=>'required'
]
];

?>
@extends('layouts.app')
@section('var')
form=['judul','deskripsi','kategori'];
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
      'data':'deskripsi','name':'deskripsi'
  },
    {
        'data':'aksi','name':'aksi'
    }
]
@endsection