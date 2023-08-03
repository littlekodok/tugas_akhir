<?php

namespace App\Http\Controllers\Admin;


use App\Models\ObjekPajak;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PajakParkirController extends Controller
{
    public function index( Objekpajak $objekpajak)
    {
        return view('admin.pajak-parkir.index',compact('objekpajak'));
    }
    public function dataParkirBelumValidasiJson()
    {
        $query = ObjekPajak::where('id_jenis_pajak' ,'=','4')->where('validasi','=','Proses');

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('aksi', function ($data){
                            return '<a href="'. route('admin.pajak-parkir.validasi',$data->id) .'" class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i></a>';
                        })
                        ->editColumn('id_wajib_pajak', function ($data) {
                            return $data->wajibpajak->nama ;
                        })
                        ->editColumn('id_jenis_pajak', function ($data) {
                            return $data->jenispajak->nama_pajak;
                        })
                        // ->editColumn('validasi',function($data){
                        //     $valid = '<span class="badge light badge-warning">'.$data->validasi . '</span>'; 
                        //     return $valid;
                        // })
                       
                        ->rawColumns(['aksi'])
                        ->make(true);
        
    }
    
    public function dataParkirTerValidasiJson()
    {
        $query = ObjekPajak::where('id_jenis_pajak' ,'=','4')->where(
            function($query) {
              return $query
                     ->where('validasi', 'LIKE', '%Diterima%')
                     ->orWhere('validasi', 'LIKE', '%Ditolak%');
             })
             ->get();
        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('aksi', function ($data){
                            // return '<a href="'. route('admin.pajak-parkir.validasi',$data->id) .'" class="btn btn-primary btn-xs"><i class="fa-solid fa-magnifying-glass"></i></a>';
                           return '<button type="button" value="'.$data->id.'" class="btn btn-primary btn-sm"><i class="fa-solid fa-magnifying-glass"></i></button>';
                            
                        })
                        ->editColumn('id_wajib_pajak', function ($data) {
                            return $data->wajibpajak->nama ;
                        })
                        ->editColumn('jenis_usaha',function ($data){
                            return "P".$data->wajibpajak->jenis_usaha.".".sprintf("%07s",$data->wajibpajak->no_pendaftaran).".".$data->wajibpajak->kecamatan->kode_kecamatan.".".$data->wajibpajak->kelurahan->kode_kelurahan ;
                        })
                        // ->editColumn('id_jenis_pajak', function ($data) {
                        //     return $data->jenispajak->nama_pajak;
                        // })
                        // ->editColumn('validasi',function($data){
                        //     $valid = '<span class="badge light badge-warning">'.$data->validasi . '</span>'; 
                        //     return $valid;
                        // })
                       
                        ->rawColumns(['aksi'])
                        ->make(true);
       
    }
    public function validasi(ObjekPajak $objekpajak)
    {
        return view('admin.pajak-parkir.validasi',compact('objekpajak'));
    }
    public function validasi_post(ObjekPajak $objekpajak ,Request $request)
    {
        $request->validate([
            'validasi' =>'required',
            'keterangan' =>'required'
        ],
            [
            'validasi.required' => 'Validasi Belum Dipilih',
            'keterangan.required' => 'Keterangan Belum Diisi',
            ]);

            // dd($request->all());
        $objekpajak->update([
            'validasi' => $request->validasi, 
           'keterangan' => $request->keterangan 
        ]);

        return redirect()->route('admin.data-objek-pajak.pajak-parkir')->withSuccess('Pajak Parkiran Berhasil Divalidasi');
    }
    public function show(ObjekPajak $objekpajak)
    {

        $jp = $objekpajak->jenispajak;
        return response()->json([
            'status' => 200,
            'message' => 'Detail Data Objek Pajak',
            'data' =>  $objekpajak,
            'jenispajak' => $jp,
            'alamat' => $objekpajak->alamat_objek.','.'RT'.' '.$objekpajak->rt_objek.','.'RW'.' '.$objekpajak->rw_objek.','.$objekpajak->kecamatan->nama_kecamatan.','.' '.$objekpajak->kelurahan->nama_kelurahan,
            'v' => Carbon::parse($objekpajak->updated_at)->translatedFormat('l\,d-m-Y h:i A')
            // 'jenis_pajak' => $objekpajak->jenispajak
           
        ]);
    }
}
