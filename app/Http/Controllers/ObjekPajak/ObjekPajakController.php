<?php

namespace App\Http\Controllers\ObjekPajak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObjekPajakController extends Controller
{
    public function index()
    {
        return view('objek-pajak.index');
    }
    public function create()
    {
        return view('objek-pajak.tambah');
    }
}
