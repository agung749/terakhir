<?php
$model="Pembayaran";
$url="kelolaDataPembayaran";
$columns=['no','nama','nominal','semester','aksi'];
$role="bendahara";
$tambah=true;
?>
@extends('layouts.pembayaran')
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