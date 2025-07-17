<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Utama</h1>
    <div class="button-container">
    <button onclick="location.href='{{ url('/perkalian') }}'">Perkalian</button>
    <button onclick="location.href='{{ url('/penjumlahan') }}'">Penjumlahan</button> <br>
    <button onclick="location.href='{{ url('/mahasiswa') }}'">Mahasiswa</button> <br>
    <button onclick="location.href='{{ url('/dosen') }}'">Dosen</button> <br>
    <button onclick="location.href='{{ url('/matkul') }}'">Matkul</button> <br>
    <button onclick="location.href='{{ url('/prodi') }}'">Prodi</button> <br>
    <button onclick="location.href='{{ url('/ruang') }}'">Ruang</button> <br>
    <button onclick="location.href='{{ url('/tahunakademik') }}'">Tahun Akademik</button> <br>
    <button onclick="location.href='{{ url('/fakultas') }}'">Fakultas</button> <br>
    </div>
    
</body>
</html>