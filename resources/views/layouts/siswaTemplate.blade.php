@extends('adminlte::page')
@section('content')
<div class="col-12 wrapper p-5 " style="background:#ddeedd">
<div class="row mt-3">
<div class="col-5">

@if(isset($tambah))
    <button class="tambah btn col-3 bg-success mt-2 mb-4">
            tambah
    </button>
@endif
@if(isset($gaji))
    <a href="/{{$role}}/kelolaGaji/tambah"><button class="btn col-4 bg-success mt-2 mb-4">
            Rekap Gaji
    </button></a>
    <button class="printRekap btn col-4 bg-warning mt-2 mb-4">
      Print Rekap
    </button>
@endif

@if(isset($print))
   <a href="/{{$role}}/{{$url}}/print">
    <button class="tambah btn col-3 bg-primary  mt-2 mb-4">
            print
    </button>
  </a>
@endif
  </div>
  <div class="col-7">
    <b><h2>Kelola Data {{ $model  }}</h2></b>
  </div>
</div>
@if(!isset($table))
<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
      @foreach($columns as $column )
            <th>{{$column}}</th>
      @endforeach
    </thead>
</table>
@endif
@if(isset($absen))
<br>
<div>
 <h4 style="color:green; display:inline-block"> {{ $tepat }} Tepat Waktu</h4>
 <h4 style="color:orange; display:inline-block;"> {{ $terlambat }} Terlambat</h4>
<h4 style="color:red; display:inline; display:inline-block;"> {{ $gagal }} Tidak Hadir</h4>
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
      <div class="modal-body ">
        <form id="form"  enctype="multipart/form-data">
          @csrf
 @if(isset($data))
 <div class="row mt-3 muncul1">
  <div class="col-12">  <h3>{{ $data[0]['label'] }}</h3>(<h5 style="color:red; display:inline">Wajib Diisi</h5>)</div>
  </div>
 <div class="row mt-3 muncul1">

 @for($k=1;$k<count($data);$k++)
<div class="col-6">

@if(isset($data[$k]['inputs']))
     @for($i=0;$i<=count($data[$k]['inputs']['nama'])-1;$i++)
           <div class="row mt-3">
               <div class="col-3">{{$data[$k]['inputs']['nama'][$i]}}</div>
               <div class="col-1">:</div>
               <div class="col-8"><input type="{{$data[$k]['inputs']['type'][$i]}}" name="{{$data[$k]['inputs']['name'][$i]}}" class="{{$data[$k]['inputs']['name'][$i]}} form-control" value="{{$data[$k]['inputs']['value'][$i]}}" placeholder="{{$data[$k]['inputs']['placeholder'][$i]}}" {{$data[$k]['inputs']['required'][$i]}}></div>
           </div>
    @endfor
@endif
    @if(isset($data[$k]['textArea']))
@for($i=0;$i<=count($data[$k]['textArea'])-1;$i++)
      <div class="row mt-3">
          <div class="col-3">{{$data[$k]['textArea'][$i]['nama']}}</div>
          <div class="col-1">:</div>
          <div class="col-8"><textarea cols="30" rows="40" type="{{$data[$k]['textArea'][$i]['type']}}" id="editor" name="{{$data[$k]['textArea'][$i]['name']}}" class="{{$data[$k]['textArea'][$i]['name']}} form-control" value="{{$data[$k]['textArea'][$i]['value']}}" placeholder="{{$data[$k]['textArea'][$i]['placeholder']}}" ></textarea></div>
      </div>
@endfor
@endif

     @if(isset($data[$k]['selects']))
     @foreach($data[$k]['selects'] as $select)
        <div class="row mt-3">
            <div class="col-3">{{$select['nama']}}</div>
            <div class="col-1">:</div>
            <div class="col-8">
                <select name="{{$select['name']}}" class="{{$select['name']}} form-control" id="" {{$select['required']}}>
                    @for($i=0; $i<=count($select['value'])-1;$i++)
                    <option value="{{$select['value'][$i]}}">{{$select['isi'][$i]}}</option>
                  
                    @endfor
                </select>
            </div>
        </div>
        @endforeach
     @endif
     @if($k==2)
     <div class="row mt-3">
      <div class="col-3">RT</div>
      <div class="col-1">:</div>
      <div class="col-2"><input type="text" name="rt" class="form-control"></div>
      <div class="col-3">RW</div>
      <div class="col-1">:</div>
      <div class="col-2"><input type="text" name="rw" class="form-control"></div>
    </div>
    <div class="row mt-3 mb-3">
      <div class="col-3">Jalan/Kampung</div>
      <div class="col-1">:</div>
      <div class="col-8">
        <input type="text" name="jalan" class="form-control">
      </div>
    </div>
    
    @endif
    
    </div>
