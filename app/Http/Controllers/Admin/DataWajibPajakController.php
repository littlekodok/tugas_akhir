<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\WajibPajak;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class DataWajibPajakController extends Controller
{
    public function index()
    {
       
        return view('admin.data-wajib-pajak.index');
    }
    public function dataWajibPajakJson()
    {
        $query = WajibPajak::where('verifikasi','=','0');

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('validasi', function ($data){
                            return '<a href="javascript:void(0);" class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i></a>';
                        })
                        ->editColumn('jenis_usaha', function ($data) {
                            return $data->jenis_usaha == '1' ? 'Pribadi' : 'Badan Usaha';
                        })
                        ->rawColumns(['validasi'])
                        ->make(true);
    }
}

