<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>TAMBAH KRS</title>
</head>
<body>
    <h1>TAMBAH KRS</h1>
    
    <label for="idmhs">Mahasiswa:</label>
    <select name="idmhs" id="idmhs" required>
        <option value="">Pilih Mahasiswa</option>
        @foreach ($mahasiswaList as $mahasiswa)
            <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }}</option>
        @endforeach
    </select>

    <h4>Pilih Mata Kuliah:</h4>
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>Semester</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $item)
                <tr>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->matkul }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>
                        <form action="{{ route('krs.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="idmhs" id="selectedMahasiswa">
                            <input type="hidden" name="idjadwal" value="{{ $item->id }}">
                            <button type="submit">Tambah</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        document.getElementById("idmhs").addEventListener("change", function() {
            let mahasiswaId = this.value;
            document.querySelectorAll("input[name='idmhs']").forEach(input => {
                input.value = mahasiswaId;
            });
        });
    </script>

</body>
</html>