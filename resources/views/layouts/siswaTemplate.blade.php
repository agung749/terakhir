<?php $pem=0?>
@extends('adminlte::page')
@section('content')
<div class="col-12 wrapper p-5 "  style="background:#ddeedd;overflow:scroll; height:100%">
<div class="row mt-3" >
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
    <button class=" btn col-3 bg-primary  mt-2 mb-4">
            print
    </button>
  </a>
@endif
  </div>
  <div class="col-6">
    <b><h2>Kelola Data {{ $model  }}</h2></b>
  </div>
@if(isset($tahun))
@if($tahun==0)
  <div class="col-1">
    <button class="kelas btn col-12 bg-warning mt-2 mb-4">
    Mulai PPDB
    </button>
  </div>
</div>
<div class="modal fade modalKelas " id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content col-12" > 
      <div class="modal-header">
        <h5 class="modal-title l1" id="staticBackdropLabel" ></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      Apakah Anda Akan Memulai PPDB  {{ date('Y').'/'.date('Y',strtotime(' +1 year'))}}?
      </div>
      <div class="modal-footer">
        <a href="/admin/kelolaPendaftaran/mulai" class="btn-primary btn-md-3">Mulai</a>
      </div>
    </div>
  </div>
</div>
@endif
<div class="modal fade modalRiwayat " id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content col-12" > 
      <div class="modal-header">
        <h5 class="modal-title l1" id="staticBackdropLabel" >Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
        <div class="row">
         <div class="col-md-8"> Nomer Pembayaran</div>
         <div class="col-md-4"> Aksi </div>
        </div>
        <div class="jawaban">

        </div>
      </div>
    </form>  
    </div>
  </div>
</div>
<div class="modal fade modalTerima  " id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content col-12" > 
      <div class="modal-header">
        <h5 class="modal-title l1" id="staticBackdropLabel" >Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      <form id="terima">
        @CSRF
        <?php $i=0?>
      @foreach ($pembayarans as $pembayaran )

      @php($pem+=$pembayaran->nominal)
      @if($i==0)
        <div class="row">
          <div class="col-md-5">
          <div class="col-md-12 mt-3">{{ $pembayaran->nama }}</div>
          <?php
$pembayaran->nama = str_replace(",","_",$pembayaran->nama);
$pembayaran->nama = str_replace(" ","_",$pembayaran->nama);
$pembayaran->nama = str_replace(".","_",$pembayaran->nama);
?>
          <div class="col-md-12"><input type="number" class="form-control uang" id="{{ str_replace(' ','_',$pembayaran->nama) }}"placeholder="{{ $pembayaran->nominal }}" name="{{ $pembayaran->nama }}" min="0"  max="{{ $pembayaran->nominal }}"></div>
         </div>
          @php($i=1)
      @else  
      <div class="col-md-2"></div>
      <div class="col-md-5">
      <div class="col-md-12 mt-3">{{ $pembayaran->nama }}</div>
      <div class="col-md-12"><input type="number" class="form-control uang" id="{{ str_replace(' ','_',$pembayaran->nama) }}"placeholder="{{ $pembayaran->nominal }}" name="{{ $pembayaran->nama }}" min="0"  max="{{ $pembayaran->nominal }}"></div>
      </div>
      </div>
        @php($i=0)
      @endif
      @endforeach
      @if($i==1)

      </div>
      @endif
    <div class="row">
           <div class="col-md-12">
              <b>Penyetor</b> : <input type="text" class="form-control penyetor" name="penyetor">

          </div>
    </div>
      <div class="row">
       
         <div class="col-md-12">
          <b>Total Pemabayaran :<b class="pemsb"> Rp.{{ $pem }}</b>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
               <b> Total Bayar :
          RP.<b class="nominalBayar"> 0</b></b>
        </div>
      </div>
      </div>
      <div class="modal-footer">
     <div class="row">  
            <button  type="submit" class=" btn btn-primary btn-md-3">Simpan</button>
      </div>
      </div>

    </form>  
    </div>
  </div>
</div>
@if($tahun==1)
  <div class="col-md-2">
  </div>
</div>
<div class="modal fade modalKelas " id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content col-12" > 
      <div class="modal-header">
        <h5 class="modal-title l1" id="staticBackdropLabel" ></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      Apakah Anda Yakin PPDB  {{ date('Y').'/'.date('Y',strtotime(' +1 year'))}} Telah Selesai?
      </div>
      <div class="modal-footer">
        <a href="/admin/kelolaPendaftaran/berhenti" class="btn-primary btn-md-3">Berhenti</a>
      </div>
    </div>
  </div>