@endfor
<div class="col-12">
  <div class="row">
    <div class="col-12">
      <h3>Data Periodik</h3>(<h5 style="color:red; display:inline">Wajib Diisi</h5>)
    </div>
  </div>
<div class="row mt-3">
  <div class="col-3">Jarak Rumah Ke sekolah:</div>
  <div class="col-3"><input type="text" name="jarak" placeholder="Km" id="jarak" class="form-control"></div>
  <div class="col-3">Waktu Rumah Ke sekolah:</div>
  <div class="col-3"><input type="text" name="waktu" placeholder="Km" id="jarak" class="form-control"></div>

</div>

<div class="row mt-3">
<div class="col-3">Jumlah Saudara Kandung:</div>
<div class="col-3"><input type="text" name="saudara" placeholder="orang" id="tinggi" class="form-control"></div>
<div class="col-3">Tinggi Badan:</div>
<div class="col-3"><input type="number" name="tinggi" placeholder="tinggi/cm" id="tinggi" class="form-control"></div>
</div>
<div class="row mt-3 mb-4">
<div class="col-3">Berat Badan:</div>
<div class="col-3"><input type="number" name="berat" placeholder="berat/kg" id="berat" class="form-control"></div>
<div class="col-3">Jurusan:</div>
<div class="col-3"><select name="jurusan" id="jurusan" class="form-control">
<option value="1">OTKP</option>  
<option value="2">AKL</option>
<option value="3">BDP</option>
<option value="4">GRAFIKA</option> 
<option value="5">TKJT</option>       
</select> </div>
</div>
</div>
</div>
@endif
@if(isset($data2))
<div class="row mt-3 muncul2">
  <h3><center>{{ $data2[0]['label'] }}</center></h3>
 </div>
 <div class="row muncul2">
  <div class="col-2 ">
    Nomor Hp/Tel Rumah/Ayah/Ibu/Wali
  </div>
  <div class="col-6">
    <input type="number" placeholder="piih salah satu  nomer hp saja (ibu/ayah/wali)" name="no_tel" id="no_tel" class="form-control" >
  </div>
</div>
 <div class="row mt-3 muncul2">
 
 @for($k=1;$k<count($data2);$k++)
<div class="col-4">
  @if($k==1||$k==2)
  <h5 style="color:red">*Wajib Diisi</h5>
  @else
  <h5 >Tidak Wajib Diisi</h5> @endif
@if(isset($data2[$k]['inputs']))
     @for($i=0;$i<=count($data2[$k]['inputs']['nama'])-1;$i++)
    
  
           <div class="row mt-3">
               <div class="col-5">{{$data2[$k]['inputs']['nama'][$i]}}</div>
               <div class="col-1">:</div>
               <div class="col-6"><input type="{{$data2[$k]['inputs']['type'][$i]}}" name="{{$data2[$k]['inputs']['name'][$i]}}" class="{{$data2[$k]['inputs']['name'][$i]}} form-control" value="{{$data2[$k]['inputs']['value'][$i]}}" placeholder="{{$data2[$k]['inputs']['placeholder'][$i]}}" {{$data2[$k]['inputs']['required'][$i]}} {{ $data2[$k]['inputs']['disabled'][$i]}}></div>
           </div>
    @endfor
@endif
    @if(isset($data2[$k]['textArea']))
