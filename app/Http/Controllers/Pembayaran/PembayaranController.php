<?php

namespace App\Http\Controllers\Pembayaran;

use Exception;
use Carbon\Carbon;
use Midtrans\Config;
use App\Models\Transaksi;
use App\Models\JenisPajak;
use App\Models\ObjekPajak;
use App\Models\WajibPajak;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProsesBayarRequest;
Use Midtrans\Snap;


class PembayaranController extends Controller
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
        return view('pembayaran.index',compact('cek','wp'));
    }
    public function dataPembayaran()
    {
      $wajibPajak = WajibPajak::where('id_user', Auth::user()->id)->first();
      $query = ObjekPajak::where('id_wajib_pajak', $wajibPajak->id)->where('validasi', 'Diterima')->get();

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('aksi', function ($data){
                            return '<a href="'. route('wajib-pajak.pembayaran-pajak',$data->id) .'" class="btn light btn-success btn-xs">Bayar</a>';
                        })
                       
                       
                        ->rawColumns(['aksi'])
                        ->make(true);
        
    }
    public function pembayaranObjekPajak(string $id, ObjekPajak $objekPajak)
    {

      $objekPajak = $objekPajak->where('id',$id)->first();
      $wp = WajibPajak::where('id_user', auth()->user()->id)->first();
      if (empty($wp)) {
        $cek = false;
      } elseif (!empty($wp) == 0) {
        $cek = $wp;
      } else {
        $cek = $wp;
      }
      
      $q = DB::table('transaksi')->select(DB::raw('MAX(RIGHT(no_transaksi,7)) as kode'));
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


      return view('pembayaran.pembayaran',compact('cek','wp','objekPajak','kd'));
    }
    public function prosesBayar(string $id, ProsesBayarRequest $request, ObjekPajak $objekPajak)
    {
      // dd($id);
      $valid = $request->validated();
      
      $objekPajak = $objekPajak->where('id',$id)->first();
      $now = Carbon::now();
      $tahun = date('Y', strtotime($now));
      $bulan = date('m', strtotime($request['bulan_bayar']));
      if (Transaksi::where('id_objek_pajak', $objekPajak->id)->whereYear('bulan_bayar', $tahun)->whereMonth('bulan_bayar', $bulan)->where('status','!=', 'expire')->first()) {
        return redirect()->back()->with('error','Tidak Bisa Memasukkan Bulan yang Sama');
      }

      // $transaksi = Transaksi::where('id_objek_pajak', $objekPajak->id)->whereYear('bulan_bayar', $tahun)->whereMonth('bulan_bayar', $bulan)->first();
      // isset($transaksi) ? $status = true : $status = false;
      // dd($status);
      
      $order = Transaksi::create([
            'id_wajib_pajak' => $objekPajak->id_wajib_pajak,
            'id_objek_pajak' => $objekPajak->id,
            'id_jenis_pajak' => $objekPajak->id_jenis_pajak,
            'kode_bayar'  => "17".sprintf('%02s',$objekPajak['id_jenis_pajak'])."01".sprintf("%07s",$request['no_transaksi']).Carbon::now()->format('Y'),
            'bulan_bayar' => $request['bulan_bayar'],
            'dasar_pengenaan' => $valid['dasar_pengenaan'],
            'no_transaksi'=> $valid['no_transaksi'],
            'tanggal_pendataan' => Carbon::now()->format('Y-m-d'),
            'norek_transaksi' => $valid['norek_transaksi'],
            'kegiatan' => $valid['kegiatan'],
            'tarif_pajak' => $valid['tarif_pajak'],
            'total_pajak' => $valid['total_pajak'],
      ]);
      // dd($order);

      // Set your Merchant Server Key
      Config::$serverKey = config('services.midtrans.serverKey');
      // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
      Config::$isProduction = config('services.midtrans.isProduction');
      // Set sanitization on (default)
      Config::$isSanitized = config('services.midtrans.isSanitized');
      // Set 3DS transaction for credit card to true
      Config::$is3ds = config('services.midtrans.is3ds');

      $midtrans = array(
          'transaction_details' => [
              'order_id' => $order->id,
              'gross_amount' => (int) $order->total_pajak,
          ],
          'customer_details' => [
              'first_name' => $objekPajak->wajibpajak->nama,
              'email' => $objekPajak->wajibpajak->email,
              'phone' => $objekPajak->wajibpajak->no_telpon,
          ],
          'enabled_payments' => [
            "gopay",
            "shopeepay",
            "permata_va",
            "bca_va",
            "bni_va",
            "bri_va",
          ],
          'vt_web' => [],
      );
    
      try {
          // Get Snap Payment Page URL
          $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

          $order->url_pembayaran = $paymentUrl;
          $order->save();
        
          // Redirect to Snap Payment Page
          return redirect($paymentUrl);
      }
      catch (Exception $e) {
          echo $e->getMessage();
      }
    }
    public function suksesBayar()
    {
      return view('pembayaran.sukses-bayar');
    }
}
