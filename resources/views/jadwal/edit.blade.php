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
    <form action="{{ url('jadwal/' .$rec->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="idta">Tahun Akademik :</label>
        <select name="ta" style="width: 40%;">
            <?php
            $ta=$rec->idta;
            $data=DB::table('tahunakademik')
            ->select('tahunakademik.*')
            ->get();

            foreach($data as $rows) {
                if($ta == $rows->id) {
                 echo "<option selected='selected' value='". $rows->id. "'>". $rows->nama. "</option>";
                } else{
                    echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                }
                }   
            ?>
        </select><br><br>
        <label for="idhari">Hari :</label>
        <select name="hari" style="width: 40%;">
            <?php
            $hari=$rec->idhari;
            $data=DB::table('hari')
            ->select('hari.*')
            ->get();

            foreach($data as $rows) {
                if($hari == $rows->id) {
                 echo "<option selected='selected' value='". $rows->id. "'>". $rows->nama. "</option>";
                } else{
                    echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                }
                }   
            ?>
        </select><br><br>
        <label for="idmatkul">Mata Kuliah :</label>
        <select name="matkul" style="width: 40%;">
            <?php
            $matkul=$rec->idmatkul;
            $data=DB::table('matkul')
            ->select('matkul.*')
            ->get();

            foreach($data as $rows) {
                if($matkul == $rows->id) {
                 echo "<option selected='selected' value='". $rows->id. "'>". $rows->nama. "</option>";
                } else{
                    echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                }
                }   
            ?>
        </select><br><br>
        <label for="sks">sks: </label>
        <input type="number" name="sks" value="{{ $rec->sks }}">
               <br><br>
        <label for="idsesi">Sesi :</label>
        <select name="sesi" style="width: 40%;">
            <?php 
            $sesi=$rec->idsesi;
            $data=DB::table('sesi')
            ->select('sesi.*')
            ->get();
    
            foreach($data as $rows) {
                if($sesi == $rows->id) {
                    echo "<option value='". $rows->id. "'selected>". $rows->jam_mulai."</option>";
                } else{
                    echo "<option value='". $rows->id. "'>". $rows->jam_mulai. "</option>";
                }
            }
            ?>
        </select>
        <br><br>
        <label for="iddosen">Dosen :</label>
        <select name="dosen" style="width: 40%;">
            <?php
            $dosen=$rec->iddosen;
            $data=DB::table('dosen')
            ->select('dosen.*')
            ->get();

            foreach($data as $rows) {
                if($dosen == $rows->id) {
                 echo "<option selected='selected' value='". $rows->id. "'>". $rows->nama. "</option>";
                } else{
                    echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                }
                }   
            ?>
        </select><br><br>
        <label for="kelas">Kelas :</label>
            <input type="text" name="kelas" value="{{ $rec->kelas }}">
                   <br><br>
        <label for="idruang">Ruang :</label>
        <select name="ruangan" style="width: 40%;">
            <?php
            $ruangan=$rec->idruang;
            $data=DB::table('ruang')
            ->select('ruang.*')
            ->get();

            foreach($data as $rows) {
                if($ruangan == $rows->id) {
                 echo "<option selected='selected' value='". $rows->id. "'>". $rows->nama. "</option>";
                } else{
                    echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                }
                }   
            ?>
        </select><br><br>
        <label for="idprodi">Prodi :</label>
        <select name="prodi" style="width: 40%;">
            <?php
            $prodi=$rec->idprodi;
            $data=DB::table('prodi')
            ->select('prodi.*')
            ->get();

            foreach($data as $rows) {
                if($prodi == $rows->id) {
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