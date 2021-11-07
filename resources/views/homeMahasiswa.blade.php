
@extends('home')
@section('main_content_home')
<br>
<div class="text-center mb-3"><h2>All Mahasiswa</h2></div>
<br>
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{route('mahasiswaHome.index')}}">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{request('search')}}">
            <button class="btn btn-outline-secondary  bg-dark" type="submit" id="button-addon2">Search</button>
        </div>
        </form>
    </div>
</div>
<br>

<div class="container">
    <div class="row justify-content-center">
    @if ($Mahasiswa->count())
    @foreach($Mahasiswa as $ma)
            <div class="card mr-4 mb-3" style="width: 18rem;">
        <img src="{{asset('storage/'. $ma->image)}}" class="card-img-top image_profile" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$ma->nama}}</h5>
        </div>
        <ul class="list-group list-group-flush align-items-left">
            <li class="list-group-item"><img src="{{ url('assets/img/date.png?v=2') }}" class="icon">&nbsp{{$ma->angkatan}}</li>
            <li class="list-group-item"><img src="{{ url('assets/img/student.png?v=2') }}" class="icon">&nbsp{{$ma->jurusan}}</li>
            <li class="list-group-item"><img src="{{ url('assets/img/teacher.png?v=2') }}" class="icon">&nbsp{{$ma->DosenPa->nama_dosen }}</li>
        </ul>
        <div class="card-body text-center">
        <a href="{{route('mahasiswaHome.show', $ma->nim)}}" class="btn btn-primary">Detail</a>
        </div>
        </div>

    @endforeach
    @else
    <p class="text-center fs-4">Not found.</p>
    @endif
    </div>
</div>
{{ $Mahasiswa->links() }}
@endsection
