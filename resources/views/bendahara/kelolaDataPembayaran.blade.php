<?php
$model="Pembayaran";
$url="kelolaDataPembayaran";
$columns=['no','nama','nominal','semester','aksi'];
$tambah=true;
$role="bendahara";
$inputs=[
    'nama'=>['Nama','Nominal'],
    'name'=>['nama','nominal'],
    'type'=>['text','number'],
    'required'=>['required','required'],
    'value'=>['',''],
    'placeholder'=>['Nama','']
];
$selects=[
    'semester'=>[
        'nama'=>'Semester/Pokok',
        'name'=>'semester',
        'isi'=>[
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            'Bulanan',
            'Tahunan',
            'Setiap Semester',
        ],
        'value'=>[
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9'
],
        'required'=>'required'
],

]?>
@extends('layouts.app')
@section('var')
form=['nama','nominal','semester'];
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
        'data':'nominal','name':'nominal'
    },
    {
        'data':'semester','name':'semester'
    },
  
    {
        'data':'aksi','name':'aksi'
    }
]
@endsection