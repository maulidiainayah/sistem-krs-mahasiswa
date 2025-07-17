<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Rencana Studi (KRS)</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h2 style="text-align: left; margin-left: 20px;">Mahasiswa: {{ $mahasiswa->nama ?? 'Tidak ditemukan' }}</h2>

    <h1 style="text-align: center;">KARTU RENCANA STUDI (KRS)</h1>

    <div style="text-align: center; margin-bottom: 20px;">
        <button onclick="location.href='{{ url('krs/create') }}'">Tambah Mata Kuliah</button>
        <button onclick="location.href='{{ url('/') }}'">Home</button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered" style="width: 100%; text-align: center;">
        <thead>
            <tr style="background-color: #6a5acd; color: white;">
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Semester</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($krs as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->matkul }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>
                        <a href="{{ route('krs.edit', $item->idkrs) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('krs.destroy', $item->idkrs) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus mata kuliah ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Mahasiswa tidak ditemukan atau belum mengambil KRS.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
