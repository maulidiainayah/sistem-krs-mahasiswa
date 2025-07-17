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
    <form action="{{ url('fakultas/' .$rec->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="kode">Kode</label>
            <input type="text" name="kode" value="{{ $rec->kode }}">
                   <br><br>
        <label for="nama">Nama</label>
            <input type="text" name="nama" value="{{ $rec->nama }}">
                   <br><br>
        <label for="dekan">Dekan : </label>
            <select name="iddekan" style="width: 40%;">
                <?php 
                 $iddekan=$rec->iddekan;
                 $data=DB::table('dosen')
                 ->select('dosen.*')
                 ->get();
                                        
                 foreach($data as $rows){
                    if($iddekan == $rows->id){
                        echo "<option selected='selected' value='". $rows->id. "'>". $rows->nama. "</option>";
                        } else{
                        echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                        }
                           }
                       ?>
                   </select><br><br>

        <button type="submit">edit</button>
</body>
</html>