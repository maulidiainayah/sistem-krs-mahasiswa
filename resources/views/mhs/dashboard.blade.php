<x-app-layout>
    {{-- <x-slot name="header"> --}}
        {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard Mahasiswa</h1>
    <p>Halo, {{ auth()->user()->name }}! Ini halaman mahasiswa.</p>
    <div class="button-container">
    {{-- <button onclick="location.href='{{ url('/perkalian') }}'">Perkalian</button>
    <button onclick="location.href='{{ url('/penjumlahan') }}'">Penjumlahan</button> <br> --}}
    {{-- <button onclick="location.href='{{ url('/mahasiswa') }}'">Mahasiswa</button> <br>
    <button onclick="location.href='{{ url('/dosen') }}'">Dosen</button> <br>
    <button onclick="location.href='{{ url('/matkul') }}'">Matkul</button> <br>
    <button onclick="location.href='{{ url('/prodi') }}'">Prodi</button> <br>
    <button onclick="location.href='{{ url('/ruang') }}'">Ruang</button> <br>
    <button onclick="location.href='{{ url('/tahunakademik') }}'">Tahun Akademik</button> <br>
    <button onclick="location.href='{{ url('/fakultas') }}'">Fakultas</button> <br>
    <button onclick="location.href='{{ url('/jadwal') }}'">Jadwal</button> <br>
    <button onclick="location.href='{{ url('/pemesanan') }}'">Pemesanan</button> <br> --}}
    <button onclick="location.href='{{ url('/krs') }}'">KRS</button> <br>
    </div>
    
</body>
</html>
</x-app-layout>
