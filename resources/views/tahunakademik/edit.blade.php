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
    <form action="{{ url('tahunakademik/' .$rec->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Tahun</label>
        <input type="number" name="nama" value="{{  $rec->nama }}">
        <br><br>
        <label for="semester">Semester</label>
            <input type="text" name="semester" value="{{ $rec->semester }}">
                   <br><br>

        <button type="submit">edit</button>
</body>
</html>