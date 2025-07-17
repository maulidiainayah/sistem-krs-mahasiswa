<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> penjumlahan </h1>  
<a href ="{{ url ('/')}}"> kembali </a>
<br>
<br>
<br>
<form action="{{ url ('penjumlahan') }}" method="POST">
@csrf 
<label for="num1"> angka pertama: </label> 
<input type="number" name="num1" id="num1" required>
<br><br>
 
<label for="num2"> angka kedua</label> 
<input type="number" name="num2" id="num2" required>
<br><br>

    <button type="submit">Hitung</button>
</form>

@if(isset($hasil))
<h3>Hasil: {{ $num1 }} + {{ $num2 }} = {{ $hasil }}</h3>
@endif

</body>
</html>