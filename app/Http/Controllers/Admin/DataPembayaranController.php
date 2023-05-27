<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPembayaranController extends Controller
{
    public function dataPembayaran()
    {
        return view('admin.data-pembayaran.index');
    }
}
