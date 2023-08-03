<?php

namespace App\Http\Controllers\WajibPajak;

use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\WajibPajak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WajibPajakRequest;


class WajibPajakController extends Controller
{
    public function getKecamatan($id){
        $dataKecamatan = DB::table('kecamatans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKecamatan);
     }
      public function getKelurahan($id){
        $dataKelurahan = DB::table('kelurahans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKelurahan);
     }

    public function index()
    {     
          // $user = User::findOrfail();
          $kecamatans = Kecamatan::all();
          $kelurahans = Kelurahan::all();
        //   dd($kecamatans);
          $wp = WajibPajak::where('id_user', auth()->user()->id)->first();
          if (empty($wp)) {
            $cek = false;
          } elseif (!empty($wp) == 0) {
            $cek = $wp;
          } else {
            $cek = $wp;
          }
          
          $q = DB::table('wajib_pajak')->select(DB::raw('MAX(RIGHT(no_pendaftaran,7)) as kode'));
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

        return view('wajib-pajak.index',compact('kecamatans','kd', 'cek','kelurahans'));
    }
    public function store( WajibPajakRequest $request)
    {
        // dd($request->all());
        
        $valid = $request->validated();
        if ($request->file('foto')) {
            $valid['foto'] = $request->file('foto')->store('wajib-pajak','public');
        }
        // $foto = $valid->file('foto')->store('public/wajib-pajak');
        $wp = WajibPajak::create([
            'id_kecamatan' => $valid['id_kecamatan'],
            // 'kecamatan_luar' => ($valid['id_kecamatan'] == 1) ? $valid['id_kecamatan'] : '',
            'kecamatan_luar' => ($valid['id_kecamatan'] == 1) ? $request['kecamatan_luar'] : '',
            'id_kelurahan' => $valid['id_kelurahan'],
            // 'kelurahan_luar' => ($valid['id_kelurahan'] == 1) ? $valid['id_kelurahan'] : '',
            'kelurahan_luar' => ($valid['id_kelurahan'] == 1) ? $request['kelurahan_luar'] : '',
            'id_user' => Auth::user()->id,
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
            'foto' => $valid['foto'],
            'verifikasi' => false
        ]);
        // dd($wp);

        return redirect()-> route('wajib-pajak.index')->with('success','Wajib Pajak Sudah diregistrasi');
    }
}
