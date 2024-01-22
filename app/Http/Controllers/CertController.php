<?php

namespace App\Http\Controllers;

use App\Models\Cert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use File;
use Response;
use Alert;

class CertController extends Controller
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
        return view('cert.index', compact('cert'));
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

    public function download($qrcode)
    {
        $filepath = public_path('images/qr/'.$qrcode);
        return Response()->download($filepath);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $fileName = Str::random(10).'.'.$request->file->extension();
        $id = $request->get('id');
        $kode = $request->get('kode');
   
        $request->file->move(public_path('file_upload'), $fileName);

        $data = [
            'file' => $fileName,
        ];

        $cert = Cert::findorfail($id);

        if($cert->update($data)) {
            Alert::success('Berhasil', 'Upload File Berhasil');
        } else {
            Alert::error('Gagal', 'Upload File Gagal');
        }

        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kode = $request->get('kode');
        $text = url("cekvalid/dokumen/{$kode}");
        // dd($text);
        $qrcode = QrCode::size(300)
            ->format('png')
            ->eye('square')
            ->style('round')
            ->merge('/public/images/core/sci-suput.png', .3)
            ->generate($text, public_path('images/qr/'.$kode.'.png'));

        $data = [
            'kode' => $kode,
            'no_surat' => $request->get('no_surat'),
            'perihal' => $request->get('perihal'),
            'penandatangan' => $request->get('penandatangan'),
            'jabatan' => $request->get('jabatan'),
            'mengetahui' => $request->get('mengetahui'),
            'jabatan_mengetahui' => $request->get('jabatan_mengetahui'),
            'qrcode' => $request->get('kode').'.png',
            'tipe' => 'Cert',
        ];
        $insert = Cert::create($data);

        if($insert) {
            Alert::success('Berhasil', 'Data Qr Code Berhasil Ditambahkan');
        } else {
            Alert::error('Gagal', 'Data Qr Code Gagal Ditambahkan');
        }

        return redirect()->back();
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
    public function update(Request $request, $id)
    {
        $update = Cert::findorfail($id);

        if($update->update($request->all())) {
            Alert::success('Berhasil', 'Data Berhasil Diupdate');
        } else {
            Alert::error('Gagal', 'Data Gagal Diupdate');
        }

        return redirect()->back();
    }

    public function remove($id)
    {
        $data = Cert::findorfail($id);
        // dd($data);
        $update = $data->update([
            'file' => "",
        ]);

        if (File::exists(public_path('file_upload/'.$data->file))) {
            File::delete(public_path('file_upload/'.$data->file));
        }

        if ($update) {
            Alert::success('Berhasil', 'File Berhasil Dihapus');
        }else {
            Alert::error('Gagal', 'File Gagal Dihapus');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cert  $cert
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cert = Cert::where('id', $id)->firstOrFail();

        if($cert->delete()) {
            Alert::success('Berhasil', 'Data Berhasil Dihapus');
        } else {
            Alert::error('Gagal', 'Data Gagal Dihapus');
        }
        return redirect()->back();
    }
}
