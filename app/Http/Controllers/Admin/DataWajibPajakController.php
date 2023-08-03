<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\WajibPajak;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ValidasiEditRequest;
use RealRashid\SweetAlert\Facades\Alert;

class DataWajibPajakController extends Controller
{
     public function getEditKecamatan($id){
     
        $dataKecamatan = DB::table('kecamatans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKecamatan);
     }
      public function getEditKelurahan($id){
        $dataKelurahan = DB::table('kelurahans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKelurahan);
     }

    public function index()
    {
       
        return view('admin.data-wajib-pajak.index');
    }
    public function dataWajibPajakBelumValidasiJson()
    {
        $query = WajibPajak::where('verifikasi','=','0');

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('validasi', function ($data){
                            return '<a href="'. route('admin.data-wajib-pajak.validasi',$data->id) .'" class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i></a>';
                        })
                        ->editColumn('jenis_usaha', function ($data) {
                            return $data->jenis_usaha == '1' ? 'Pribadi' : 'Badan Usaha';
                        })
                        ->editColumn('verifikasi', function ($data) {
                            return $data->verifikasi == '0' ? 'Belum' : 'Sudah';
                        })
                        ->rawColumns(['validasi'])
                        ->make(true);
    }
    public function dataWajibPajakTerValidasiJson()
    {
        $query = WajibPajak::where('verifikasi','=','1');

        return DataTables::of($query)
                        ->addIndexColumn()
                        // ->addColumn('validasi', function ($data){
                        //     return '<a href="'. route('admin.data-wajib-pajak.validasi',$data->id) .'" class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i></a>';
                        // })
                        ->editColumn('no_pendaftaran', function ($data) {
                            return sprintf("%07s",$data->no_pendaftaran);
                        })
                        ->editColumn('jenis_usaha',function ($data){
                            return "P.".$data->jenis_usaha.".".sprintf("%07s",$data->no_pendaftaran).".".$data->kecamatan->kode_kecamatan.".".$data->kelurahan->kode_kelurahan ;
                        })
                        ->editColumn('verifikasi', function ($data) {
                            return $data->verifikasi == '0' ? 'Belum' : 'Sudah';
                        })
                        // ->rawColumns(['validasi'])
                        ->make(true);
    }
    public function validasi(WajibPajak $wajibpajak)
    {
        
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        return view('admin.data-wajib-pajak.validasi',compact('wajibpajak','kecamatans','kelurahans'));
    }
    public function validasi_post(Wajibpajak $wajibpajak)
    {   
        $wajibpajak->update([
            'verifikasi' => '1'
        ]);
         return redirect()->route('admin.data-wajib-pajak')->withSuccess('Wajib Pajak Berhasil Divalidasi');
    }
    public function validasi_edit(WajibPajak $wajibpajak)
    {
         $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        return view('admin.data-wajib-pajak.edit',compact('wajibpajak','kecamatans','kelurahans'));
    }
    public function validasi_edit_update(Wajibpajak $wajibpajak,ValidasiEditRequest $request)
    {   
        $valid = $request->validated();
        
        $foto = $wajibpajak->foto;
        if ($request->hasFile('foto')) {
            Storage::delete($wajibpajak->foto);
            $foto = $request->file('foto')->store('public/wajib-pajak');
        }
        $wajibpajak->update([
            'id_kecamatan' => $valid['id_kecamatan'],
            'kecamatan_luar' => ($valid['id_kecamatan'] == 1) ? $valid['id_kecamatan'] : '',
            'id_kelurahan' => $valid['id_kelurahan'],
            'kelurahan_luar' => ($valid['id_kelurahan'] == 1) ? $valid['id_kelurahan'] : '',
            'tanggal_daftar' => $valid['tanggal_daftar'],
            'no_pendaftaran' => $valid['no_pendaftaran'],
            'jenis_pendapatan' => $valid['jenis_pendapatan'],
            'jenis_usaha' => $valid['jenis_usaha'],
            'nik' => $valid['nik'],
            'nama' => $valid['nama'],
            'alamat' => $valid['alamat'],
            'rt' => $valid['rt'],
            'rw' => $valid['rw'],
            'kabupaten' => $valid['kabupaten'],
            'no_telpon' => $valid['no_telpon'],
            'kode_pos' => $valid['kode_pos'],
            'email' => $valid['email'],
            'foto' => $foto,
            'verifikasi' => false
        ]);
        // dd($request);
         return redirect()->route('admin.data-wajib-pajak.validasi',$wajibpajak->id)->with('edit','berhasil diedit');
    }
}

