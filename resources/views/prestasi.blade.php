@extends('layouts.user')
@section('isi')
<style>

</style>
<section class="j" style="background: green ; padding-top:4%">
<div class="container">
    <div class="row">
        <marquee behavior=""  direction=""><h3 style="color: white">Selamat Datang Di SMK Plus Ashabulyamin</h3></marquee>
        <div>
        <h1 style="color:white; display:inline-block">Daftar Prestasi </h1><h2 style="float:right" id="timestamp"></h2>
        </div>
    </div>
</div>
</div>
</section>
<section class="content" style="background: white; padding-top:4%">
<div class="container"></div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10 box">
<table class="table-data">
    <thead>
    
              <th>No</th>
              <th>Nama Prestasi</th>
              <th>Tanggal Kegiatan</th>
              <th>Foto Prestasi</th>
      </thead>
</table>
</div>
<div class="col-md-1"></div>
</div>
</div>
</section>

@endsection
@section('js')
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable( {
processing: true,
serverSide: true,
ajax: "/admin/kelolaPrestasi/tampil",
columns: data
});
    })
</script>
@endsection