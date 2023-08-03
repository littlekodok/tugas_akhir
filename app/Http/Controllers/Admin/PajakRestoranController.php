<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\ObjekPajak;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PajakRestoranController extends Controller
{
    public function index()
    {
        return view('admin.pajak-restoran.index');
    }
    public function dataRestoranBelumValidasiJson()
    {
        $query = ObjekPajak::where('id_jenis_pajak' ,'=','2')->where('validasi','=','Proses');

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('aksi', function ($data){
                            return '<a href="'. route('admin.pajak-restoran.validasi',$data->id) .'" class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i></a>';
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
    
    public function dataRestoranTerValidasiJson()
    {
        // $query = ObjekPajak::where('id_jenis_pajak' ,'=','2')->where('validasi','=','Diterima')->orWhere('validasi','=','Ditolak');
       $query = ObjekPajak::where('id_jenis_pajak' ,'=','2')->where(
        function($query) {
          return $query
                 ->where('validasi', 'LIKE', '%Diterima%')
                 ->orWhere('validasi', 'LIKE', '%Ditolak%');
         })
         ->get();

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('aksi', function ($data){
                            return '<button type="button" value="'.$data->id.'" class="btn btn-primary modal-restoran btn-sm"><i class="fa-solid fa-magnifying-glass"></i></button>';
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
        
        return view('admin.pajak-restoran.validasi',compact('objekpajak'));
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

        return redirect()->route('admin.data-objek-pajak.pajak-restoran')->withSuccess('Pajak Restoran Berhasil Divalidasi');
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
