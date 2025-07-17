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
    <form action="{{ url ('prodi') }}" method="POST">
    @csrf 
    <input type="hidden" value="">
    <label for="kode">Kode : </label>
    <input type="text" name="kode"  required>
    <br><br>
    <label for="nama">Nama Prodi : </label>
    <input type="text" name="nama"  required>
    <br><br>
    <label for="idkaprodi">Kaprodi : </label>
    <select name="idkaprodi" style="width: 40%;">
    <?php 
    $idkaprodi=1;
    $data=DB::table('dosen')
    ->select('dosen.*')
    ->get();

    foreach($data as $rows){
        if($idkaprodi == $rows->id){
            echo "<option value='". $rows->id."'selected>". $rows->nama."</option>";
        } else{
            echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
        }
    }
    ?>
    </select>
    <br><br>
    <label for="idfakultas">Fakultas : </label>
    <select name="idfakultas" style="width: 40%;">
    <?php 
    $idfakultas=1;
    $data=DB::table('fakultas')
    ->select('fakultas.*')
    ->get();

    foreach($data as $rows){
        if($idfakultas == $rows->id){
            echo "<option value='". $rows->id."'selected>". $rows->nama."</option>";
        } else{
            echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
        }
    }
    ?>
    </select>
    <br><br>

        <button type="submit">Simpan</button>
    </form>    
</body>
</html>