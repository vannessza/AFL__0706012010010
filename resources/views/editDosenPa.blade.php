
    @extends('layout.mainlayout')
    @section('title', 'Dosen PA')

    @section('main_content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Masukan Data</h1>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('dosenpa.update', $DosenPa->nik)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- <div class="form-group">
                        <label for="code">Code:</label>
                        <input type="text" class="form-control" id="code" name="code">
                    </div> -->
                    <input type="hidden" name="nik" value="{{$DosenPa->nik}}">
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="number" class="form-control" id="nik" name="nik" value="{{$DosenPa->nik}}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_dosen">Nama Dosen:</label>
                        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="{{$DosenPa->nama_dosen}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_struktural">Jabatan Struktural:</label>
                        <input type="text" class="form-control" id="jabatan_struktural" name="jabatan_struktural" value="{{$DosenPa->jabatan_struktural}}" required>
                    </div>
                    <div class="form-group">
                        <label for="bidang_keahlian">Bidang Keahlian:</label>
                        <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" value="{{$DosenPa->bidang_keahlian}}" required>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan Terakhir:</label>
                        <select name="pendidikan_terakhir" class="custom-select" required>
                            <option hidden value="{{ $DosenPa->pendidikan_terakhir }}">
                                {{ $DosenPa->pendidikan_terakhir }}
                            </option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email"value="{{$DosenPa->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$DosenPa->tempat_lahir}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$DosenPa->tanggal_lahir}}" required>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" class="custom-select" value="{{$DosenPa->gender}}" required>
                            <option hidden value="{{ $DosenPa->gender }}">
                                {{ $DosenPa->gender }}
                            </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$DosenPa->alamat}}"required>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp:</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="{{$DosenPa->telp}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Post Image</label>
                        <input type="hidden" name="oldimage" value="{{$DosenPa->image}}">
                        <br>
                        <img src="{{asset('storage/'.$DosenPa->image)}}" id="output" class="mb-3 col-sm-5"/>
                        <input class="form-control" type="file" id="imageInp" name="image" onchange="loadFile(event)" value="{{$DosenPa->image}}">
                    </div>
                    <br>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    @endsection

