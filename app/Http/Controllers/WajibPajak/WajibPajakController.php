<?php

namespace App\Http\Controllers\WajibPajak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WajibPajakController extends Controller
{
    public function index()
    {
        return view('wajib-pajak.index');
    }
}
