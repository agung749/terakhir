
<?php
use App\Models\Berita;
$tambah=true;
$model="Berita";
$url="kelolaBerita";
$role="admin";
$columns=['no','nama','aksi'];
$inputs=[
    'nama'=>[
        'judul','foto','video'
      ],
    'type'=>[
      'text','file','file'
    ],
    'name'=>[
            'judul','foto','video'
    ],
    'placeholder'=>
    [
        'judul','foto','video'
    ],
    'value'=>['','',''],
    'required'=>['required','','']
];
$textArea=[
    'nama'=>[
        'isi'
      ],
    'type'=>[
      'text'
    ],
    'name'=>[
            'isi'
    ],
    'placeholder'=>
    [
        'isi'
    ],
    'value'=>
    [''],
    'required'=>['required']
  
];

$selects=[
  'kategori'=>[
    'nama'=>'kategori',
    'name'=>'kategori',
    'value'=>[
      '1',
      '2',
      '3',
      '4',
      '5',
      '6',
      '7',
      '8',
      '9',
      '10',
      '11'
    ],
    'isi'=>[
      'Akademik',
      'Bisnis',
      'Pengetahuan',
      'English Club',
      'Pramuka',
      'OSIS',
      'OTKP',
      'TKJT',
      'BDP',
      'AKL',
      'GRF'
],
  "required"=>"required"
  ]
]

?>
@extends('layouts.app')
@section('var')
form=['judul','isi','kategori'];
data = [
  {
    'data':'1',
    render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    }
},
    {
        'data':'judul','name':'judul'
    },
    {
        'data':'aksi','name':'aksi'
    }
]
@endsection