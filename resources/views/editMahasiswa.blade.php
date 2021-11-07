
    @extends('layout.mainlayout')
    @section('title', 'Mahasiswa')

    @section('main_content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Masukan Data</h1>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('mahasiswa.update', $Mahasiswa->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- <div class="form-group">
                        <label for="code">Code:</label>
                        <input type="text" class="form-control" id="code" name="code">
                    </div> -->
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="{{$Mahasiswa->nim}}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama"  value="{{$Mahasiswa->nama}}" required>
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan:</label>
                        <input type="number" class="form-control" id="angkatan" name="angkatan"  value="{{$Mahasiswa->angkatan}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan:</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan"  value="{{$Mahasiswa->jurusan}}" required>
                    </div>
                    <div class="form-group d-grid">
                            <label>Dosen PA:</label>
                            <select name="dosenpa" class="custom-select">
                                @foreach ($DosenPa as $do)
                                @if ($do['nik'] == $Mahasiswa['dosenpa'])
                                    <option value="{{ $do['nik'] }}" selected>{{ $do['nama_dosen'] }}
                                    </option>
                                @else
                                    <option value="{{  $do['nik'] }}">{{ $do['nama_dosen'] }}</option>
                                @endif
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email"  value="{{$Mahasiswa->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"  value="{{$Mahasiswa->tempat_lahir}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"  value="{{$Mahasiswa->tanggal_lahir}}" required>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" class="custom-select" required>
                            <option hidden value="{{ $Mahasiswa->gender }}">
                                {{ $Mahasiswa->gender }}
                            </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$Mahasiswa->alamat}}">
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp:</label>
                        <input type="text" class="form-control" id="telp" name="telp"  value="{{$Mahasiswa->telp}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Post Image</label>
                        <input type="hidden" name="oldImage" value="{{ $Mahasiswa->image }}">
                        <br>
                        <img src="{{asset('storage/'.$Mahasiswa->image)}}" id="output" class="mb-3 col-sm-5"/>
                        <input class="form-control" type="file" id="imageInp" name="image" onchange="loadFile(event)">
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

