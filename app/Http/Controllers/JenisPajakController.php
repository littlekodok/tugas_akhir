<?php

namespace App\Http\Controllers;

use App\Models\JenisPajak;
use App\Http\Requests\StoreJenisPajakRequest;
use App\Http\Requests\UpdateJenisPajakRequest;

class JenisPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJenisPajakRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisPajakRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPajak  $jenisPajak
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPajak $jenisPajak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPajak  $jenisPajak
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPajak $jenisPajak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisPajakRequest  $request
     * @param  \App\Models\JenisPajak  $jenisPajak
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisPajakRequest $request, JenisPajak $jenisPajak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPajak  $jenisPajak
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPajak $jenisPajak)
    {
        //
    }
}
