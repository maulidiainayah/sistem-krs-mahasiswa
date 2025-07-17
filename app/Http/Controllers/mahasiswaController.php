<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('mahasiswa')
        ->leftjoin ('jk', 'jk.id', 'mahasiswa.jk')
        ->leftjoin ('agama', 'agama.id', 'mahasiswa.agama')
        ->leftjoin ('prodi', 'prodi.id', 'mahasiswa.prodi')
        ->leftjoin ('fakultas', 'fakultas.id', 'mahasiswa.fakultas')
        ->select (
        'mahasiswa.*', 
        'jk.nama as namajk',
        'agama.nama as agamamhs',
        'prodi.nama as prodi',
        'fakultas.nama as fak')
        ->get();

        return view ('mahasiswa.table')
        ->with('judul', 'Tabel Mahasiswa')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('mahasiswa.tambah')
        ->with('judul', 'Tambah Mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $x= [
        'nim' => $request ->nim,
        'nama' => $request ->nama,
        'jk' => $request ->idjk,
        'agama' => $request ->idagama,
        'alamat' => $request ->alamat,
        'nohp' => $request ->nohp,
        'prodi' => $request ->idprodi,
        'fakultas' => $request ->idfak,
        ];

        DB::table('mahasiswa')->insert($x);

        return redirect('mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rec = DB::table('mahasiswa')
        ->where('id', $id)
        ->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rec = DB::table('mahasiswa')
        ->where('id', $id)
        ->first();

        return view ('mahasiswa.edit')
        ->with('id', $id)
        ->with('rec', $rec)
        ->with('judul', 'Edit Mahasiswa');

        return redirect('mahasiswa');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rec = DB::table('mahasiswa')
        ->where('id', $id)
        ->first();

        DB::table('mahasiswa')
        ->where('id', $id)
        ->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jk' => $request->idjk,
            'agama' => $request ->idagama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'prodi' => $request->idprodi,
            'fakultas' => $request->idfak,
        ]);

        return redirect('mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('mahasiswa')
        ->where('id_mahasiswa', $id)
        ->delete();

        return redirect('mahasiswa');
    }
}
