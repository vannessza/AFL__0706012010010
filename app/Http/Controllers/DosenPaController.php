<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DosenPa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class DosenPaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DosenPa = DosenPa::latest()->filter(request(['search']))->paginate(5);
        return view('dosenPa', [
            "title" => "Dosen Pa",
            "pageTitle" => "Data Dosen Pa"],
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
        $validated = $request->validate([
            'nik' => 'required | unique:dosen_pas,nik',
            'email' => 'required | unique:dosen_pas,email'
        ]);
        DosenPa::create([
            'nik' => $request->nik,
            'nama_dosen' => $request->nama_dosen,
            'jabatan_struktural' => $request->jabatan_struktural,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'bidang_keahlian'=> $request->bidang_keahlian,
            'email'=> $request->email,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'gender'=> $request->gender,
            'alamat'=>$request->alamat,
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

        $DosenPa = DosenPa::findOrfail($id);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
        }
        $DosenPa->update([
            'nik' => $request->nik,
            'nama_dosen' => $request->nama_dosen,
            'jabatan_struktural' => $request->jabatan_struktural,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'bidang_keahlian'=> $request->bidang_keahlian,
            'email'=> $request->email,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'gender'=> $request->gender,
            'alamat'=>$request->alamat,
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
        if($DosenPa->image){
            Storage::delete($DosenPa->image);
        }
        return redirect(route('dosenpa.index'));
    }
}
