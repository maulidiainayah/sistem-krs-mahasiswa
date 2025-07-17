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
<form action="{{ url ('dosen') }}" method="POST">
@csrf 
<input type="hidden" value="">
<label for="nama">Nama Dosen: </label>
<input type="text" name="nama"  required>
<br><br>
<label for="jk">Jenis Kelamin : </label>
<select name="idjk" style="width: 40%;">
    <?php 
    $idjk=1;
    $data=DB::table('jk')
    ->select('jk.*')
    ->get();

    foreach($data as $rows){
        if($idjk == $rows->id){
            echo "<option value='". $rows->id."'selected>". $rows->nama."</option>";
        } else{
            echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
        }
    }
    ?>
</select>
<br>
<label for="alamat">Alamat: </label> 
<input type="text" name="alamat"  required>
<br><br>
<label for="agama">Agama : </label>
<select name="idagama" style="width: 40%;">
    <?php 
    $idagama=1;
    $data=DB::table('agama')
    ->select('agama.*')
    ->get();

    foreach($data as $rows){
        if($idagama == $rows->id){
            echo "<option value='". $rows->id."'selected>". $rows->nama."</option>";
        } else{
            echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
        }
    }
    ?>
</select>
<br>
<label for="nohp">Nohp: </label> 
<input type="number" name="nohp"  required>
<br><br>
<label for="prodi">Prodi : </label>
<select name="idprodi" style="width: 40%;">
    <?php 
    $idprodi=1;
    $data=DB::table('prodi')
    ->select('prodi.*')
    ->get();

    foreach($data as $rows){
        if($idprodi == $rows->id){
            echo "<option value='". $rows->id."'selected>". $rows->nama."</option>";
        } else{
            echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
        }
    }
    ?>
</select>
<br>
<label for="fak">Fakultas : </label>
<select name="idfak" style="width: 40%;">
    <?php 
    $idfak=1;
    $data=DB::table('fakultas')
    ->select('fakultas.*')
    ->get();

    foreach($data as $rows){
        if($idfak == $rows->id){
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