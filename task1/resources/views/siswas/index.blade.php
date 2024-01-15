@extends('layout.main')
@section('content')

<div class="container">
    {{-- <button type="button" class="btn btn-primary">Tambah Data</button> --}}
    <a href="{{ route('siswa.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIS</th>
            <th scope="col">Nama</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($siswas as $siswa)
            <tr>
                <th >{{ $loop->iteration }}</th>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->name }}</td>
                <td>{{ $siswa->jurusan }}</td>
                <td>
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i> EDIT</a>
                                        
                    <button data-toggle="modal" data-target="#modal-hapu{{ $siswa->id }}s" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> HAPUS</button>
                </td>
            </tr>

            <div class="modal fade" id="modal-hapu{{ $siswa->id }}s">
                <div class="modal-dialog">
                <div class="modal-content bg-secondary">
                    <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>apakah kamu yakin ingin menghapus <b>{{  $siswa->name }}</b></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-light">Ya Hapus</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        @empty
            <div class="alert alert-danger">
                Data belum Tersedia.
            </div>
        @endforelse
        </tbody>
    </table>
</div>

@endsection