@extends('adminlte::page')
@section('content')
<div class="row">
  <div class="col mt-3 mr-3">
    <b>Beranda</b>
  </div>
</div>
<div class="row">
  <div class="col-sm-3 mt-2">
    <div class="card">
      <div class="card-body">
        <center>  <i class="fa fa-pen" style="font-size:70px"></i>
          <p>Pendaftar</p></center>
      </div>
    </div>
  </div>

    <div class="col-sm-3 mt-2">
      <div class="card">
        <div class="card-body">
 
          <center>  <i class="fa fa-users" style="font-size:70px"></i>
            <p>Staff</p></center>
        </div>
      </div>
    </div>
    <div class="col-sm-3 mt-2">
      <div class="card">
        <div class="card-body">
        <center>  <i class="fa fa-user" style="font-size:70px"></i>
        <p>Siswa</p></center>
         
        </div>
      </div>
    </div>
  <div class="col-sm-3 mt-2">
    <div class="card">
      <div class="card-body">
        <center>  <i class="fa fa-newspaper" style="font-size:70px"></i>
          <p>Berita</p></center>
      </div>
    </div>
  </div>
</div>
@endsection