<?php

namespace App\Http\Controllers\ObjekPajak;

use Carbon\Carbon;
use App\Models\Rekening;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\JenisPajak;
use App\Models\ObjekPajak;
use App\Models\WajibPajak;
use Illuminate\Http\Request;
use App\Models\FotoObjekPajak;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ObjekPajakRequest;

class ObjekPajakController extends Controller
{
    public function index()
    {
        $wp = WajibPajak::where('id_user', auth()->user()->id)->first();
          if (empty($wp)) {
            $cek = false;
          } elseif (!empty($wp) == 0) {
            $cek = $wp;
          } else {
            $cek = $wp;
          }
        return view('objek-pajak.index',compact('cek'));
    }
    public function dataObjekPajak()
    {
        $wajibPajak = WajibPajak::where('id_user', Auth::user()->id)->first();
        $query = ObjekPajak::where('id_wajib_pajak', $wajibPajak->id)->get();
   

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('aksi', function ($data){
                          if ($data->validasi == 'Diterima') {
                            return '<button type="button" value="'.$data->id.'" class="btn light btn-success modal-objek btn-sm"><i class="fa-solid fa-magnifying-glass"></i></button>';
                          } elseif ($data->validasi == 'Ditolak') {
                            return '<button type="button" value="'.$data->id.'" class="btn light btn-danger modal-objek btn-sm"><i class="fa-solid fa-magnifying-glass"></i></button>';
                          } 
                          
                        })
                        ->editColumn('id_jenis_pajak', function ($data) {
                            return $data->jenispajak->nama_pajak;
                        })
                        // ->editColumn('jenis_usaha',function ($data){
                        //     return "P.".$data->jenis_usaha.".".sprintf("%07s",$data->no_pendaftaran).".".$data->kecamatan->kode_kecamatan.".".$data->kelurahan->kode_kelurahan ;
                        // })
                      
                        ->rawColumns(['aksi'])
                        ->make(true);
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
    public function create(WajibPajak $wajibpajak)
    {
        $wp = WajibPajak::where('id_user', auth()->user()->id)->first();
          if (empty($wp)) {
            $cek = false;
          } elseif (!empty($wp) == 0) {
            $cek = $wp;
          } else {
            $cek = $wp;
          }
        // $wp = WajibPajak::where('nama')->get();
        // $wp = WajibPajak::where('id_user', auth()->user()->id)->first();
        $kecamatans =  Kecamatan::where('kode_kecamatan','!=','00')->get();
        $kelurahans = Kelurahan::all();
        $jenispajak = JenisPajak::all();
        $rekenings = Rekening::all();
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

        return view('objek-pajak.tambah',compact('jenispajak','kecamatans','kelurahans','rekenings','kd','wp','cek'));
    }
    public function store(ObjekPajakRequest $request)
    {
      $valid = $request->validated();
      $wp = WajibPajak::where('id_user', auth()->user()->id)->first();

      try {
        DB::transaction(function () use ($valid, $wp,$request) {
            
         $op = ObjekPajak::create([
            'id_wajib_pajak' => $wp->id,
            'id_jenis_pajak' => $valid['id_jenis_pajak'],
            'id_rekening' => $valid['id_rekening'],
            'id_kecamatan' => $valid['id_kecamatan'],
            'id_kelurahan' => $valid['id_kelurahan'],
            'tanggal_daftar_objek' => $valid['tanggal_daftar_objek'],
            'no_objek' => $valid['no_objek'],
            'nama_objek' => $valid['nama_objek'],
            'alamat_objek' => $valid['alamat_objek'],
            'rt_objek' => $valid['rt_objek'],
            'rw_objek' => $valid['rw_objek'],
            'kode_pos_objek' => $valid['kode_pos_objek'],
            'latitude' => $valid['latitude'],
            'longitude' => $valid['longitude'],
            ]);
        // dd($op);
            $image = array();
            if ($files = $request->file('foto')) {
              foreach ($files as $file) {
                $upload = $file->store('objek-pajak', 'public');
                FotoObjekPajak::insert([
                  'id_wajib_pajak' => $wp->id,
                  'id_objek_pajak' => $op->id,
                  'foto' =>  $upload
                ]);
              }
            }
        });
        return redirect()-> route('wajib-pajak.objek-pajak.index')->with('success','Objek Pajak Sudah diregistrasi');

      } catch (\Throwable $th) {
        throw $th;
        return redirect()-> route('wajib-pajak.objek-pajak.index')->with('danger','Data gagal dikirim: ' . $th->getMessage());
      }
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
