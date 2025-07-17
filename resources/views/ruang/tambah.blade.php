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
    <form action="{{ url ('ruang') }}" method="POST">
    @csrf 
    <input type="hidden" value="">
    <label for="nama">Nama : </label>
    <input type="text" name="nama"  required>
    <br><br>
    <label for="kode"> Kode: </label> 
    <input type="text" name="kode"  required>
    <br><br>
    <label for="kapasitas"> Kapasitas: </label> 
    <input type="number" name="kapasitas"  required>
    <br><br>
        <button type="submit">Simpan</button>
    </form>    
</body>
</html>