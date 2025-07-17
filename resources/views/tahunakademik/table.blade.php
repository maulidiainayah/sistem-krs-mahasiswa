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
        <button onclick="location.href='{{ url('tahunakademik/create') }}'">Tambah Tahun Akademik</button><br>
        <button onclick="location.href='{{ url('/') }}'">Home</button>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Aksi</th>
                </tr>
            </thead>
     <tbody> 
            <tr>
                @php
                    $rec = DB::table('tahunakademik')
                    ->get();
                @endphp
            @foreach ($rec as $index =>$value)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->semester }}</td>
                <td>
                @if ($value->status == 1)
                    <span style="color: green; font-weight: bold;">Aktif</span>
                @else
                    <span style="color: red;">Tidak Aktif</span>
                @endif
                </td>
                <td>
                    <a href="{{ url('tahunakademik/' . $value->id . '/edit') }}">edit</a> |
                    <form action="{{ url('tahunakademik/' . $value->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer;">delete</button>
                    </form>
                </td>
            </tr> 
            @endforeach
            </tr> 
    </tbody>
</table> 
</body>
</html>