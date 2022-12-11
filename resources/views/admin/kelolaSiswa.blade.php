
<?php
use App\Models\Berita;

$tambah=true;
$model="Pendafatran";
$url="kelolaPendaftaran";
$role="admin";
$print="true";
$columns=['no','nama','aksi'];
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
        '','','','','','',''
    ],  
     'required'=>['required','required','','required','required','required','']
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
'jenis_tempat_tinggal'=>[
  'nama'=>"jenis tempat tinggal",
  'name'=>"jenis_tempat_tinggal",
  'value'=>[
    'kosan',
    'kontrakan',
    'pesantren',
    'rumah sendiri'
],
'isi'=>[
    'kosan',
    'kontrakan',
    'pesantren',
    'rumah sendiri'
],
  'required'=>'required'
],
  'transportasi'=>[
    'nama'=>'Transportasi',
    'name'=>'transportasi',
    'value'=>[
      'Angkutan Umum',
      'Mobi Pribadi',
      'Motor Pribadi',
      'Jalan Kaki'
    ],
'isi'=>[
      'Berita',
      'Prestasi',
      'Eskul',
      'Bisnis'
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
        "No UN SMP","No NISN","No NIK","Foto Diri ","Nomor Ijazah","No SKHU","Foto Ijazah","Foto SKHU","No KPS","No KPH","No KIP" ],
    'placeholder'=>
    [
        "diisi untuk siswa tingkat 10 s.d 12","nisn","nik","foto","nomor ijazah","skhu","foto ijazah","foto skhu","kps (Kartu Perlindungan Sosial)","pkh (Program Keluarga Harapan)","kip"],
    'value'=>[
        "","","","","","","","","","",""],
     'required'=>["","required","required","","","","","","","",""]
],  
],

];
$data2=[
  [ 'label'=>'Dokumen Orang Tua/Wali Siswa'], 
  [ 'inputs'=>[
  'name'=>["nama_ayah",'tanggal_lahir_ayah','kebutuhan_khusus_ayah','pekerjaan_ayah'],
  'disabled'=>['','','readonly',''],
'type'=>[
  "text",'date','text','text','text'
  ],
'nama'=>[
"Nama Ayah",'Tanggal Lahir Ayah','Kebutuhan Khusus Ayah','Pekerjaan Ayah '
],
'placeholder'=>
["Nama Ayah",'' ,'',''],
'value'=>["",'','-',''],

'required'=>[ "required","required",'','required'],

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
[ 'inputs'=>[
    'name'=>["nama_ibu",'tanggal_lahir_ibu','kebutuhan_khusus_ibu','pekerjaan_ibu'],
    'disabled'=>['','','readonly',''],
  'type'=>[
    "text",'date','text','text','text'
    ],
  'nama'=>[
  "Nama Ibu",'Tanggal Lahir Ibu','Kebutuhan Khusus Ibu','Pekerjaan Ibu '
  ],
  'placeholder'=>
  [
    "Nama ibu",'' ,'',''],
  'value'=>["",'','-',''],
  
  'required'=>[ "required","required",'','required'],
  
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
[ 'inputs'=>[
    'name'=>["nama_wali",'tanggal_lahir_wali','kebutuhan_khusus_wali','pekerjaan_wali'],
    'disabled'=>['','','readonly',''],
  'type'=>[
    "text",'date','text','text','text'
    ],
  'nama'=>[
  "Nama wali",'Tanggal Lahir wali','Kebutuhan Khusus wali','Pekerjaan wali '
  ],
  'placeholder'=>
  [
    "Nama wali",'' ,'',''],
  'value'=>["",'','-',''],
  
  'required'=>[ "","",'',''],
  
],
'selects'=>[
'penghasilan_wali'=>[
    'nama'=>'Penghasilan Wali',
    'name'=>'penghasilan_wali',
    'value'=>[
      '-',
      'Tidak Bepenghasilan',
      'di bawah 1 juta',
      '1 sd 2 juta',
      '2 sampai 3 juta',
      '4 sampai 5 juta',
      'di atas 5 juta',
    
    ],
  'isi'=>[
    "-",
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
@extends('layouts.siswaTemplate')
@section('var')
form=['nama','berita'];
data = [
    {
    'data':'id','name':'id'    
    },
    {
        'data':'nama','name':'nama'
    },
    {
        'data':'aksi','name':'aksi'
    }
]
@endsection