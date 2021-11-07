
    @extends('layout.mainlayout')
    @section('title', 'Dosen PA')

    @section('main_content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Masukan Data</h1>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('dosenpa.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- <div class="form-group">
                        <label for="code">Code:</label>
                        <input type="text" class="form-control" id="code" name="code">
                    </div> -->
                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{old('nik')}}" required>
                        @error('nim')
                         <div class="invalid-feedback">
                            {{$message}}
                         </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_dosen">Nama Dosen:</label>
                        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="{{old('nama_dosen')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_struktural">Jabatan Struktural:</label>
                        <input type="text" class="form-control" id="jabatan_struktural" name="jabatan_struktural" value="{{old('jabatan_struktural')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="bidang_keahlian">Bidang Keahlian:</label>
                        <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" value="{{old('bidang_keahlian')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan Terakhir:</label>
                        <select name="pendidikan_terakhir" class="custom-select" required>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
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
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}"required>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp:</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="{{old('telp')}}"required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Post Image</label>
                        <br>
                        <img id="output" class="mb-3 col-sm-5"/>
                        <input class="form-control" type="file" id="imageInp" name="image" onchange="loadFile(event)"required>
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

