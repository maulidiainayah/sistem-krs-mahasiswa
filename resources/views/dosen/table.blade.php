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
    <button onclick="location.href='{{ url('dosen/create') }}'">Tambah Data Dosen</button><br>
    <button onclick="location.href='{{ url('/') }}'">Home</button>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>NoHP</th>
                <th>Prodi</th>
                <th>Fakultas</th>
                <th>Aksi</th>
                </tr>
            </thead>
     <tbody> 
        @foreach ($data as $index => $value)
        <tr>
            <td>{{ $index + 1 }}</td> 
            <td>{{ $value->nama }}</td>
            <td>{{ $value->namajk }}</td> 
            <td>{{ $value->alamat }}</td>
            <td>{{ $value->agamadsn }}</td>
            <td>{{ $value->nohp }}</td>
            <td>{{ $value->prodidsn }}</td>
            <td>{{ $value->fak }}</td>
            <td>
                    <a href="{{ url('dosen/' .$value->id. '/edit') }}">edit</a> |
                    <form action="{{ ('dosen/' .$value->id ) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer;">delete</button>
                    </form>
            @endforeach
        </tr> 
    </tbody>
</table>
</body>
</html>