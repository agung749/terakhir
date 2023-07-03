@extends('adminlte::page')
@section('content')
<div class="col-12 wrapper p-5 " style="background:#ddeedd; height:100%; overflow:scroll">
<div class="row">
<div class="col-5">
@if(isset($tambah))
    <button class="tambah btn col-3 bg-success mt-2 mb-4">
            tambah
    </button>
@endif
@if(isset($gaji))
    <a href="/{{$role}}/kelolaGaji/tambah"><button class="btn col-4 bg-primary mt-2 mb-4">
            Rekap Gaji
    </button></a>
    <button class="printRekap btn col-4 bg-warning mt-2 mb-4">
      Print Rekap
    </button>
@endif

@if(isset($print))
   <a href="/{{$role}}/{{$url}}/print"  ><button class="btn col-3 bg-primary  mt-2 mb-4">
            print
    </button></a>
@endif
@if(isset($import))
  <button class="btn col-3 bg-secondary import  mt-2 mb-4">
            Import
    </button>
@endif
  </div>
  <div class="col-7">
    <b><h2>Kelola Data {{ $model  }}</h2></b>
  </div>
</div>
<style>

</style>

<table id="tabel-data" class="table table-striped table-bordered" width="100%"  cellspacing="0">
    <thead>
      @foreach($columns as $column )
            <th>{{$column}}</th>
      @endforeach
    </thead>
</table>

@if(isset($absen))
<br>
<div>
 <h4 style="color:green; display:inline-block"> {{ $tepat }} Tepat Waktu</h4>
 <h4 style="color:orange; display:inline-block;"> {{ $terlambat }} Terlambat</h4>
<h4 style="color:red; display:inline-block;"> {{ $gagal }} Tidak Hadir</h4>
</div>
@endif
</div>

<div class="modal fade modal1 " id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl ">
    <div class="modal-content col-12" > 
      <div class="modal-header">
        <h5 class="modal-title l1" id="staticBackdropLabel" ></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="form"  enctype="multipart/form-data">
          @csrf
 <div class="row">
    <div class="col-md-6">    
     <div class="row">
        <div class="col-md-8"><input type="text" placeholder="masukan nama siswa/NIS" class="form-control nama" value="nama"></div>
        <div class="col-md-4"><input type="submit" class="btn btn-warning btn-md-3" value="CEK"></div>
    </div>
    <div class="row">
        <div class="col-md-4" >Jenis Kelamin</div>
        <div class="col-md-4" >:</div>
        <div class="col-md-4" ><select name="jk" id="jk" readonly>
        <option value="1">Laki-Laki</option>
        <option value="2">Perempuan</option></select></div>
    </div>
    <div class="row">
        <div class="col-md-4" >Kelas</div>
        <div class="col-md-4" >:</div>
        <div class="col-md-4" ><input type="text" name="kelas" placeholder="kelas"  readonly></div>
    </div>
    <div class="col-md-6" >
        <div class="row">
            <div class="col-md-4" >Rincian Pembayaran</div>
            <div class="col-md-4" >
            <select name="tahun" id="tahun">
                <option value="1">Kelas X</option> 
                <option value="2">Kelas XI</option>
                <option value="3">Kelas XII</option>   
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" ><input type="checkbox" name="jan" id="jan">Jan</div>
            <div class="col-md-4" ><input type="checkbox" name="feb" id="feb">Feb</div>
            <div class="col-md-4" ><input type="checkbox" name="mar" id="mar">Mar</div>
        </div>
        <div class="row">
            <div class="col-md-4" ><input type="checkbox" name="apr" id="apr">Apr</div>
            <div class="col-md-4" ><input type="checkbox" name="mei" id="mei">Mei</div>
            <div class="col-md-4" ><input type="checkbox" name="jun" id="jun">Jun</div>
        </div>
        <div class="row">
            <div class="col-md-4" ><input type="checkbox" name="jul" id="jul">Jul</div>
            <div class="col-md-4" ><input type="checkbox" name="agus" id="agus">Agus</div>
            <div class="col-md-4" ><input type="checkbox" name="sept" id="sept">Sept</div>
        </div>
        <div class="row">
            <div class="col-md-4" ><input type="checkbox" name="okt" id="okt">Okt</div>
            <div class="col-md-4" ><input type="checkbox" name="nov" id="nov">Nov</div>
            <div class="col-md-4" ><input type="checkbox" name="des" id="des">Des</div>
        </div>
    </div>
    </div>
     <div class="modal-footer modal-footer1">
    
    </div>
      </div>
      
    </div>
  </div>
</div>
</form>
@endsection
<div class="modal fade modalImport" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title l2" id="staticBackdropLabel" ></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="/{{$role}}/{{ $url }}/import" enctype="multipart/form-data">
        @csrf
      <div class="modal-body modal-body2">
        <div class="row">
          <div class="col-md-4" >Data Import</div>
          <div class="col-md-4" >:</div>
          <div class="col-md-4" ><input type="file" name="fileImport" class="form-control"></div>
        </div>
     
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-lg">Kirim</button>
    </div>
  </form>
    </div>
  </div>
</div>
@section('js')
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function(){
$('.tambah').click(function(){
$('.modal1').modal('show');
 })
$('#tabel-data').DataTable( {
processing: true,
serverSide: true,
ajax: "/{{$role}}/{{$url}}/tampil",
columns: data
});
$('body').on('click','.detail',function(){
  $('.l1').html('Detail Data {{$model}}')
  data=$(this).data('id');
  $('.kirim').remove();
  detail(data,2); 
})
    });
    
</script>
@endsection