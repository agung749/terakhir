@extends('layouts.user')
@section('isi')


<?php
use App\Models\Berita;
$data=[
['label'=>'Data Diri Siswa'],
[
    
    
    'inputs'=>[
    'name'=>[
        "nama","tempat_lahir","tgl_lahir","sd","smp","no_hp","email"
             ],
    'type'=>[
        'text','text','date','text','text','number','email'
        ],
    'nama'=>[
        'Nama','Tempat Lahir','Tanggal Lahir','Nama SD','Nama SMP','Nomor Telephone','Email Pribadi'
     ],
    'placeholder'=>
    [
        'nama','tempat lahir','tanggal lahir','nama sd','nama smp','nomor telephone','email pribadi'
    ],
    'value'=>[
        '','','','','','','','',''
    ],  
     'required'=>['required','','','','','','','','']
    ]
,

'selects'=>[
   'jk'=>[
    'nama'=>'jenis kelamin',
    'name'=>'jk',
    'value'=>[1,2],
    'isi'=>['Laki-Laki','Perempuan'],
    'required'=>'required'
],
'agama'=>[
    'nama'=>'Agama',
    'name'=>'agama',
    'value'=>['islam','Hindu','Buddha','Kristen','Katolik','Khonghucu','Kepercayaan Lokal'],
    'isi'=>['islam','Hindu','Buddha','Kristen','Katolik','Khonghucu','Kepercayaan Lokal'],
    'required'=>'required'
],

  'transportasi'=>[
    'nama'=>'Transportasi',
    'name'=>'transportasi',
    'value'=>[
      'Angkutan Umum',
      'Mobil Pribadi',
      'Motor Pribadi',
      'Jalan Kaki'
    ],
'isi'=>[
  'Angkutan Umum',
      'Mobi Pribadi',
      'Motor Pribadi',
      'Jalan Kaki'
],
'required'=>'true'
],
'kabupaten'=>[
    'nama'=>'kabupaten',
    'name'=>'kabupaten',
    'value'=>$kabid,
    'isi'=>$kabname,
    'required'=>'required'
],
'kecamatan'=>[
    'nama'=>'kecamatan',
    'name'=>'kecamatan',
    'isi'=>['Pilih Kecamatan'],
    'value'=>[''],
    'required'=>'required'
],
'kelurahan'=>[
    'nama'=>'kelurahan',
    'name'=>'kelurahan',
    'isi'=>['Pilih kelurahan'],
    'value'=>[''],
    'required'=>'required'
]
]  ,
  

],

[
    
    'inputs'=>[
    'name'=>["un_smp","nisn","nik","foto","Ijazah","skhu","foto_ijazah","foto_skhu","kps","kph","kip"
             ],
    'type'=>[
        "number","number","number","file","text","text","file","file","number","number","text"
        ],
    'nama'=>[
        "No UN SMP","No NISN Sepanjang 10 Digits","NIK Sepanjang 16 digits","Foto Diri (tidak wajib diisi) ","Nomor Ijazah (tidak wajib diisi)","No SKHU (tidak wajib diisi)","Foto Ijazah (tidak wajib diisi)","Foto SKHU (tidak wajib diisi)","No KPS (tidak wajib diisi)","No KPH (tidak wajib diisi)","No KIP (tidak wajib diisi)" ],
    'placeholder'=>
    [
        "nomor smp","nisn","nik","foto","nomor ijazah","skhu","foto ijazah","foto skhu","kps","kph","kip"],
    'value'=>[
        "","","","","","","","","","",""],
     'required'=>["","required","required","","","","","","","",""]
],
   
],

];
$data2=[
  [ 'label'=>'Dokumen Orang Tua/Wali Siswa'], 
  [ 'inputs'=>[
  'name'=>["nama_ayah",'pekerjaan_ayah','tanggal_lahir_ayah','kebutuhan_khusus_ayah'],
  'disabled'=>['','','','readonly'],
'type'=>[
  "text",'text','date','text'
  ],
'nama'=>[
"Nama Ayah",'Pekerjaan Ayah','Tanggal Lahir Ayah','Kebutuhan Khusus Ayah'
],
'placeholder'=>
[
  "Nama Ayah",'' ,'', ' '],
'value'=>["",'','',''],

'required'=>[ "required",'required',"required",'required'],

],
  'selects'=>[
'penghasilan_ayah'=>[
    'nama'=>'Penghasilan ayah',
    'name'=>'penghasilan_ayah',
    'value'=>[
      'Tidak Bepenghasilan',
      'di bawah 1 juta',
      '1 sd 2 juta',
      '2 sampai 3 juta',
      '4 sampai 5 juta',
      'di atas 5 juta',
    
    ],
  'isi'=>[
    'Tidak Bepenghasilan',
      'di bawah 1 juta',
      '1 sd 2 juta',
      '2 sampai 3 juta',
      '4 sampai 5 juta',
      'di atas 5 juta',
],
'required'=>"required"
],

'pendidikan ayah'=>[
  'nama'=>'Pendidikan ayah',
  'name'=>'pendidikan_ayah',
  'value'=>[
     'SD',
     'SMP',
     'SMA',
     'D1',
     'D2',
     'D3',
     'S1',
     'S2',
     'S3'
  ],
  'isi'=>[
    'SD',
     'SMP',
     'SMA',
     'D1',
     'D2',
     'D3',
     'S1',
     'S2',
     'S3'
],
'required'=>''
],
'keadaan ayah'=>[
  'nama'=>'Keadaan ayah',
  'name'=>'keadaan_ayah',
  'value'=>[
    'Meninggal',
    'Tidak Berkebutuhan',
    'Berkebutuhan',
  ],
  'isi'=>[
      'Meninggal',
    'Tidak Berkebutuhan',
    'Berkebutuhan',
],
'required'=>"required"
]
]
],
[ 
    'inputs'=>[
  'name'=>["nama_ibu","pekerjaan_ibu",'tanggal_lahir_ibu','kebutuhan_khusus_ibu'],
  'disabled'=>['','','','readonly'],
'type'=>[
  "text",'text','date','text'
  ],
'nama'=>[
"Nama Ibu",'Pekerjaan Ibu','Tanggal Lahir Ibu','Kebutuhan Khusus Ibu'
],
'placeholder'=>
[
  "Nama ibu",'' ,'', ' '],
'value'=>["",'',"",''],

'required'=>[ "required","","",''],

],
  'selects'=>[
'penghasilan_ibu'=>[
    'nama'=>'Penghasilan ibu',
    'name'=>'penghasilan_ibu',
    'value'=>[
      'Tidak Bepenghasilan',
      'di bawah 1 juta',
      '1 sd 2 juta',
      '2 sampai 3 juta',
      '4 sampai 5 juta',
      'di atas 5 juta',
    
    ],
  'isi'=>[
    'Tidak Bepenghasilan',
      'di bawah 1 juta',
      '1 sd 2 juta',
      '2 sampai 3 juta',
      '4 sampai 5 juta',
      'di atas 5 juta',
],
'required'=>"required"
],

'pendidikan ibu'=>[
  'nama'=>'Pendidikan ibu',
  'name'=>'pendidikan_ibu',
  'value'=>[
     'SD',
     'SMP',
     'SMA',
     'D1',
     'D2',
     'D3',
     'S1',
     'S2',
     'S3'
  ],
  'isi'=>[
    'SD',
     'SMP',
     'SMA',
     'D1',
     'D2',
     'D3',
     'S1',
     'S2',
     'S3'
],
'required'=>''
],
'keadaan ibu'=>[
  'nama'=>'Keadaan ibu',
  'name'=>'keadaan_ibu',
  'value'=>[
    'Meninggal',
    'Tidak Berkebutuhan',
    'Berkebutuhan',
  ],
  'isi'=>[
    'Meninggal',
    'Tidak Berkebutuhan',
    'Berkebutuhan',
],
'required'=>"required"
]
]
], 
['inputs'=>[
  'name'=>["nama_wali",'pekerjaan_wali','tanggal_lahir_wali','kebutuhan_khusus_wali'],
  'disabled'=>['','','','readonly'],
'type'=>[
  "text",'text','date','text'
  ],
'nama'=>[
"Nama Wali",'Pekerjaan Wali','Tanggal Lahir Wali','Kebutuhan Khusus Wali'
],
'placeholder'=>
[
  "Nama Wali",'' ,'', ' '],
'value'=>["",'','',''],

'required'=>[ "",'',"",''],

],
  'selects'=>[
'penghasilan_wali'=>[
    'nama'=>'Penghasilan Wali',
    'name'=>'penghasilan_ayah',
    'value'=>[
      'Tidak Bepenghasilan',
      'di bawah 1 juta',
      '1 sd 2 juta',
      '2 sampai 3 juta',
      '4 sampai 5 juta',
      'di atas 5 juta',
    
    ],
  'isi'=>[
    'Tidak Bepenghasilan',
      'di bawah 1 juta',
      '1 sd 2 juta',
      '2 sampai 3 juta',
      '4 sampai 5 juta',
      'di atas 5 juta',
],
'required'=>''
],

'pendidikan wali'=>[
  'nama'=>'Pendidikan Wali',
  'name'=>'pendidikan_wali',
  'value'=>[
      '',
     'SD',
     'SMP',
     'SMA',
     'D1',
     'D2',
     'D3',
     'S1',
     'S2',
     'S3'
  ],
  'isi'=>[
    '',
    'SD',
     'SMP',
     'SMA',
     'D1',
     'D2',
     'D3',
     'S1',
     'S2',
     'S3'
],
'required'=>''
],
'keadaan wali'=>[
  'nama'=>'Keadaan Wali',
  'name'=>'keadaan_wali',
  'value'=>[
       '',
    'Tidak Berkebutuhan',
    'Berkebutuhan',
  ],
  'isi'=>[
      '',
    'Tidak Berkebutuhan',
    'Berkebutuhan',
],
'required'=>''
]
]
]
]


