<?php

namespace App\Http\Controllers;

use App\Models\Cert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use File;
use Response;
use Alert;

class RoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cert = Cert::where('tipe','Cert')->orderBy('created_at', 'DESC')->get();
        // $kode = Str::random(10);
        // dd($kode);
        return view('roa.index', compact('cert'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cert  $cert
     * @return \Illuminate\Http\Response
     */
    public function show(Cert $cert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cert  $cert
     * @return \Illuminate\Http\Response
     */
    public function edit(Cert $cert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cert  $cert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cert $cert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cert  $cert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cert $cert)
    {
        //
    }
}
