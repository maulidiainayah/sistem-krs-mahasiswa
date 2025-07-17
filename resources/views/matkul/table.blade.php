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
        <button onclick="location.href='{{ url('matkul/create') }}'">Tambah Data Matkul</button><br>
        <button onclick="location.href='{{ url('/') }}'">Home</button>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jam</th>
                <th>Ruang</th>
                <th>Dosen</th>
                <th>Semester</th>
                <th>Aksi</th>
                </tr>
            </thead>
     <tbody> 
        @foreach ($data as $index => $value)
        <tr>
                <td>{{ $index + 1 }}</td> 
                <td>{{ $value->kode }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->jam }}</td>
                <td>{{ $value->ruangan }}</td>
                <td>{{ $value->dosenpj }}</td>
                <td>{{ $value->semester }}</td>
                <td>
                    <a href="{{ url('matkul/' . $value->id . '/edit') }}">edit</a> |
                        <form action="{{ url('matkul/' . $value->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer;">delete</button>
                        </form>
                </td>
            @endforeach
        </tr> 
    </tbody>
</table> 
</body>
</html>