<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\DosenPa;
use Illuminate\Support\Facades\DB;
class MahasiswaHomeController extends Controller
{
    public function index()
    {

        $DosenPa = DosenPa::all();
        $Mahasiswa = Mahasiswa::latest()->filter(request(['search']))->paginate(9);
        return view('homeMahasiswa', [
            "title" => "home",
            "pageTitle" => "Mahasiswa Home"],
            compact('DosenPa','Mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $DosenPa = DosenPa::all();
        return view('createMahasiswa',[
            'title' => 'Mahasiswa'
        ], compact('DosenPa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image'=>'image|file|max:1024'
        ]);
        Mahasiswa::create([
            'nim'=> $request->nim,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'jurusan' => $request->jurusan,
            'dosenpa' => $request->dosenpa,
            'email'=> $request->email,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'telp'=> $request->telp,
            'image'=>$request->file('image')->store('post-images')

        ]);
        return redirect(route('mahasiswa.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {

        return view('showMahasiswa', [
            "title"=> "Mahasiswa",
            "pageTitle"=> "Detail Mahasiswa",
            "Mahasiswa"=>Mahasiswa::where('nim', $nim)
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
        $Mahasiswa = Mahasiswa::findOrfail($id);
        $DosenPa = DosenPa::all();
        return view('editMahasiswa', [
            'title'=> 'Mahasiswa'
        ], compact('Mahasiswa', 'DosenPa'));
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
        $Mahasiswa = Mahasiswa::findOrfail($id);
        $Mahasiswa->update([
            'nim'=> $request->nim,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'jurusan' => $request->jurusan,
            'dosenpa' => $request->dosenpa,
            'email'=> $request->email,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'telp'=> $request->telp,
            'image'=>$request->file('image')->store('post-images-mahasiswa')
        ]);
        return redirect(route('mahasiswa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Mahasiswa = Mahasiswa::findOrfail($id);
        $Mahasiswa->delete();
        return redirect(route('mahasiswa.index'));
    }
}
