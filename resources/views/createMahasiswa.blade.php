
    @extends('layout.mainlayout')
    @section('title', 'Mahasiswa')

    @section('main_content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Masukan Data</h1>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('mahasiswa.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- <div class="form-group">
                        <label for="code">Code:</label>
                        <input type="text" class="form-control" id="code" name="code">
                    </div> -->
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{old('nim')}}" required>
                        @error('nim')
                         <div class="invalid-feedback">
                            {{$message}}
                         </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan:</label>
                        <input type="number" class="form-control" id="angkatan" name="angkatan" value="{{old('angkatan')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan:</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{old('jurusan')}}" required>
                    </div>
                    <div class="form-group">
                        <label>DosenPa: </label>
                        <select name="dosenpa" class="custom-select" required>
                            <option value="" selected disabled hidden>Choose here</option>
                            @foreach ($DosenPa as $do)
                                <option value="{{ $do['nik'] }}">{{ $do['nama_dosen'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" required>
                        @error('email')
                         <div class="invalid-feedback">
                            {{$message}}
                         </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" class="custom-select" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp:</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="{{old('telp')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Post Image</label>
                        <br>
                        <img id="output" class="mb-3 col-sm-5"/>
                        <input class="form-control" type="file" id="imageInp" name="image" onchange="loadFile(event)" required>
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

