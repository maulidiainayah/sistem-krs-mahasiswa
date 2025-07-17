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
    <form action="{{ url('mahasiswa/' .$rec->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nim">Nim</label>
            <input type="number" name="nim" value="{{ $rec->nim }}">
                   <br><br>
        <label for="nama">Nama</label>
            <input type="text" name="nama" value="{{  $rec->nama }}">
                   <br><br>
        <label for="jk">Jenis Kelamin : </label>
            <select name="idjk" style="width: 40%;">
                    <?php 
                    $idjk=$rec->jk;
                    $menuden=DB::table('jk')
                    ->select('jk.*')
                    ->get();
                   
                    foreach($menuden as $rows){
                        if($idjk == $rows->id){
                            echo "<option selected='selected' value='". $rows->id. "'>". $rows->nama. "</option>";
                        } else{
                            echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                        }
                    }
                    ?>
            </select><br><br>
        <label for="agama">Agama : </label>
            <select name="idagama" style="width: 40%;">
                    <?php 
                    $idagama=$rec->agama;
                    $menuden=DB::table('agama')
                    ->select('agama.*')
                    ->get();
                   
                    foreach($menuden as $rows){
                        if($idagama == $rows->id){
                            echo "<option selected='selected' value='". $rows->id. "'>". $rows->nama. "</option>";
                        } else{
                            echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                        }
                    }
                    ?>
            </select><br><br>
        <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="{{ $rec->alamat }}">
                   <br><br>
        <label for="nohp">Nohp</label>
            <input type="number" name="nohp" value="{{ $rec->nohp }}">
                   <br><br>
        <label for="prodi">Prodi : </label>
                   <select name="idprodi" style="width: 40%;">
                           <?php 
                           $idprodi=$rec->prodi;
                           $data=DB::table('prodi')
                           ->select('prodi.*')
                           ->get();
                          
                           foreach($data as $rows){
                               if($idjk == $rows->id){
                                   echo "<option selected='selected' value='". $rows->id. "'>". $rows->nama. "</option>";
                               } else{
                                   echo "<option value='". $rows->id. "'>". $rows->nama. "</option>";
                               }
                           }
                           ?>
                    </select><br><br>
        <label for="fak">Fakultas : </label>
                    <select name="idfak" style="width: 40%;">
                            <?php 
                            $idfak=$rec->fakultas;
                            $data=DB::table('fakultas')
                            ->select('fakultas.*')
                            ->get();
                           
                            foreach($data as $rows){
                                if($idfak == $rows->id){
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