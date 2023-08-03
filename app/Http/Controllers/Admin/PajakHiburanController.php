<?php

namespace App\Http\Controllers\Admin;

use App\Models\ObjekPajak;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PajakHiburanController extends Controller
{
    public function index()
    {
        return view('admin.pajak-hiburan.index');
    }
    public function dataHiburanBelumValidasiJson()
    {
        $query = ObjekPajak::where('id_jenis_pajak','=','3')->where('validasi','=','Proses');

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('aksi', function ($data){
                            return '<a href="'. route('admin.pajak-hiburan.validasi',$data->id) .'" class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i></a>';
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
        return view();
    }
    public function dataHiburanTerValidasiJson()
    {
        // $query = ObjekPajak::where('id_jenis_pajak' ,'=','3')->where('validasi','=','Sukses');
        $query = ObjekPajak::where('id_jenis_pajak','=','3')->where(function($query){
            return $query
            ->where('validasi','LIKE','%Diterima%')
            ->orWhere('validasi','LIKE','%Ditolak');
        });
        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('aksi', function ($data){
                            return '<button type="button" value="'.$data->id.'" class="btn btn-primary  modal-hiburan btn-sm"><i class="fa-solid fa-magnifying-glass"></i></button>';
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
        return view();
    }
    public function validasi(ObjekPajak $objekpajak)
    {
        
        return view('admin.pajak-hiburan.validasi',compact('objekpajak'));
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

        return redirect()->route('admin.data-objek-pajak.pajak-hiburan')->withSuccess('Pajak Hiburan Berhasil Divalidasi');
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