?>

<style>
    body{
        color:white;
    }
    h3{
        color:white; 
    }
    .box{
      border-radius: 50px;
background: #0a6b12;
box-shadow:  20px 20px 60px #095b0f,
             -20px -20px 60px #0c7b15;
    }
</style>

<section class="home wrapper p-3" style="background: green" id="daftar" data-stellar-background-ratio="0.4">

  <div class="container box p-5" style="min-height:100%; min-width:100%">
  @if(isset($tahun_ajaran))
@if($tahun_ajaran==1)
   <a href="http://www.wa.me/+6289520019514"><button class="btn btn-warning btn-md-3 btn-sm-3" style="margin-top:2%">
      <i class="fa  fa-telephone"></i>Kontak Kami
    </button></a>
    <button class="btn btn-warning btn-md-3 btn-sm-3" style="margin-top:2%">
      <i class="fa  fa-telephone"></i>Video Tutorial
    </button>
    <form id="form" enctype="multipart/form-data">
        @csrf
@if(isset($data))
<div class="row mt-3 muncul1">
<div class="col-md-12"> <center> <h3>{{ $data[0]['label'] }}</h3></center>(<h5 style="color:red; display:inline">Wajib Diisi</h5>)</div>
</div>
<div class="row mt-3 muncul1">

