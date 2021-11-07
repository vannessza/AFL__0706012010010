
@extends('home')
@section('main_content_home')
<br>
<div class="text-center mb-3"><h2>All Dosen Pa</h2></div>
<br>
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{route('dosenpaHome.index')}}">
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
    @if ($DosenPa->count())
    @foreach($DosenPa as $do)
            <div class="card mr-4 mb-3" style="width: 18rem;">
        <img src="{{asset('storage/'. $do->image)}}"class="card-img-top image_profile" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$do->nama_dosen}}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><img src="{{ url('assets/img/lecturer.png?v=2') }}" class="icon">&nbsp{{$do->jabatan_struktural}}</li>
            <li class="list-group-item"><img src="{{ url('assets/img/university_black.png?v=2') }}" class="icon">&nbsp{{$do->pendidikan_terakhir}}</li>
            <li class="list-group-item"><img src="{{ url('assets/img/university_black.png?v=2') }}" class="icon">&nbsp{{$do->bidang_keahlian}}</li>
        </ul>
        <div class="card-body text-center">
        <a href="{{route('dosenpaHome.show', $do->nik)}}" class="btn btn-primary">Detail</a>
        </div>
        </div>

    @endforeach
    @else
    <p class="text-center fs-4">Not found.</p>
    @endif
    </div>
</div>
{{ $DosenPa->links() }}
@endsection

