<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DosenPa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DosenPaHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DosenPa = DosenPa::latest()->filter(request(['search']))->paginate(9);
        return view('homeDosenPa', [
            "title" => "home",
            "pageTitle" => "Dosen Pa Home"],
            compact('DosenPa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createDosenPa',[
            'title' => 'Dosen Pa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DosenPa::create([
            'nik' => $request->nik,
            'nama_dosen' => $request->nama_dosen,
            'jabatan_struktural' => $request->jabatan_struktural,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'bidang_keahlian'=> $request->bidang_keahlian,
            'email'=> $request->email,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'telp'=> $request->telp,
            'image'=>$request->file('image')->store('post-images-dosenpa')
        ]);
        return redirect(route('dosenpa.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        return view('showDosenPa', [
            "title"=> "Dosen Pa",
            "pageTitle"=> "Detail Dosen Pa",
            "DosenPa"=>DosenPa::where('nik', $code)
            ->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $DosenPa = DosenPa::findOrfail($id);
        return view('editDosenPa', [
            'title'=> 'Dosen Pa'
        ], compact('DosenPa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nik = Str::upper(Str::substr($request->nama_dosen, 0, 3));
        $DosenPa = DosenPa::findOrfail($id);
        $DosenPa->update([
            'nik'=> $nik,
            'nama_dosen' => $request->nama_dosen,
            'jabatan_struktural' => $request->jabatan_struktural,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'bidang_keahlian'=> $request->bidang_keahlian,
            'email'=> $request->email,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'telp'=> $request->telp,
            'image'=>$request->file('image')->store('post-images-dosenpa')
        ]);
        return redirect(route('dosenpa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DosenPa = DosenPa::findOrfail($id);
        $DosenPa->delete();
        return redirect(route('dosenpa.index'));
    }
}
