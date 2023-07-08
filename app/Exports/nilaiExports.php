<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\Siswa;
use App\Models\kelas;
class nilaiExports implements FromCollection, WithHeadings, WithMapping, WithTitle,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;
    protected $no;
    function title() : string {
        $kelas =kelas::where('id',$this->id)->get();
        switch($kelas[0]->jurusan){
            case 1:
                $kelas[0]->jurusan="MPLB";
                break;
            case 2:
                $kelas[0]->jurusan="AKL";
                break;
            case 3:
                $kelas[0]->jurusan="Pemasaran";
                break;
            case 4 :
                $kelas[0]->jurusan="DKV";
                break;
            case 5:
                $kelas[0]->jurusan="TJKT";
                break;
        }
        if($kelas[0]->posisi==0){
            $kelas[0]->posisi="";
        }
        $o = $kelas[0]->kelas.' ' . $kelas[0]->jurusan." ".$kelas[0]->posisi;
    return $o;
    }
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function collection()
    {
        return $siswa=siswa::where('kelas',$this->id)->get();
    }
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
    public function map($row):array
    {
        $this->no++;
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
            $this->no,
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


}
