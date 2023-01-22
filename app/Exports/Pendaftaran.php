<?php

namespace App\Exports;

use App\Models\siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class Pendaftaran implements FromCollection, WithMapping, ShouldAutoSize, WithTitle, WithHeadings
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
        "tanggal lahir",
        "nisn",
        'kode unik',
        'tahun ajaran',
        "jenis tempat tinggal",
        "nik",
        "foto",
        "jk",
        "ijazah",
        "skhu",
        "no un smp",
        "tempat lahir",
        "agama",
        "sd",
        "smp",
        "transportasi",
        "nomor telepon orang tua/wali",
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
        "waktu",
        "saudara",
        "kode pos",
        "kebutuhan khusus wali",
        "kebutuhan khusus ibu",
        "kebutuhan_khusus ayah",
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
        return [
            $row->nama,
            $row->alamat,
            $row->no_hp,
            $row->tgl_lahir,
            $row->nisn,
            $row->kode_unik,
            $row->tahun_ajaran,
            $row->jenis_tempat_tinggal,
            $row->nik,
            $row->foto,
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
            $row->foto_ijazah,
            $row->foto_skhu,
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
            $row->waktu,
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
    public function title(): string
    {
        return "Data Pendaftar Tahun ".date('Y');
    }

    public function collection()
    {
        return siswa::where('tahun_ajaran',date('Y').'/'.date('Y',strtotime(' +1 year')))->where('status',2);
    }
}
