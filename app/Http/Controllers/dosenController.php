<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('dosen')
        ->leftjoin ('jk', 'jk.id', 'dosen.jk')
        ->leftjoin ('agama', 'agama.id', 'dosen.agama')
        ->leftjoin ('prodi', 'prodi.id', 'dosen.prodi')
        ->leftjoin ('fakultas', 'fakultas.id', 'dosen.fakultas')
        ->select ('dosen.*', 
        'jk.nama as namajk', 
        'agama.nama as agamadsn',
        'prodi.nama as prodidsn',
        'fakultas.nama as fak'
        )
        ->get();

       return view ('dosen.table')
       ->with('judul', 'Tabel Dosen')
       ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dosen.tambah')
        ->with('judul', 'Tambah Dosen');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $x= [
            'nama' => $request ->nama,
            'jk' => $request ->idjk,
            'alamat' => $request ->alamat,
            'agama'=> $request ->idagama,
            'nohp' => $request ->nohp,
            'prodi' => $request ->idprodi,
            'fakultas' => $request ->idfak,
            ];
    
            DB::table('dosen')->insert($x);
    
            return redirect('dosen');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rec = DB::table('dosen')
        ->where('id', $id)
        ->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rec = DB::table('dosen')
        ->where('id', $id)
        ->first();

        return view ('dosen.edit')
        ->with('id', $id)
        ->with('rec', $rec)
        ->with('judul', 'Edit Dosen');

        return redirect('dosen');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rec = DB::table('dosen')
        ->where('id', $id)
        ->first();

        DB::table('dosen')
        ->where('id', $id)
        ->update([
            'nama' => $request->nama,
            'jk' => $request->idjk,
            'alamat' => $request->alamat,
            'agama' => $request->idagama,
            'nohp' => $request->nohp,
            'prodi' => $request->idprodi,
            'fakultas' => $request->idfak,
        ]);

        return redirect('dosen');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('dosen')
        ->where('id', $id)
        ->delete();

        return redirect('dosen');
    }
}
