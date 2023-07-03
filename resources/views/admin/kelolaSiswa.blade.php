
<?php
use App\Models\Berita;

$tambah=true;
$model="Pendafatran";
$url="kelolaPendaftaran";
$role="admin";
$print="true";
$columns=['no','kode unik','nama','program kompentensi','tanggal','keterangan','aksi','entri data'];
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
     'required'=>['required','','','','','','']
    ]
,

'selects'=>[
   'jk'=>[
    'nama'=>'jenis kelamin',
    'name'=>'jk',
    'value'=>[1,2],
    'isi'=>['Laki-Laki','Perempuan'],
    'required'=>''
],
'agama'=>[
    'nama'=>'Agama',
    'name'=>'agama',
    'value'=>['islam','Hindu','Buddha','Kristen','Katolik','Khonghucu','Kepercayaan Lokal'],
    'isi'=>['islam','Hindu','Buddha','Kristen','Katolik','Khonghucu','Kepercayaan Lokal'],
    'required'=>''
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
      'Mobil Pribadi',
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
    'required'=>''
],
'kelurahan'=>[
    'nama'=>'kelurahan',
    'name'=>'kelurahan',
    'isi'=>['Pilih kelurahan'],
    'value'=>[''],
    'required'=>''
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
        "No UN SMP","No NISN","No NIK","pas foto  ","Nomor Ijazah","No SKHU","scan ijazah","scan skhu","No KPS","No PKH","No KIP" ],
    'placeholder'=>
    [
        "diisi untuk siswa tingkat 10 s.d 12","nisn","nik","foto","nomor ijazah","skhu","scan ijazah","scan skhu","kps (Kartu Perlindungan Sosial)","pkh (Program Keluarga Harapan)","kip"],
    'value'=>[
        "","","","","","","","","","",""],
     'required'=>["","","","","","","","","","",""]
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
'required'=>""
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
  
  'required'=>[ "","",'',''],
  
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
'required'=>""
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
'required'=>""
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
form=[  "nama",
        "kelurahan",
        "kecamatan",
        "alamat",
        "no_hp",
        "tgl_lahir",
        "nisn",
        'kode_unik',
        'tahun_ajaran',
        "jenis_tempat_tinggal",
        "nik",
        "jk",
        "Ijazah",
        "skhu",
        "un_smp",
        "tempat_lahir",
        "agama",
        "sd",
        "smp",
        "transportasi",
        "no_tel",
        "email",
        "kps",
        "kph",
        "kip",
        "tinggi",
        "berat",
        "status",
        "jarak",
        "penghasilan_ayah",
        "penghasilan_wali",
        "penghasilan_ibu",
        "nama_ayah",
        "nama_ibu",
        "nama_wali",
        "keadaan_ayah",
        "keadaan_ibu",
        "keadaan_wali",
        "pekerjaan_ibu",
        "pekerjaan_ayah",
        "pekerjaan_wali",
        "kabupaten",
        "waktu",
        "saudara",
        "kode_pos",
        "kebutuhan_khusus_wali",
        "kebutuhan_khusus_ibu",
        "kebutuhan_khusus_ayah",
        "jurusan",
        "pendidikan_ayah",
        "pendidikan_ibu",
        "pendidikan_wali",
        "tanggal_lahir_ibu",
        "tanggal_lahir_ayah",
        "tanggal_lahir_wali",
        "rt",
        "rw",
        "Jalan"];
data = [
  {
    'data':'1',
    render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    }
},
  {
        'data':'kode_unik','name':'kode_unik'
    },
    {
        'data':'nama','name':'nama'
    },
   
     {
        'data':'jurusan','name':'jurusan'
    },
     {
        'data':'created_at','name':'created_at'
    },
    {
        'data':'keterangan','name':'keterangan'
    },
    {
        'data':'aksi','name':'aksi'
    },
    {
      'data':'admin','name':'admin'
  }
]
@endsection
