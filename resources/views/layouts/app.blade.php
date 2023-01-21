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
 
     @if(isset($inputs))
     @for($i=0;$i<=count($inputs['nama'])-1;$i++)
           <tr>
               <td>{{$inputs['nama'][$i]}}</td>
               <td>:</td>
               <td><input type="{{$inputs['type'][$i]}}" name="{{$inputs['name'][$i]}}" class="{{$inputs['name'][$i]}} form-control" value="{{$inputs['value'][$i]}}" placeholder="{{$inputs['placeholder'][$i]}}" {{$inputs['required'][$i]}}></td>
           </tr>
    @endfor
    @endif
    @if(isset($textArea))
@for($i=0;$i<=count($textArea['nama'])-1;$i++)
      <tr>
          <td>{{$textArea['nama'][$i]}}</td>
          <td>:</td>
          <td><textarea cols="30" rows="40" type="{{$textArea['type'][$i]}}" id="editor" name="{{$textArea['name'][$i]}}" class="{{$textArea['name'][$i]}}"></textarea></td>
      </tr>
@endfor
@endif
     @if(isset($selects))
     @foreach($selects as $select)
        <tr>
            <td>{{$select['nama']}}</td>
            <td>:</td>
            <td>
                <select name="{{$select['name']}}" class="{{$select['name']}} form-control" id="" {{$select['required']}}>
                    @for($i=0; $i<=count($select['value'])-1;$i++)
                    <option value="{{$select['value'][$i]}}">{{$select['isi'][$i]}}</option>
                  
                    @endfor
                </select>
            </td>
        </tr>
        @endforeach
     @endif

     <div class="modal-footer modal-footer1">
    
    </div>
      </div>
      
    </div>
  </div>
</div>
</form>
@endsection

<div class="modal fade modaledit" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title l2" id="staticBackdropLabel" ></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-body2">
        @if(isset($success))
        <input type="hidden" id="check" value="2">
            <b>Data Berhasil Dikirm</b>
        @endif
        @if($errors->any())
        <input type="hidden" id="check" value="1">
        <table>
        @foreach($errors->all() as $error)
        <tr>
          <td class="text-danger">{{$error}}</td>
        </tr>
        @endforeach

       
      </table>
       
        @else
        <input type="hidden" id="check" value="3">
        <b>Apakah anda yakin data akan dihapus</b>
        <form action="POST" id="linkHapus">
        @endif
      </div>
      <div class="modal-footer modal-footer2">
        
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
      @if(isset($textArea))
      ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then(editor=>{
              window.editor=editor;
              myEditor = editor;
            })
            .catch( error => {
                console.error( error );
            } );
       
        @endif
        @yield('var')
        if($('#check').val()==1){
          $('.modaledit').modal('show');
        }
        else if($('#check').val()==2){
          $('.modaledit').modal('show');
        }

        $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#tabel-data').DataTable( {
processing: true,
serverSide: true,
ajax: "/{{$role}}/{{$url}}/tampil",
columns: data
});
$('.tambah').click(function(){
  for(i=0; i<form.length; i++){
  
  $('.'+form[i]).val('');

  $('.'+form[i]).removeAttr('disabled');
}
$('.l1').html('Tambah Data {{$model}}')
  $('#form').attr('action','/{{$role}}/{{$url}}/tambah');
  $('#form').attr('method','POST');
  $('#form').attr('enctype','multipart/form-data');
$('.modal1').modal('show');

  $('.modal-footer1').html('  <button type="submit" class="btn btn-primary kirim">Kirim</button>');
 

});
$('body').on('click','.ubah',function(){
  alert('halo');
  data=$(this).data('id');
  $('.l1').html('Ubah Data {{$model}}')
  $('#form').attr('action','/{{$role}}/{{$url}}/ubah/'+data);
  $('#form').attr('method','POST');
  $('#form').attr('enctype','multipart/form-data');
  $('.modal-footer1').html('  <button type="submit" class="btn btn-primary kirim">Kirim</button>');
detail(data,1);
$('#linkUbah').attr('action','/{{$role}}/{{$url}}/ubah/')
});
$('.printRekap').click(function () {
  $('#form').attr('action','/{{$role}}/{{$url}}/printRekap');
  $('#form').attr('method','POST');
  $('#form').attr('enctype','multipart/form-data');
  $('.modal1').modal('show');
  $('.modal-footer1').html('  <button type="submit" class="btn btn-primary kirim">Kirim</button>');
 
})
$('body').on('click','.hapus',function () {
$('.l2').html('hapus data {{$model}}');
id = $(this).data('id');
  $('.modal-body2').html('<b class="pemberitahuan"> Apakah anda yakin menghapus data  ini?<b>');
                      
$('.modal-footer2').html('<a href="/{{$role}}/{{$url}}/hapus/'+id+'"><button type="submit" class="btn btn-primary kirim">Kirim</button></a>');
$('.modaledit').modal('show');

})
$('body').on('click','.detail',function(){
  $('.l1').html('Detail Data {{$model}}')
  data=$(this).data('id');
  $('.kirim').remove();
  detail(data,2);
  
})
function detail(data,klik){
  
$.ajax({
url: "/{{$role}}/{{$url}}/detail/"+data,
cache:false,
contentType: false,
processData: false,
success: (data) => {
for(i=0; i<form.length; i++){

    $('.'+form[i]).val(data[0][form[i]]);
    if(form[i]=="isi"){
  myEditor.setData(data[0]['isi']);
    }
    if(klik==1){
    $('.'+form[i]).removeAttr('disabled');
     }
     else{
      $('.'+form[i]).attr('disabled',true);
      $('.kirim').attr('disabled',true);
     }
     $('.modal1').modal('show');
    
   
}

},
error: function(data){
console.log(data);
}
});
}
});
    
</script>
@endsection