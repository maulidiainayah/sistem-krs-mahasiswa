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
        <button onclick="location.href='{{ url('prodi/create') }}'">Tambah Data Prodi</button><br>
        <button onclick="location.href='{{ url('/') }}'">Home</button>
    </div>
    <div class="table-container">
        <table>
            <thead>
            <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Prodi</th>
            <th>Kaprodi</th>
            <th>Fakultas</th>
            <th>Aksi</th>
            </tr>
        </thead>
     <tbody>
            @php $no=1; @endphp 
            @foreach ($data as $value)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $value->kode }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->namakaprodi }}</td>
                <td>{{ $value->fak }}</td>
                <td>
                    <a href="{{ url('prodi/' .$value->id. '/edit') }}">edit</a> |
                    <form action="{{ ('prodi/' .$value->id ) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer;">delete</button>
                    </form>
                </th>
            </tr> 
            @endforeach
        </tr> 
    </tbody>
</table> 
</body>
</html>