</div>
@endif
@endif
@if(!isset($table))
<div class="col-md-12">
<table id="tabel-data" class="table table-striped table-bordered"  cellspacing="0" width="100%">
    <thead>
      @foreach($columns as $column )
            <th>{{$column}}</th>
      @endforeach
    </thead>
</table>
</div>
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
      <div class="col-2">RT</div>
      <div class="col-2"><input type="text" name="rt" class="rt form-control"></div>
      <div class="col-1">RW</div>
      <div class="col-2"><input type="text" name="rw" class=" rw form-control"></div>
       <div class="col-2">Kode Pos</div>
      <div class="col-2"><input type="text" name="kode_pos" class="kode_pos form-control"></div>
    </div>
    <div class="row mt-3 mb-3">
      <div class="col-3">Jalan/Kampung</div>
      <div class="col-1">:</div>
      <div class="col-8">
        <input type="text" name="jalan" class="jalan form-control">
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
  <div class="row">
    <div class="col-md-3">
      Jenis Tempat Tinggal
    </div>
    <div class="col-md-9">
      <select name="jenis_tempat_tinggal" id="" class="jenis_tempat_tinggal form-control">
        
        <option value="kosan">kosan</option>
        <option value="kontrakan">kontrakan</option>
         <option value="pesantren">pesantren</option>
              <option value="pesantren">rumah pribadi</option>

      </select>
    </div>
  </div>
<div class="row mt-3">
  <div class="col-3">Jarak Rumah Ke sekolah:</div>
  <div class="col-3"><input type="text" name="jarak" placeholder="Km" id="jarak" class="jarak form-control"></div>
  <div class="col-3">Waktu Rumah Ke sekolah:</div>
  <div class="col-3"><input type="text" name="waktu" placeholder="Km" id="waktu" class="waktu form-control"></div>

</div>

<div class="row mt-3">
<div class="col-3">Jumlah Saudara Kandung:</div>
<div class="col-3"><input type="text" name="saudara" placeholder="orang" id="tinggi" class="saudara form-control"></div>
<div class="col-3">Tinggi Badan:</div>
<div class="col-3"><input type="number" name="tinggi" placeholder="tinggi/cm" id="tinggi" class="tinggi form-control"></div>
</div>
<div class="row mt-3 mb-4">
<div class="col-3">Berat Badan:</div>
<div class="col-3"><input type="number" name="berat" placeholder="berat/kg" id="berat" class="berat form-control"></div>
<div class="col-3"> Program Kompetensi:</div>
<div class="col-3">
<select name="jurusan" id="jurusan" class="jurusan form-control">
@foreach ($jurusan as $jurusans )
<option value="{{ $jurusans['id'] }}">{{ $jurusans['jurusan'] }}</option> 
@endforeach
         
</select>
</div>
</div>
@if($model=="Siswa")
<div class="row">
  <div class="col-3">
    Angkatan :
  </div>
  <div class="col-9">
    <select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
      @foreach ($tahun_ajaran as $tahun_ajarans )
        <option value="{{  $tahun_ajarans->tahun_ajaran }}">{{  $tahun_ajarans->tahun_ajaran }}</option>
      @endforeach
    </select>
  </div>
</div>
@endif
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
    <input type="number" placeholder="piih salah satu  nomer hp saja (ibu/ayah/wali)" name="no_tel" id="no_tel" class=" no_tel form-control" >
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

