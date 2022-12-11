<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table="siswa";
    
    public $fillable=[
        "nama",
        "kelurahan",
        "kecamatan",
        "alamat",
        "no_hp",
        "tgl_lahir",
        "nisn",
        "jenis_tempat_tinggal",
        "nik",
        "foto",
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
        "foto_ijazah",
        "foto_skhu",
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
}