@for($k=1;$k<count($data);$k++)
<div class="col-md-6">

@if(isset($data[$k]['inputs']))
   @for($i=0;$i<=count($data[$k]['inputs']['nama'])-1;$i++)
         <div class="row " style="margin-top:4%">
             <div class="col-md-3">{{$data[$k]['inputs']['nama'][$i]}}</div>
           
             <div class="col-md-8"><input type="{{$data[$k]['inputs']['type'][$i]}}" name="{{$data[$k]['inputs']['name'][$i]}}" class="{{$data[$k]['inputs']['name'][$i]}} form-control" value="{{$data[$k]['inputs']['value'][$i]}}" placeholder="{{$data[$k]['inputs']['placeholder'][$i]}}" {{$data[$k]['inputs']['required'][$i]}}></div>
         </div>
  @endfor
@endif
  @if(isset($data[$k]['textArea']))
@for($i=0;$i<=count($data[$k]['textArea'])-1;$i++)
    <div class="row mt-3" style="margin-top:4%">
        <div class="col-md-3">{{$data[$k]['textArea'][$i]['nama']}}</div>
      
        <div class="col-md-8"><textarea cols="30" rows="40" type="{{$data[$k]['textArea'][$i]['type']}}" id="editor" name="{{$data[$k]['textArea'][$i]['name']}}" class="{{$data[$k]['textArea'][$i]['name']}} form-control" value="{{$data[$k]['textArea'][$i]['value']}}" placeholder="{{$data[$k]['textArea'][$i]['placeholder']}}" ></textarea></div>
    </div>
