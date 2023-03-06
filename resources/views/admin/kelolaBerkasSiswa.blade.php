<?php
$model="Berkas Siswa";
$url="kelolaBerkasSiswa";
$role="admin";
$print="true";
$columns=['no','nama','kelas','jurusan','aksi','ket'];
$inputs=[
    'nama'=>[
        'foto diri','foto ijazah','foto skhu'
],
'name'=>[
   'foto_diri','foto_ijazah','foto_skhu'
],
'type'=>[
    'file','file','file'
],
'value'=>['','',''],
'required'=>[
    '','',''
],
'placeholder'=>['','','']
];
?>
@extends('layouts.app')

@section('var')
form=['foto','foto_skhu','foto_ijazah'];
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
        'data':'kelas','name':'kelas'
    },
    {
        'data':'jurusan','name':'jurusan'
    },
    {
        'data':'aksi','name':'aksi'
    },
    {
        'data':'ket','name':'ket'
    }
]
@endsection