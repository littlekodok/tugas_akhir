<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataObjekPajakController extends Controller
{
    public function dataObjekPajak()
    {
        return view('admin.data-objek-pajak.index');
    }
}
