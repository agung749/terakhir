<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use App\Models\toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class pemasukanController extends Controller
{
    public function show()
    {
        $data = toko::where('owner_id',Auth::user()->id)->get()->toArray();
        $isi=[];
        foreach($data as $datas){
            $isi['nama'][]=$datas['nama'];
            $isi['id'][]=$datas['id'];
        }
        return view('spw.pemasukan',['isi'=>$isi]);       
    }
    public function tambah(Request $req)
    {  $req->validate([
        'pemasukan'=>'required',
        'tahun'=>'required'
      
    ]);
    $Pemasukan = new Pemasukan();
    $foto="";
    $video="";

   if($req->file('foto')){
        $file= $req->file('foto');
        $foto= date('YmdHi').$file->getClientOriginalName();
        $file->move(('images/Pemasukan'),  $foto);
       
    }
 
    $user= Auth::user()->id;
    $Pemasukan->create([
        'toko_id'=>$req->toko,
        'pemasukan'=>$req->pemasukan,
        'foto'=>$foto,
        "bulan"=>$req->bulan,
        'tahun'=>$req->tahun,
    ]);
   

    return redirect()->back()->with(['success'=>'data berhasil dimasukan']);

    }
   public function tampil()
   {
    $data = pemasukan::latest()->get();

    return DataTables::of($data)
          ->addIndexColumn()
           ->addColumn('aksi', function($row){
                   $btn = '<a data-id="'.$row->id.'" class="ubah btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a data-id="'.$row->id.'" class="hapus btn btn-danger btn-sm">Hapus</a>&nbsp;&nbsp;';
                 return $btn;

            })->addColumn('pemasukan', function($row){
                $btn = "Rp.".$row->pemasukan;
                return $btn;

         })
            ->rawColumns(['aksi','pemasukan'])

            ->make(true);
   }
   public function hapus($data)
   {
    $data = Pemasukan::where('id',$data);
    $data->delete();
    return redirect('wirausaha/pemasukan')->with(['success'=>'data berhasil dihapus']);
   }
   public function ubah(Request $req,$data)
   { 

$req->validate([
    'pemasukan'=>'required',
    'tahun'=>'required'
  
]);
$Pemasukan = Pemasukan::where('id',$data);
$foto=$Pemasukan->get();
$foto = $foto[0]->foto;
if($req->file('foto')){
    $file= $req->file('foto');
    $foto= date('YmdHi').$file->getClientOriginalName();
    $file->move(('images/Pemasukan'),  $foto);
   
}
$Pemasukan->update([
    'toko_id'=>$req->toko,
    'pemasukan'=>$req->pemasukan,
    'foto'=>$foto,
    "bulan"=>$req->bulan,
    'tahun'=>$req->tahun,
]);


return redirect()->back()->with(['success'=>'data berhasil diubah']);
}
public function detail($data)
{
    $data = Pemasukan::where('id',$data)->get();
    return $data;
}
public function tampil2()
{
    $datas = DB::SELECT('select sum(pemasukan) as penghasilan , toko_id from pemasukan group by toko_id ');
    $data=[];
    $i=0;
    foreach($datas as $isi){
           
        $data[$i]['penghasilan']=$isi->penghasilan;
        $toko = toko::where('id',$isi->toko_id )->with('owner')->get();
        $data[$i]['toko']=$toko[0]->nama;
        $i++;
    }
    return DataTables::of($data);
}
}
