@extends('layout.mainlayout')

@section('title', 'Dosen Pa')
@section('pagetitle', 'Detail Project')

@section('main_content')
<div class="mt-4 rounded">
        <h1 class="text-center mb-3">{{ $DosenPa['nama_dosen'] }}</h1>
    </div>
    <div class="card">
        <div class="card-header bg-dark" style="color: white;">
            Detail
        </div>
        <div class="card-body">
            <div class="card-group">
                <div class="card mr-5 details_card" >
                <img src="{{asset('storage/'. $DosenPa->image)}}" alt="" class="image_details">
                </div>
                <div class="card ml-5 mr-2" style="max-width: 200px;">
                    <div class="card-body">
                        <p class="card-text">Nik: </p>
                        <p class="card-text">Jabatan Struktural: </p>
                        <p class="card-text">Pendidikan Terakhir: </p>
                        <p class="card-text">Bidang Keahlian: </p>
                        <p class="card-text">Email: </p>
                        <p class="card-text">Tanggal lahir: </p>
                        <p class="card-text">Gender: </p>
                        <p class="card-text">Alamat: </p>
                        <p class="card-text">Telp: </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{$DosenPa['nik'] }}</p>
                        <p class="card-text">{{$DosenPa['jabatan_struktural'] }}</p>
                        <p class="card-text">{{$DosenPa['pendidikan_terakhir']}}</p>
                        <p class="card-text">{{$DosenPa['bidang_keahlian']}}</p>
                        <p class="card-text">{{$DosenPa['email']}}</p>
                        <p class="card-text">{{$DosenPa['tempat_lahir']}}, {{$DosenPa['tanggal_lahir']}}</p>
                        <p class="card-text">{{$DosenPa['gender']}}</p>
                        <p class="card-text">{{$DosenPa['alamat']}}</p>
                        <p class="card-text">{{$DosenPa['telp']}}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="card text-center mt-4">

             <div class="card-header bg-dark" style="color: white;">
                List Mahasiswa
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                    @foreach($DosenPa->Mahasiswa as $ma)
                        <div class="card mr-4 mb-3 list_mahasiswa">
                            <img src="{{asset('storage/'. $ma->image)}}" class="card-img-top image_profile" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$ma->nama}}</h5>
                            </div>
                            <ul class="list-group list-group-flush align-items-left">
                                <li class="list-group-item"><img src="{{ url('assets/img/date.png?v=2') }}" width="20px">&nbsp{{$ma->angkatan}}</li>
                                <li class="list-group-item"><img src="{{ url('assets/img/student.png?v=2') }}" width="20px">&nbsp{{$ma->jurusan}}</li>
                                <li class="list-group-item"><img src="{{ url('assets/img/teacher.png?v=2') }}" width="20px">&nbsp{{ $ma->DosenPa->nama_dosen }}</li>
                            </ul>
                            <div class="card-body text-center">
                            <a href="{{route('mahasiswaHome.show', $ma->nim)}}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