@for($i=0;$i<=count($data2[$k]['textArea'])-1;$i++)
      <div class="row mt-3">
          <div class="col-5">{{$data2[$k]['textArea'][$i]['nama']}}</div>
          <div class="col-1">:</div>
          <div class="col-6"><textarea cols="30" rows="40" type="{{$data2[$k]['textArea'][$i]['type']}}" id="editor" name="{{$data2[$k]['textArea'][$i]['name']}}" class="{{$data2[$k]['textArea'][$i]['name']}} form-control" value="{{$data2[$k]['textArea'][$i]['value']}}" placeholder="{{$data2[$k]['textArea'][$i]['placeholder']}}" ></textarea></div>
      </div>
@endfor
@endif

     @if(isset($data2[$k]['selects']))
     @foreach($data2[$k]['selects'] as $select)
        <div class="row mt-3 m">
            <div class="col-5">{{$select['nama']}}</div>
            <div class="col-1">:</div>
            <div class="col-6">
                <select name="{{$select['name']}}" class="{{$select['name']}} form-control" id="" {{$select['required']}}>
                    @for($i=0; $i<=count($select['value'])-1;$i++)
                    <option value="{{$select['value'][$i]}}">{{$select['isi'][$i]}}</option>
                  
                    @endfor
                </select>
            </div>
        </div>
        @endforeach
     @endif
    </div>
   
@endfor
</div>

@endif
     <div class="modal-footer modal-footer1 mt-4">
    
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
  ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    $(document).ready(function(){
      
        @yield('var')
        if($('#check').val()==1){
          $('.modaledit').modal('show');
        }
        else if($('#check').val()==2){
          $('.modaledit').modal('show');
        }
        $('.kabupaten').on('change', function(){
        var kabupaten = $(this).val();
        alert(kabupaten);
        if(kabupaten){
            $.ajax({
                type:'POST',
                url:'/admin/berubah',
                data:'kabupaten='+kabupaten,
                success:function(html){
                 
                    $('.kecamatan').html(html);
                    $('.kelurahan').html("<option value=''>Pilih kelurahan</option>");
                }
            }); 
        }else{
            $('.kecamatan').html('<option value="">Pilih Kecamatan</option>'); 
        }
    });
    $('.keadaan_ayah').on('change', function(){
        var berkebutuhan = $(this).val();
        if( berkebutuhan=='Berkebutuhan'){
          $('.kebutuhan_khusus_ayah').removeAttr('readonly');
        }
        else{
          $('.kebutuhan_khusus_ayah').val="";
          $('.kebutuhan_khusus_ayah').attr('readonly',true);
        }
      });
      $('.keadaan_ibu').on('change', function(){
  var berkebutuhan = $(this).val();
  if( berkebutuhan=='Berkebutuhan'){
    $('.kebutuhan_khusus_ibu').removeAttr('readonly');
  }
  else{
    $('.kebutuhan_khusus_ibu').val="";
    $('.kebutuhan_khusus_ibu').attr('readonly',true);
  }
});
$('.keadaan_wali').on('change', function(){
  var berkebutuhan = $(this).val();
  if( berkebutuhan=='Berkebutuhan'){
    $('.kebutuhan_khusus_wali').removeAttr('readonly');
  }
  else{
    $('.kebutuhan_khusus_wali').val="";
    $('.kebutuhan_khusus_wali').attr('readonly',true);
  }
});
        $('.kecamatan').on('change', function(){
        var kelurahan = $(this).val();
        
        if(kelurahan){
            $.ajax({
                type:'POST',
                url:'/admin/berubah',
                data:'kecamatan='+kelurahan,
                success:function(html){
      
                    $('.kelurahan').html(html);
                }
            }); 
        }else{
            $('.pilih kelurahan').html('<option value="">Pilih Kelurahan</option>'); 
        }
    });
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
slide1();

});
function slide1(){
$('.modal1').modal('show');
$('.muncul2').hide();
$('.muncul1').show();
  $('.modal-footer1').html('  <button type="button" class="btn btn-primary slide1">Selanjutnya</button>');
 $('.slide1').click(function(){
$('.muncul1').hide();
$('.muncul2').show();
$('.modal-footer1').html('  <button type="button" class="btn btn-primary slide2">Sebelumnya</button><button type="submit" class="btn btn-primary slide3">Kirim</button>');
$('.slide2').click(function(){
  slide1();
});
});
}
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