@endfor
@endif

   @if(isset($data[$k]['selects']))
   @foreach($data[$k]['selects'] as $select)
      <div class="row mt-3">
          <div class="col-md-3">{{$select['nama']}}</div>
        
          <div class="col-md-8">
              <select style="margin-top:4%" name="{{$select['name']}}" class="{{$select['name']}} form-control" id="" {{$select['required']}}>
                  @for($i=0; $i<=count($select['value'])-1;$i++)
                  <option value="{{$select['value'][$i]}}">{{$select['isi'][$i]}}</option>
                
                  @endfor
              </select>
          </div>
      </div>
      @endforeach
   @endif
   @if($k==2)
   <div class="row " style="margin-top:4%">
    <div class="col-md-1">RT</div>
  
    <div class="col-md-2"><input type="text" name="rt" class="rw form-control"></div>
    <div class="col-md-1">RW</div>
    <div class="col-md-2"><input type="text" name="rw" class="rt form-control"></div>
       <div class="col-md-2">Kode Pos</div>
       <div class="col-md-3"><input type="text" name="kode_pos" class=" kode_pos form-control"></div>

  </div>
  <div class="row mt-3 mb-3" style="margin-top:4%">
    <div class="col-md-3">Jalan/Kampung</div>
  
    <div class="col-md-8">
      <input type="text" name="jalan" class="jalan form-control" >
    </div>
  </div>
  
  
  @endif
  
  </div>
@endfor

<div class="col-md-12 muncul1">
<div class="row" style="margin-top:4%">
  <div class="col-md-12">
    <h3>Data Periodik</h3>(<h5 style="color:red; display:inline">Wajib Diisi</h5>)
  </div>
</div>
<div class="row mb-3">
    <div class="col-md-3">
      Jenis Tempat Tinggal
    </div>
    <div class="col-md-9">
      <select name="Jenis_tempat_tinggal" id="Jenis_tempat_tinggal" class=" Jenis_tempat_tinggal form-control">

        <option value="kosan">kosan</option>
        <option value="kontrakan">kontrakan</option>
         <option value="pesantren">pesantren</option>
              <option value="pesantren">rumah pribadi</option>
      </select>
  </div>
</div>
<div class="row" style="margin-top:2%">
<div class="col-md-3">Jarak Rumah Ke sekolah:</div>
<div class="col-md-3"><input type="text" name="jarak" placeholder="Km" id="jarak" class="jarak form-control"></div>
<div class="col-md-3">Waktu Rumah Ke sekolah:</div>
<div class="col-md-3"><input type="text" name="waktu" placeholder="Menit" id="jarak" class="waktu form-control"></div>

</div>

@if($errors->any())

<div class="modal modalE" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pesan Kesalahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($errors->all() as $error)
        <h5 style="color:red">{{ $error }}</h5>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
      </div>
    </div>
  </div>
</div>
@else
<div class="modal modalE" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mekanisme Pendaftaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color:black">
      Calon Siswa mengisi data dengan benar <br>
        Melakukan konfirmasi pendaftaran di sekolah dengan membawa dokumen ktp orangtua/wali dan kk serta memperlihatkan bukti pendaftaran
       
      </div>
      <div class="modal-footer">
       
          <button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
        </div>
    </div>
  </div>
</div>
@endif

<div class="row mt-3" style="margin-top:4%">
<div class="col-md-3">Jumlah Saudara Kandung:</div>
<div class="col-md-3"><input type="text" name="saudara" placeholder="orang" id="tinggi" class="saudara form-control"></div>
<div class="col-md-3">Tinggi Badan:</div>
<div class="col-md-3"><input type="number" name="tinggi" placeholder="tinggi/cm" id="tinggi" class=" tinggi form-control"></div>
</div>
<div class="row mt-3 mb-4" style="margin-top:4%">
<div class="col-md-3">Berat Badan:</div>
<div class="col-md-3"><input type="number" name="berat" placeholder="berat/kg" id="berat" class=" berat form-control"></div>
<div class="col-md-3">Jurusan:</div>
<div class="col-md-3"><select name="jurusan" id="jurusan" class="jurusan form-control">
<option value="1">OTKP</option>  
<option value="2">AKL</option>
<option value="3">BDP</option>
<option value="4">DKV</option> 
<option value="5">TKJT</option>       
</select> </div>
</div>
</div>
</div>
@endif
@if(isset($data2))
<div class="row mt-3 muncul2"style="margin-top:4%">
<h3><center>{{ $data2[0]['label'] }}</center></h3>
</div>
<div class="row muncul2" style="margin-top:4%">
<div class="col-md-2 ">
  Nomor Hp/Tel Rumah/Ayah/Ibu/Wali
