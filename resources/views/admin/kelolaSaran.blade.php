<?php
$model="Saran";
$url="kelolaSaran";
$role="admin";
$print="true";
$columns=['no','nama','email','kategori','saran','aksi'];
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
        'data':'nama','name':'nama'
    },
    {
        'data':'email','name':'email'
    },
    {
        'data':'kategori','name':'kategori'
    },
    {
        'data':'saran','name':'saran'
    },
    {
        'data':'aksi','name':'aksi'
    }
]
@endsection