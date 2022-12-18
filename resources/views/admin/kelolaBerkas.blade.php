<?php
$model="Admin";
$url="kelolaBerkas";
$columns=['no','nama','jenis','status','aksi'];
$tambah=true;
$role="admin";
$inputs=[
    'nama'=>['Nama','Berkas'],
    'name'=>['nama','berkas'],
    'type'=>['text','file'],
    'required'=>['required',''],
    'value'=>['',''],
    'placeholder'=>['Nama Berkas','']
];
$selects=[
    'jenis'=>[
        'nama'=>'Jenis Berkas',
        'name'=>'jenis',
        'isi'=>[
            'Berkas Sekolah',
            'Berkas Siswa',
            'Berkas Kegiatan',
            'Berkas Guru',
            'Berkas Keuangan'
        ],
        'value'=>[
            'Berkas Sekolah',
            'Berkas Siswa',
            'Berkas Kegiatan',
            'Berkas Guru',
            'Berkas Keuangan'
],
        'required'=>'required'
],
'status'=>[
    'nama'=>'status',
    'name'=>'status',
    'value'=>[
        'publik',
        'private'
    ],
    'isi'=>[
        'publik',
        'private'
],
'required'=>'required'
]
]?>
@extends('layouts.app')
@section('var')
form=['no','nama','jenis','status','aksi'];
data = [
    {
        'data':'1',
        render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }
    },    {
        'data':'nama','name':'nama'
    },
    {
        'data':'jenis','name':'jenis'
    },
    {
        'data':'status','name':'status'
    },
    {
        'data':'aksi','name':'aksi'
    }
]
@endsection