</div>
<div class="col-md-9">
  <input type="number" placeholder="piih salah satu  nomer hp saja (ibu/ayah/wali)" name="no_tel" id="no_tel" class="no_tel form-control" >
</div>
</div>
<div class="row mt-3 muncul2" style="margin-top:4%">

@for($k=1;$k<count($data2);$k++)
<div class="col-md-4">
@if($k==1||$k==2)
<h5 style="color:red">*Wajib Diisi</h5>
@else
<h5 >Tidak Wajib Diisi</h5> @endif
@if(isset($data2[$k]['inputs']))
   @for($i=0;$i<=count($data2[$k]['inputs']['nama'])-1;$i++)
  

         <div class="row mt-3" style="margin-top:4%">
             <div class="col-md-5">{{$data2[$k]['inputs']['nama'][$i]}}</div>
           
             <div class="col-md-6"><input type="{{$data2[$k]['inputs']['type'][$i]}}" name="{{$data2[$k]['inputs']['name'][$i]}}" class="{{$data2[$k]['inputs']['name'][$i]}} form-control" value="{{$data2[$k]['inputs']['value'][$i]}}" placeholder="{{$data2[$k]['inputs']['placeholder'][$i]}}" {{$data2[$k]['inputs']['required'][$i]}} {{ $data2[$k]['inputs']['disabled'][$i]}}></div>
         </div>
  @endfor
@endif
  @if(isset($data2[$k]['textArea']))
@for($i=0;$i<=count($data2[$k]['textArea'])-1;$i++)
    <div class="row mt-3" style="margin-top:4%">
        <div class="col-md-5">{{$data2[$k]['textArea'][$i]['nama']}}</div>
      
        <div class="col-md-6"><textarea cols="30" rows="40" type="{{$data2[$k]['textArea'][$i]['type']}}" id="editor" name="{{$data2[$k]['textArea'][$i]['name']}}" class="{{$data2[$k]['textArea'][$i]['name']}} form-control" value="{{$data2[$k]['textArea'][$i]['value']}}" placeholder="{{$data2[$k]['textArea'][$i]['placeholder']}}" ></textarea></div>
    </div>
@endfor
@endif

   @if(isset($data2[$k]['selects']))
   @foreach($data2[$k]['selects'] as $select)
      <div class="row mt-3 " style="margin-top:4%">
          <div class="col-md-5">{{$select['nama']}}</div>
        
          <div class="col-md-6">
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


@endif
  </div>
  <div class="row mt-3 mb-3" style="margin-top:2%; margin-bottom:2%">
    <div class="col-md-9"></div>
    <div class="col-md-3 divi">
     <button class="btn btn-md-8 btn-primary slide1" >Selanjutnya</button>
    </div>
 @endif
 @else
 <center><img src="/images/santri.png" width="30%"><h1 style="margin-top:15%; margin-bottom:20%; color:white">Mohon Maaf pendaftaran Belum Dibuka</centr></h1>
 @endif
  </div>
</section>
  @endsection
 
@section('script')
<script>
$(document).ready(function(){
  $('.modalE').modal('show'); 
$('.muncul2').hide();
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
    url:'/berubah',

    data:{"_token":"{{ csrf_token() }}",'kabupaten':kabupaten},
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
    url:'/berubah',
    data:{"_token":"{{ csrf_token() }}",'kecamatan':kelurahan},
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

$('#form').attr('action','/pendaftaran/tambah');
$('#form').attr('method','POST');
$('#form').attr('enctype','multipart/form-data');
slide1();
$('.muncul2').hide();
function slide1(){
$('.modal1').modal('show');
$('.muncul2').hide();
$('.muncul1').show();
$('.divi').html('  <button type="button" class="btn btn-primary slide1">Selanjutnya</button>');
$('.slide1').click(function(){
  nama = false
 $('.nama, .tempat_lahir, .tgl_lahir, .sd , .smp , .no_hp , .jk , .agama , .transportasi , .kabupaten , .kecamatan , .kelurahan , .nik , .rt , .rw , .kode_pos   ').each(function() {
  if ($(this).val() == '') {
    nama +="jojo";
  }
});
if(nama==false){
 $('.muncul1').hide();
$('.muncul2').show();
$('.divi').html('  <button type="button" class="btn btn-primary slide2">Sebelumnya</button><button type="submit" class="btn btn-primary slide3">Kirim</button>');
$('.slide2').click(function(){
slide1();
});
}
else{
  alert("periksa data kembali");
}
});
}

});
</script>
@endsection
