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
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-primary">EDIT</a>
                                        
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-hapu{{ $siswa->id }}s">
                        Hapus
                      </button>
                </td>
            </tr>

              
              <!-- Modal -->
              <div class="modal fade" id="modal-hapu{{ $siswa->id }}s" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>apakah kamu yakin ingin menghapus <b>{{  $siswa->name }}</b></p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ya Hapus</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>

            <div class="modal fade" id="">
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