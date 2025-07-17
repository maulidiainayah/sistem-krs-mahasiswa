@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Daftar Jadwal Perkuliahan</h2>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Jadwal</a>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('jadwal.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Hari</label>
                            <select name="idhari" class="form-select">
                                @foreach ($hari as $nama_hari)
                                    <option value="{{$nama_hari->id}}">{{$nama_hari->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruangan</label>
                            <select name="idruangan" class="form-select">
                                @foreach ($ruangan as $nama_ruangan)
                                    <option value="{{$nama_ruangan->id}}">{{$nama_ruangan->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Akademik</label>
                            <select name="idta" class="form-select">
                                @foreach ($ta as $nama_ta)
                                    <option value="{{$nama_ta->id}}">{{$nama_ta->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sesi</label>
                            <select name="sesi" class="form-select">
                                @foreach ($sesi as $nama_sesi)
                                    <option value="{{$nama_sesi->id}}">{{$nama_sesi->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dosen</label>
                            <select name="iddosen" class="form-select">
                                @foreach ($dosen as $nama_dosen)
                                    <option value="{{$nama_dosen->id}}">{{$nama_dosen->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mata Kuliah</label>
                            <select name="idmatkul" class="form-select">
                                @foreach ($matkul as $nama_matkul)
                                    <option value="{{$nama_matkul->id}}">{{$nama_matkul->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <input name="kelas" type="text" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Ruangan</th>
                    <th>Tahun Akademik</th>
                    <th>Sesi</th>
                    <th>Dosen</th>
                    <th>Mata Kuliah</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwallist as $jadwal)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $jadwal->nama_hari }}</td>
                        <td>{{ $jadwal->nama_ruangan }}</td>
                        <td>{{ $jadwal->nama_ta }}</td>
                        <td>{{ $jadwal->sesi }}</td>
                        <td>{{ $jadwal->nama_dosen }}</td>
                        <td>{{ $jadwal->nama_matkul }}</td>
                        <td>{{ $jadwal->kelas }}</td>
                        <td class="text-center">
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection