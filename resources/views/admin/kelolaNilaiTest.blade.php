<?php
$model="Kelola Nilai Test Dan Penjurusan";
$url="kelolaNilaiTest";
$role="admin";
$print="true";
$columns=['no','nama','jurusan','kelas','nilai'];

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
        'data':'kelas','name':'kelas'
    },
    {
        'data':'nilai','name':'nilai'
    },
]

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

                opt += "<option value='" + datas[i]['id'] + "'>" + datas[i]['kelas'] + ' ' + ' ' + nama+ " " + n + "</option>";
            }



            $('#kelas'+data_id).html(opt);
        }
    });
});
$("body").on('change', '.kelas', function(){
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
