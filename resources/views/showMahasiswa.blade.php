@extends('layout.mainlayout')

@section('title', 'Mahasiswa')
@section('pagetitle', 'Detail Project')

@section('main_content')
    <div class="mt-4 rounded">
        <h1 class="text-center mb-3">{{ $Mahasiswa['nama'] }}</h1>
    </div>
    <div class="card">
        <div class="card-header bg-dark" style="color: white;">
            Detail
        </div>
        <div class="card-body">
            <div class="card-group">
                <div class="card mr-5 details_card">
                <img src="{{asset('storage/'. $Mahasiswa->image)}}" alt="" class="image_details">
                </div>
                <div class="card ml-5 mr-2" style="max-width: 150px;">
                    <div class="card-body">
                        <p  class="card-text">NIM: </p>
                        <p  class="card-text">Angkatan: </p>
                        <p class="card-text">Jurusan: </p>
                        <p class="card-text">Dosen Pa: </p>
                        <p class="card-text">Email: </p>
                        <p class="card-text">Tanggal lahir: </p>
                        <p class="card-text">Gender: </p>
                        <p class="card-text">Alamat: </p>
                        <p class="card-text">Telp: </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{$Mahasiswa['nim']}}</p>
                        <p class="card-text">{{ $Mahasiswa['angkatan'] }}</p>
                        <p class="card-text">{{$Mahasiswa['jurusan'] }}</p>
                        <p class="card-text"><a href="{{ route('dosenpa.show', $Mahasiswa->DosenPa->nik) }}">
                        {{ $Mahasiswa->DosenPa->nama_dosen }}
                        </a></p>
                        <p class="card-text">{{$Mahasiswa['email']}}</p>
                        <p class="card-text">{{$Mahasiswa['tempat_lahir']}}, {{$Mahasiswa['tanggal_lahir']}}</p>
                        <p class="card-text">{{$Mahasiswa['gender']}}</p>
                        <p class="card-text">{{$Mahasiswa['alamat']}}</p>
                        <p class="card-text">{{$Mahasiswa['telp']}}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
@endsection
