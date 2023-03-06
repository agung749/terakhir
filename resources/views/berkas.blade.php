<?php
$columns=['Nama Berkas','Aksi'];
?>
@extends('layouts.user')
@section('isi')
	
<section class="blog" id="judul" style="background: green; padding-bottom:2%; ">
	<div class="container">
   
		<div class="row">
            <marquee behavior=""  direction=""><h3 style="color: white">Selamat Datang Di SMK Plus Ashabulyamin</h3></marquee>
            <div>
			<h1 style="color:white; display:inline-block">Daftar Berkas </h1><h2 style="float:right" id="timestamp"></h2>
            </div>
		</div>
	</div>
</section>
<section class="content">
<div class="container">
<div class="box col-md-12 col-xs-12 col-sm-12"   >

        <table id="tabel-data" style="min-height:300px" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
                <th></th>
              @foreach($columns as $column )
                    <th>{{$column}}</th>
              @endforeach
            </thead>
    </table>
</div>
</div>
</section>
@endsection
@section('script')
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#tabel-data').DataTable( {
processing: true,
serverSide: true,
ajax: "/berkas/tampil",
columns:[ {
    'data':'1',
    render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    }
},
    {
        'data':'nama','name':'nama'
    },
    {
        'data':'aksi','name':'aksi'
    }],
    
});
});
</script>
@endsection