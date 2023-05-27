<?php

namespace App\Http\Controllers\ObjekPajak;

use App\Models\Rekening;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\JenisPajak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ObjekPajakController extends Controller
{
    public function index()
    {
        return view('objek-pajak.index');
    }
    public function getKecamatanObjek($id){
        $dataKecamatan = DB::table('kecamatans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKecamatan);
     }
     public function getKelurahanObjek($id){
        $dataKelurahan = DB::table('kelurahans')->where('id_kecamatan',$id)->where('kode_kelurahan','!=','00')->get();
        return response()->json($dataKelurahan);
     }
      public function getRekening($id){
        $dataRekening = DB::table('rekenings')->where('id_jenis_pajak',$id)->get();
        return response()->json($dataRekening);
    }
    public function create()
    {
        
        $kecamatans =  Kecamatan::where('kode_kecamatan','!=','00')->get();
        $kelurahans = Kelurahan::all();
        $jenispajak = JenisPajak::all();
        $rekening = Rekening::all();
        $q = DB::table('objek_pajaks')->select(DB::raw('MAX(RIGHT(no_objek,7)) as kode'));
            $kd ="";
            if ($q->count()>0) {
                foreach($q->get()as $k)
                {
                    $tmp = ((int)$k->kode)+1;
                    $kd = sprintf("%07s",$tmp);
                }
            }
            else{
                $kd = "0000001";
            }

        // dd($kelurahans);
        return view('objek-pajak.tambah',compact('jenispajak','kecamatans','kelurahans','rekening','kd'));
    }
}
