<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Input Mahasiswa </h1>
    <a href ="{{ url ('/')}}"> kembali</a>
<br>
<br>
<br>
<form action="{{ url ('mahasiswa') }}" method="POST">
@csrf 
<label for="nama"> nama: </label> 
<input type="text" name="nama"  required>
<br><br>
 
<label for="nim"> nim: </label> 
<input type="number" name="nim"  required>
<br><br>

<label for="nohp"> nohp: </label> 
<input type="number" name="nohp"  required>
<br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>