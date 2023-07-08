<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\jurusan;



class Pendaftaran implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $i=0;
    public function headings(): array
    {
        return [
   "no",
   "nama",
   "alamat",
   "no hp",
   "tgl lahir",
   "nisn",
   "kode unik",
   "tahun ajaran",
   "jenis tempat tinggal",
   "nik",
   "jk",
   "Ijazah",
   "skhu",
   "un smp",
   "tempat lahir",
   "agama",
   "sd",
   "smp",
   "transportasi",
   "no tel",
   "email",
   "kps",
   "kph",
   "kip",
   "tinggi",
   "berat",
   "status",
   "jarak",
   "penghasilan ayah",
   "penghasilan wali",
   "penghasilan ibu",
   "nama ayah",
   "nama ibu",
   "nama wali",
   "keadaan ayah",
   "keadaan ibu",
   "keadaan wali",
   "pekerjaan ibu",
   "pekerjaan ayah",
   "pekerjaan wali",
   "kabupaten",
   "waktu",
   "kelas",
   "saudara",
   "kode pos",
   "kebutuhan khusus wali",
   "kebutuhan khusus ibu",
   "kebutuhan khusus ayah",
   "jurusan",
   "pendidikan ayah",
   "pendidikan ibu",
   "pendidikan wali",
   "tanggal lahir ibu",
   "tanggal lahir ayah",
   "tanggal lahir wali",

        ];
    }
    public function map($row): array
    {
        $this->i++;
        switch($row->jurusan){
            case 1:
                $row->jurusan="MPLB";
                break;
            case 2:
                $row->jurusan="AKL";
                break;
            case 3:
                $row->jurusan="Pemasaran";
                break;
            case 4 :
                $row->jurusan="DKV";
                break;
            case 5:
                $row->jurusan="TJKT";
                break;
        }
    return [
    $this->i,
    $row->nama,
    $row->alamat,
    $row->no_hp,
    $row->tgl_lahir,
    $row->nisn,
    $row->kode_unik,
    $row->tahun_ajaran,
    $row->jenis_tempat_tinggal,
    $row->nik,

    $row->jk,
    $row->Ijazah,
    $row->skhu,
    $row->un_smp,
    $row->tempat_lahir,
    $row->agama,
    $row->sd,
    $row->smp,
    $row->transportasi,
    $row->no_tel,
    $row->email,
    $row->kps,
    $row->kph,
    $row->kip,
    $row->tinggi,
    $row->berat,
    $row->status,
    $row->jarak,
    $row->penghasilan_ayah,
    $row->penghasilan_wali,
    $row->penghasilan_ibu,
    $row->nama_ayah,
    $row->nama_ibu,
    $row->nama_wali,
    $row->keadaan_ayah,
    $row->keadaan_ibu,
    $row->keadaan_wali,
    $row->pekerjaan_ibu,
    $row->pekerjaan_ayah,
    $row->pekerjaan_wali,
    $row->kabupaten,
    $row->waktu,
    $row->kelas,
    $row->saudara,
    $row->kode_pos,
    $row->kebutuhan_khusus_wali,
    $row->kebutuhan_khusus_ibu,
    $row->kebutuhan_khusus_ayah,
    $row->jurusan,
    $row->pendidikan_ayah,
    $row->pendidikan_ibu,
    $row->pendidikan_wali,
    $row->tanggal_lahir_ibu,
    $row->tanggal_lahir_ayah,
    $row->tanggal_lahir_wali,
        ];
    }


    public function collection()
    {
        return siswa::where('tahun_ajaran',date('Y').'/'.date('Y',strtotime(' +1 year')))->get();
    }
}
