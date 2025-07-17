<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $judul }}</title>
</head>
<body>
    <h1>{{ $judul }}</h1>
    <div class="action-links" style="text-align: center; margin-bottom: 20px;">
        <button onclick="location.href='{{ url('jadwal/create') }}'">Tambah Data Jadwal</button><br>
        <button onclick="location.href='{{ url('/') }}'">Home</button>
    </div>
    <br><br>
    <!-- Filter Tahun Akademik -->
    <div class="filter-container" style="text-align: center; margin-bottom: 20px;">
        <form method="GET" action="{{ route('jadwal.index') }}">
            <label for="tahun_akademik">Tahun Akademik:</label>
            <select name="tahun_akademik" id="tahun_akademik" onchange="this.form.submit()">
                @foreach ($tahunAkademikList as $id => $nama)
                    <option value="{{ $id }}" {{ $id == $tahunAkademikId ? 'selected' : '' }}>
                        {{ $nama }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Mata Kuliah</th>
                <th>sks</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Dosen</th>
                <th>Kelas</th>
                <th>Ruang</th>
                <th>Prodi</th>
                <th>Aksi</th>
                </tr>
            </thead>
     <tbody> 
            @foreach ($data as $index =>$value)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $value->hari }}</td>
                <td>{{ $value->matkul }}</td>
                <td>{{ $value->sks }}</td>
                <td>{{ $value->mulai }}</td>
                <td>{{ $value->selesai }}</td>
                <td>{{ $value->dosen }}</td>
                <td>{{ $value->ruangan }}</td>
                <td>{{ $value->kelas }}</td>
                <td>{{ $value->prodi }}</td>
                <td>

                    <a href="{{ url('jadwal/' . $value->id . '/edit') }}">edit</a> |
                    <form action="{{ url('jadwal/' . $value->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer;">delete</button>
                    </form>
                </td>
            </tr> 
            @endforeach
    </tbody>
</table> 
</body>
</html>