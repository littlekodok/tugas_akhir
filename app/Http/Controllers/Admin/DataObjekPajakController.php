<?php

namespace App\Http\Controllers\Admin;

use App\Models\ObjekPajak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataObjekPajakController extends Controller
{
    public function dataObjekPajak()
    {
        $tasks = ObjekPajak::all();
        $hotelDiterima = $tasks->where('id_jenis_pajak', 1)->where('validasi','Diterima');
        $hotelProses = $tasks->where('id_jenis_pajak', 1)->where('validasi','Proses');

        $restoranDiterima = $tasks->where('id_jenis_pajak', 2)->where('validasi','Diterima');
        $restoranProses = $tasks->where('id_jenis_pajak', 2)->where('validasi','Proses');

        $hiburanDiterima = $tasks->where('id_jenis_pajak', 3)->where('validasi','Diterima');
        $hiburanProses = $tasks->where('id_jenis_pajak', 3)->where('validasi','Proses');

        $parkirDiterima = $tasks->where('id_jenis_pajak', 4)->where('validasi','Diterima');
        $parkirProses = $tasks->where('id_jenis_pajak', 4)->where('validasi','Proses');




        // $parkirDitolak = $tasks->filter(function ($task) {
        //     return $task['validasi'] == 'Ditolak';
        // });
        return view('admin.data-objek-pajak.index',compact('hotelDiterima','hotelProses','restoranDiterima','restoranProses','hiburanDiterima','hiburanProses','parkirDiterima','parkirProses'));
    }
    
}
