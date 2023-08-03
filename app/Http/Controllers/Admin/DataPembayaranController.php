<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Exports\TransaksiExport;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;


class DataPembayaranController extends Controller
{
    public function dataPembayaran()
    {
       
        return view('admin.data-pembayaran.index');
    }
    public function dataTableDataPembayaran()
    {
        $query = Transaksi::get();

        return DataTables::of($query)
                        ->addIndexColumn()
                        // ->addColumn('validasi', function ($data){
                        //     if ($data->status == 'EXPIRE') {
                        //         return '<button type="button" value="'.$data->id.'" class="btn light btn-success modal-objek btn-sm"><i class="fa-solid fa-magnifying-glass"></i></button>';
                        //       } 
                        // })
                        ->addColumn('wajib_pajak',function ($data){
                            return $data->wajibpajak->nama.'<br>'."<small class='fw-semibold text-lowercase' style='color: rgba(43, 43, 43, 0.7);'>".$data->wajibpajak->email."</small>".'<br>'."<small class='fw-semibold text-lowercase' style='color: rgba(43, 43, 43, 0.7);'>".$data->wajibpajak->no_telpon."</small>";
                        })
                        ->addColumn('objek_pajak', function ($data) {
                            return $data->objekpajak->nama_objek.'<br>'."<small class='fw-semibold' style='color: rgba(43, 43, 43, 0.7);'>". $data->objekpajak->alamat_objek.','.'RT'. ' '. $data->objekpajak->rt_objek.','.' '.'RW'.' '.$data->objekpajak->rw_objek.','.' '.$data->objekpajak->kelurahan->nama_kelurahan. ',' .' '.$data->objekpajak->kecamatan->nama_kecamatan."</small></small>";
                        })
                        ->editColumn('tanggal_pendataan', function ($data) {
                            return  Carbon::parse($data->tanggal_pendataan)->locale('id')->translatedFormat('l jS F Y');
                        })
                        ->editColumn('bulan_bayar', function ($data) {
                            return  Carbon::parse($data->bulan_bayar)->locale('id')->getTranslatedMonthName('MMMM');
                        })
                        ->editColumn('total_pajak', function ($data) {
                            return "Rp ".number_format( $data->total_pajak);
                        })
                        ->editColumn('jenis_pajak', function ($data) {
                            return $data->jenispajak->nama_pajak;
                        })
                        // ->editColumn('verifikasi', function ($data) {
                        //     return $data->verifikasi == '0' ? 'Belum' : 'Sudah';
                        // })
                        ->rawColumns(['wajib_pajak','objek_pajak'])
                        ->make(true);
    }
    public function export()
    {
        return (new TransaksiExport)->download('laporan_pembayaran..xlsx');

    }
}
