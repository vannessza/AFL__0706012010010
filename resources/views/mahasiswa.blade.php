
        @extends('layout.mainlayout')
        @section('title', 'Mahasiswa')

        @section('main_content')
        <div class = "container mt-3 text-center">
            <h1><?=$pageTitle?></h1>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{route('mahasiswa.index')}}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{request('search')}}">
                    <button class="btn btn-outline-secondary  bg-dark" type="submit" id="button-addon2">Search</button>
                </div>
                </form>
            </div>
        </div>
        <br>
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('mahasiswa.create') }}">
                <button class="btn btn-success my-2" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                &nbsp;Create
                </button>
             </a>
        </div>
        <table class="table table-hover ">
             <tr class="bg-dark">
                <th>NO</th>
                <th>NIM</th>
                <th>NAMA</th>
                <th>ANGKATAN</th>
                <th>JURUSAN</th>
                <th>DOSEN PA</th>
                <th>ACTIONS</th>
            </tr>
            @foreach($Mahasiswa as $ma)
            <tr>
                <td class ="number">{{$loop->index+1}}</td>
                <td>{{$ma->nim}}</td>
                <td>{{$ma->nama}}</td>
                <td>{{$ma->angkatan}}</td>
                <td>{{$ma->jurusan}}</td>
                <td>
                  <a href="{{ route('dosenpa.show', $ma->DosenPa->nik) }}">
                      {{ $ma->DosenPa->nama_dosen }}
                 </a>
                </td>
                <td>
                        <form action="{{route('mahasiswa.destroy', $ma->id)}}" method="POST">
                            <a href="{{route('mahasiswa.show', $ma->nim)}}"><button type="button"
                            class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg></button></a>
                            <a href="{{route('mahasiswa.edit', $ma->id)}}"><button type="button"
                            class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg></button></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></button>
                        </form>
                </td>
            </tr>

            @endforeach

        </table>
        {{ $Mahasiswa->links() }}
        </div>
        @endsection
