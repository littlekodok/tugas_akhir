<?php

namespace App\Http\Controllers\Tagihan;

use Carbon\Carbon;
use App\Models\Transaksi;
use App\Models\WajibPajak;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class TagihanController extends Controller
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
        return view('tagihan.index',compact('cek','wp'));
    }
    public function dataTagihanJson()
    {
      $wajibPajak = WajibPajak::where('id_user', Auth::user()->id)->first();
      $query = Transaksi::where('id_wajib_pajak', $wajibPajak->id)->get();

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('aksi', function ($data){
                          if ($data->status == 'PENDING') {
                            
                            return '<a href="'. $data->url_pembayaran .'" class="btn light btn-success btn-xs">Bayar</a>';
                          }
                        })
                        ->addColumn('cetak',function($data){
                          if($data->status == 'SUCCESS')
                          return '<a href="'.route('wajib-pajak.cetak-pembayaran', $data->id) .'" class="btn light btn-danger btn-xs">SSPD</a>';
                        })
                        ->addColumn('alamat_objek',function ($data){
                            return $data->objekpajak->alamat_objek.'<br>'."<small style='color: rgba(43, 43, 43, 0.7);'>".'RT'. ' '. $data->objekpajak->rt_objek.','.' '.'RW'.' '.$data->objekpajak->rw_objek.','.' '.$data->objekpajak->kelurahan->nama_kelurahan. ',' .' '.$data->objekpajak->kecamatan->nama_kecamatan."</small>";
                        })
                        ->editColumn('nama_objek', function ($data) {
                            return $data->objekpajak->nama_objek;
                        })
                        ->editColumn('jenis_pajak', function ($data) {
                            return $data->jenispajak->nama_pajak;
                        })
                        ->editColumn('total_pajak', function ($data) {
                            return "Rp ".number_format( $data->total_pajak);
                        })
                        ->editColumn('dasar_pengenaan', function ($data) {
                            return "Rp ".number_format( $data->dasar_pengenaan);
                        })
                        ->editColumn('persen_tarif', function ($data) {
                            return $data->tarif_pajak.'%';
                        })
                        ->editColumn('bulan_bayar', function ($data) {
                            return  Carbon::parse($data->bulan_bayar)->locale('id')->getTranslatedMonthName('MMMM');
                        })
                        ->rawColumns(['aksi','alamat_objek','cetak'])
                        ->make(true);
        
    }
    public function cetakPembayaran(Transaksi $transaksi)
    {
      
      // dd($transaksi->dasar_pengenaan);
    	$pdf = PDF::loadview('tagihan.cetak',compact('transaksi'));
      $pdf->setPaper('A4','potrait');
    	return $pdf->stream('bukti-bayar-pdf');
    }
}
