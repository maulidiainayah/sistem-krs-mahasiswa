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
<form action="{{ url ('fakultas') }}" method="POST">
@csrf 
<input type="hidden" value="">
<label for="kode">Kode: </label> 
<input type="text" name="kode"  required>
<br><br>
<label for="nama">Nama: </label> 
<input type="text" name="nama" required>
<br><br>
<label for="dekan">Dekan : </label>
<select name="iddekan" style="width: 40%;">
    <?php 
    $iddekan=1;
    $data=DB::table('dosen')
    ->select('dosen.*')
    ->get();

    foreach($data as $rows){
        if($iddekan == $rows->id){
            echo "<option value='". $rows->id."'selected>". $rows->nama."</option>";
        } else{
            echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
        }
    }
    ?>
</select>
<br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>