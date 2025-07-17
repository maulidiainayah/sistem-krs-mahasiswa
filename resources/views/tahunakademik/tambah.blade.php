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
    <form action="{{ url ('tahunakademik') }}" method="POST">
    @csrf 
    <input type="hidden" value="">
    <label for="nama">Tahun : </label>
    <input type="number" name="nama"  required>
    <br><br>
    <label for="semester"> Semester: </label> 
    <input type="text" name="semester"  required>
    <br><br>
    <label for="status"> Status: </label>
    <select name="status" required>
    <option value="1">Aktif</option>
    <option value="0">Tidak Aktif</option>
    </select>
    <br><br>
        <button type="submit">Simpan</button>
    </form>    
</body>
</html>