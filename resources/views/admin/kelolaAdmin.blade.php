<?php
$model="Admin";
$url="kelolaAdmin";
$columns=['no','nama','aksi'];
$tambah=true;
$role="admin";
$inputs=[
    'nama'=>[
        'email','nama'
      ],
    'type'=>[
      'email','nama'
    ],
    'name'=>[
            'email','nama'
    ],
    'placeholder'=>
    [
        'email','nama'
    ],
    'value'=>['',''],
    'required'=>['required','required']
];
$selects=[
  'role'=>[
    'name'=>"role",
    'nama'=>"jenis",
    "isi"=>[
      'admin',
      'eskul',
],
'value'=>[
  '1',
  '2',
],
'required'=>'required'
  ]
]
?>
@extends('layouts.app')
@section('var')
form=['nama','password'];
data = [
    {
    'data':'id','name':'id'    
    },
    {
        'data':'name','name':'name'
    },
    {
        'data':'aksi','name':'aksi'
    }
]
@endsection