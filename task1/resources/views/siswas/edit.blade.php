@extends('layout.main')
@section('content')

    <div class="container">
        <div class="card">
        <form action="{{ route('siswa.update', $siswa['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('Patch')

            <div class="card-body">
                <div class="form-group">
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Masukkan Nama Anda" value="{{ old('name', $siswa->name) }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">NIS</label>
                    <input type="integer" class="form-control" id="exampleInputPassword1" name="nis" placeholder="Masukkan NIS Anda" value="{{ old('nis', $siswa->nis) }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="jurusan" placeholder="Masukkan jurusan Anda" value="{{ old('jurusan', $siswa->jurusan) }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>

@endsection