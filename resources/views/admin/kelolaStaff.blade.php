
<?php
$model="Staff";
$url="kelolaStaff";
$tambah=true;
$import=true;
$role="admin";
$print="true";
$columns=['no','nama','jabatan','aksi'];
$inputs=[
    'nama'=>[
       "nama","nuptk",'tempat lahir',"tanggal lahir","alamat","pedidikan terakhir","foto",'email','no hp','tanggal masuk'
      ],
    'type'=>[
      'text','number','text','date','text','text','file','email','number','date'
    ],
    'name'=>[
        "nama","nuptk",'tempat_lahir',"tanggal_lahir","alamat","pedidikan_terakhir","foto",'email','no_hp','tgl_masuk'
    ],
    'placeholder'=>
    [
        "nama","nuptk",'tempat_lahir',"tanggal lahir","alamat","pedidikan terakhir","foto",'email','no hp','t'

    ],
    'value'=>['','','','','','','','','',''],
    'required'=>['required','required','required','required','required','required','required','required','required','']
];
$selects=[
  'jabatan'=>[
    'nama'=>'jabatan',
    'name'=>'jabatan',
    'value'=>[
        '-',
        'Kepala Sekolah',
        'WAKA I',
        'WAKA II',
        'WAKA III',
        'SAPRAS',
        'Sekertaris',
        'Bendahara',
        'Kepala TU',
        'kepala kompentensi',
        'sekertaris kompetensi', 
    ],
    'isi'=>[
        '-',
        'Kepala Sekolah',
        'WAKA I',
        'WAKA II',
        'WAKA III',
        'SAPRAS',
        'Sekertaris',
        'Bendahara',
        'Kepala TU',
        'kepala kompentensi',
        'sekertaris kompetensi', 
],
  "required"=>"required"
],
'jk'=>[
    'nama'=>'Jenis Kelamin',
    'name'=>'jk',
    'isi'=>[
        'Pria',
        'Wanita'
],
'value'=>[
    'Pria',
    'Wanita'
],
'required'=>'required'
],
'jenis'=>[
    'name'=>'jenis',
    'nama'=>'jenis',
    'isi'=>[
        'Guru',
        'Caraka',
        'TU',
        'Struktural'
    ],
    'value'=>[
        'Guru',
        'Caraka',
        'TU',
        'Struktural'
        ],

    "required"=>"required"
]

]
?>
@extends('layouts.app')
@section('var')
form=[  "nama","nuptk","tanggal_lahir","alamat","pedidikan_terakhir","jabatan","jk","jenis","tempat_lahir","email","no_hp"
];
data = [
    {
        'data':'1',
        render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }
    },
    {
        'data':'nama','name':'nama'
    },
    {
      'data':'jabatan','name':'jabatan'
  },
    {
        'data':'aksi','name':'aksi'
    }
]
@endsection