</div>
</div>
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

      $('body').on('click','.terima',function(){
        total=0;
        id=$(this).data('id');
        $('.uang').val("0");
        $("#terima").attr({'action':'/admin/kelolaPendaftaran/terima/'+id,'method':'POST'});
        $('.modalTerima').modal('show');
      
      });
      $('body').on('click','.riwayat',function(){
        id = $(this).data('id')  
        $.ajax({
                type:'GET',
                url:'/admin/kelolaPendaftaran/riwayat/'+id,
                
                success:function(data){
                  tampil="";
                  console.log(data.length);
                  for(i=0;i<data.length;i++){
                   tampil +="<div class='row mt-4'><div class='col-md-8'>"+data[i]['noPembayaran']+'</div><div class="col-md-4"><a href="/admin/kelolaPendaftaran/cetakKwitansi/'+data[i]['noPembayaran']+'" class="btn col-md-5 btn-success"><i class="fa fa-print"></i></a>'
                   @if(isset($id))
                   @if($id==4)
                   tampil+='<a href="/admin/kelolaPendaftaran/hapusKwitansi/'+data[i]['noPembayaran']+'" class="btn col-md-5 btn-danger"><i class="fa fa-trash"></i></a>'
                   @endif
                   tampil+="</div></div>";
                   @endif
                  }
                   $('.jawaban').html(tampil);
                }
            }); 
            $('.modalRiwayat').modal('show');
      });
       $('body').on('click','.cicil',function(){
        id = $(this).data('id'); 
        $('.uang').val("0");
        $.ajax({
                type:'GET',
                url:'/admin/kelolaPendaftaran/cicilTampil/'+id,
                success:function(datas){
                  i=0;
                 uang=[];
                   $('.uang').each(function(){
                   uang [i]= $(this).attr('name'); 
                  i++;
                    });

                    sum=0;
                  for(let i=0;  i<datas.length; i++){
                   nama=datas[i]['jenis_pembayaran'];
                   nama = nama.replace( /[.,\s]/g,'_');
                   
              
                 
                    if(uang[i]==nama){
                    $('#'+uang[i]).attr('max',datas[i]['total_tunggakan']-datas[i]['total_bayar']);
                    $('#'+uang[i]).attr('placeholder',datas[i]['total_tunggakan']-datas[i]['total_bayar']);
                    
                    }
                    console.log(nama);
                   console.log(uang[i]);
                    sum += datas[i]['total_tunggakan']-datas[i]['total_bayar'];
                  
                  }
                  $("#terima").attr({'action':'/admin/kelolaPendaftaran/cicil/'+id,'method':'POST'});

                  $('.pemsb').text('RP. '+sum);
                  $('.modalTerima').modal("show");
                }
              });
      });
total=0;
 
      $('.uang').change(function(){
          $('.uang').each(function(){
            total += parseInt($(this).val());
            $('.nominalBayar').text(total);
          })
          total = 0;
        });
     
        @yield('var')
        $('.kelas').click(function(){
          $('.modalKelas').modal('show');
        });
        if($('#check').val()==1){
          $('.modaledit').modal('show');
        }
        else if($('#check').val()==2){
          $('.modaledit').modal('show');
        }
        $('.kabupaten').on('change', function(){
        var kabupaten = $(this).val();
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
scrollX: true,
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
$('.modal-footer1').html('  <button type="button" class="btn btn-primary slide2">Sebelumnya</button><button type="submit" class="btn btn-primary slide3 submit">Kirim</button>');
$('.slide2').click(function(){
  slide1();
});
});
}
$('body').on('click','.ubah',function(){
  data=$(this).data('id');
  $('.modal-footer1').html('  <button type="button" class="btn btn-primary slide1">Selanjutnya</button>');
  $('.l1').html('Ubah Data {{$model}}')
  $('#form').attr('action','/{{$role}}/{{$url}}/ubah/'+data);
  $('#form').attr('method','POST');
  $('#form').attr('enctype','multipart/form-data');
detail(data,1);
$('#linkUbah').attr('action','/{{$role}}/{{$url}}/ubah/')
});
$('.printRekap').click(function () {
  $('#form').attr('action','/{{$role}}/{{$url}}/printRekap');
  $('#form').attr('method','POST');
  $('#form').attr('enctype','multipart/form-data');
  $('.modal1').modal('show');
  $('.modal-footer1').html('  <button type="submit" class="btn btn-primary kirim submit">Kirim</button>');
 
})
$(".submit").click(function(){
    $(".modal").modal('hide');
});
$('body').on('click','.hapus',function () {
$('.l2').html('hapus data {{$model}}');
id = $(this).data('id');
  $('.modal-body2').html('<b class="pemberitahuan"> Apakah anda yakin menghapus data  ini?<b>');
                      
$('.modal-footer2').html('<a href="/{{$role}}/{{$url}}/hapus/'+id+'"><button type="submit" class="btn btn-primary kirim submit">Kirim</button></a>');
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
  $('.kecamatan').html(data[0]['kec']);
  console.log(data[0]['kec']);
  $('.kelurahan').html(data[0]['kel']);
  
for(i=0; i<form.length; i++){
  console.log([form[i]]+ data[0][form[i]]);
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
$('.modal-footer1').html('  <button type="button" class="btn btn-primary slide1">Selanjutnya</button>');
slide1();
},
error: function(data){
console.log(data);
}
});
}
});
    
</script>
@endsection
