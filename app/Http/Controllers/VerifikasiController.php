<?php

namespace App\Http\Controllers;

use App\Models\Cert;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('testverif');
    }

    public function dokumen($kode)
    {
        $data = Cert::where('kode', $kode)->first();
        return view('verifikasi', compact('data'));
    }

    public function dokumen_download($file)
    {
        $filepath = public_path('file_upload/'.$file);
        return Response()->download($filepath);
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
