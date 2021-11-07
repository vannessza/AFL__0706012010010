    @extends('layout.mainlayout')
    @section('title', 'Home')

    @section('main_content')
    <div class="jumbotron text-center ">
        <h1>Welcome To My Web</h1>
        <p>is a website to record Mahasiswa and Dosen Pa</p>
        <a href="{{ route('mahasiswa.create') }}">
                <button class="btn btn-success my-2" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                &nbsp;Mahasiswa
                </button>
        </a>
        <a href="{{ route('dosenpa.create') }}">
                <button class="btn btn-outline-success my-2" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                &nbsp;Dosen PA
                </button>
        </a>
    </div>
    <div class="card text-center">
    <div class="card-header bg-dark ">
        <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
        <a class="nav-link {{($pageTitle=='Mahasiswa Home'?'active':'')}}"
                href="{{route('mahasiswaHome.index')}}">Mahasiswa</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{($pageTitle=='Dosen Pa Home'?'active':'')}}"
                href="{{route('dosenpaHome.index')}}">Dosen PA</a>
        </li>
        </ul>
    </div>
    <div class="card-body">
        @yield("main_content_home")
    </div>
    </div>
    @endsection
