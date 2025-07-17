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
    <div class="container mt-5">
        <h2>{{ $judul }}</h2>
        <button onclick="openModal('inputmodal')">Tambah Pesanan</button>
    </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
         <tbody> 
            @php $no=1; @endphp 
            @foreach ($data as $value)
            <tr>
                    <td>{{ $no++}}</td> 
                    <td>{{ $value->pembeli }}</td>
                    <td>{{ $value->jenis }}</td>
                    <td>{{ $value->menu }}</td>
                    <td>{{ $value->harga }}</td>
                    <td>{{ $value->quantity }}</td>
                    <td>{{ $value->total }}</td>
                    <td>
                    <button onclick="openModal('editModal', {{ $value->id }}, '{{ $value->pembeli }}', '{{ $value->jeniss }}', '{{ $value->menus }}', {{ $value->hargas }}, {{ $value->quantity }}, {{ $value->total }})">Edit</button>
                    <form action="{{ url('pemesanan/' . $value->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer;">delete</button>
                    </form>
                    </td>
                    @endforeach
            </tr>
         </tbody>
            </table>
        </div>
        <div id="inputmodal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('inputModal')">&times;</span>
                <h3>Tambah Pesanan</h3>
                <form action="{{ route('pemesanan.store') }}" method="POST">
                    @csrf
                    <label for="pembeli">Nama Pelanggan:</label><br>
                    <br><br>
            </div>
        </div>
</body>
</html>