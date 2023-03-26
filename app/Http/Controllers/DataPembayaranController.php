<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\data_pembayaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataPembayaranController extends Controller
{
 
   public function tampil()
   {
       $data = data_pembayaran::latest()->get();
       return DataTables::of($data)
             ->addIndexColumn()
              ->addColumn('aksi', function($row){
                      $btn = '<a data-id="'.$row->id.'" class="ubah btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a data-id="'.$row->id.'" class="hapus btn btn-danger btn-sm">Hapus</a>';
                    return $btn;

               })->addColumn('semester', function($row){
                if($row->semester==8){
                  $btn="Tahunan";
                } 
                else if($row->semester==7){
                  $btn="Bulanan";
                }  
                else if($row->semester==9){
                  $btn="Akhhir Semester";
                }    
                else{
                  $btn="Semester ".$row->semester;
                }
                return $btn;

               })
               ->rawColumns(['aksi'])
               ->make(true);

   }
   public function tambah(Request $req)
   {
    $req->validate([
      "nominal"=>"min:1|numeric|required",
      "nama"=>"required"
    ]);
    data_pembayaran::create([
      "nominal"=>$req->nominal,
      "semester"=>$req->semester,
      "nama"=>$req->nama
    ]);
    return redirect('/admin/kelolaDataPembayaran')->with(['success'=>'data berhasil dimasukan']);
   }
   public function ubah(Request $req)
   {
    # code...
   }
   public function hapus(Request $req)
   {
    # code...
   }

}
