<?php
$model="Kelola Nilai Test Dan Penjurusan";
$url="kelolaNilaiTest";
$role="admin";
$printNilai="true";
$columns=['no','nama','jurusan','Kelas','nilai wawancara','nilai btq','nilai diagnostik'];

?>
@extends('layouts.app')

@section('var')

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
        'data':'jurusan','name':'jurusan'
    },
    {
        'data':'Kelas','name':'Kelas'
    },
    {
        'data':'nilai_wawancara','name':'nilai_wawancara'
    },
    {
        'data':'nilai_btq','name':'nilai_btq'
    },
    {
        'data':'nilai_diagnostik','name':'nilai_diagnostik'
    },
]

$("body").on('focusOut', '.nilai',function(){
    var data = $(this).data('id');
    var data1 = $(this).attr('name');
    data2 =  $(this).val()
    $.ajax({
        url: "/{{ $role}}/{{ $url}}/tambah/" + data+"/"+data2+"/"+data1,
        cache: false,
        contentType: false,
        processData: false,
    })
});
$("body").on('change', '.jurusan', function(){
    var data = $(this).val();
    var data1 = $(this).html();
    nama =  $("option:selected", this).text()
    var data_id=$(this).attr('data-id')

    $.ajax({
        url: "/{{ $role}}/{{ $url}}/ubahData/" + data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(datas) {
            opt="<option>Pilih Kelas</option>"
            for (var i = 0; i < datas.length; i++) {
                var n = "";
                if (datas.length === 1) {
                    n = " ";
                } else {
                    n = (1 + i);
                }

                opt += "<option value='" + datas[i]['id'] + "'>" + datas[i]['Kelas'] + ' ' + ' ' + nama+ " " + n + "</option>";
            }



            $('#Kelas'+data_id).html(opt);
        }
    });
});
$("body").on('change', '.Kelas', function(){
    alert('haha')
    var data = $(this).attr('data-id')
    var data1 = $("#jurusan"+$(this).data('id')).val();
    var data2 = $(this).val()
    $.ajax({
        url: "/{{ $role}}/{{ $url}}/ubah/"+data+"/"+data1+"/"+data2,
        cache: false,
        contentType: false,
        processData: false,
        success: function(datas) {
        }
    });
});





@endsection
