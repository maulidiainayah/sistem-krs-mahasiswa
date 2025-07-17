<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class prodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data=DB::table('prodi')
    ->leftJoin('dosen as d1', 'd1.id', '=', 'prodi.idkaprodi')
    ->leftJoin('fakultas', 'fakultas.id', '=', 'prodi.idfakultas') 
    ->leftJoin('dosen as d2', 'd2.id', '=', 'fakultas.iddekan') 
    ->select('prodi.id', 'prodi.kode', 'prodi.nama', 'd1.nama as namakaprodi', 'fakultas.nama as fak')
    ->get();

        return view ('prodi.table')
        ->with('judul', 'Tabel Prodi')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('prodi.tambah') 
        ->with ('judul', 'Tambah Prodi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $x= [
            'kode' => $request ->kode,
            'nama' => $request ->nama,
            'idkaprodi' => $request ->idkaprodi,
            'idfakultas' => $request ->idfakultas,
            ];
    
            DB::table('prodi')->insert($x);
    
            return redirect('prodi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rec = DB::table('prodi')
        ->where('id', $id)
        ->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rec = DB::table('prodi')
        ->where('id', $id)
        ->first();

        return view ('prodi.edit')
        ->with('id', $id)
        ->with('rec', $rec)
        ->with('judul', 'Edit Prodi');

        return redirect('prodi');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rec = DB::table('prodi')
        ->where('id', $id)
        ->first();

        DB::table('prodi')
        ->where('id', $id)
        ->update([
            'kode' => $request ->kode,
            'nama' => $request ->nama,
            'idkaprodi' => $request ->idkaprodi,
            'idfakultas' => $request ->idfakultas,
        ]);

        return redirect('prodi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('prodi')
        ->where('id', $id)
        ->delete();

        return redirect('prodi');
    }
}
