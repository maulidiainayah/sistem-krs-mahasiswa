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
    <form action="{{ url('matkul/' .$rec->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="kode">Kode</label>
            <input type="text" name="kode" value="{{ $rec->kode }}">
                   <br><br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="{{  $rec->nama }}">
        <br><br>
        <label for="jam">Jam</label>
            <input type="time" name="jam" value="{{ $rec->jam }}">
                   <br><br>
        <label for="ruangan">Ruang : </label>
            <select name="idruang" style="width: 40%;">
                   <?php 
                   $idruang=$rec->idruang;
                   $data=DB::table('ruang')
                   ->select('ruang.*')
                   ->get();
               
                   foreach($data as $rows){
                       if($idruang == $rows->id){
                           echo "<option value='". $rows->id."'selected>". $rows->nama."</option>";
                       } else{
                           echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                       }
                   }
                   ?>
                   </select>
                   <br><br>
                   <label for="dosenpj">Dosen : </label>
                   <select name="iddosen" style="width: 40%;">
                          <?php 
                          $iddosen=$rec->iddosen;
                          $data=DB::table('dosen')
                          ->select('dosen.*')
                          ->get();
                      
                          foreach($data as $rows){
                              if($iddosen == $rows->id){
                                  echo "<option value='". $rows->id."'selected>". $rows->nama."</option>";
                              } else{
                                  echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                              }
                          }
                          ?>
                          </select>
                          <br><br>
        <label for="semester">Semester:  </label> 
            <input type="number" name="semester"  required>
            <br><br>
        <button type="submit">edit</button>
</body>
</html>