<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class fakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('fakultas')
        ->leftjoin ('dosen', 'dosen.id', 'fakultas.iddekan')
        ->select ('fakultas.*', 'dosen.nama as dekan')
        ->get();

        return view ('fakultas.table')
        ->with('judul', 'Tabel Fakultas')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('fakultas.tambah')
        ->with('judul', 'Tambah Fakultas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $x= [
            'kode' => $request ->kode,
            'nama' => $request ->nama,
            'iddekan' => $request ->iddekan,
            ];
    
            DB::table('fakultas')->insert($x);
    
            return redirect('fakultas');
    }

    /**
     * Display the specified resource.
     */ 
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rec = DB::table('fakultas')
        ->where('id', $id)
        ->first();

        return view ('fakultas.edit')
        ->with('id', $id)
        ->with('rec', $rec)
        ->with('judul', 'Edit Fakultas');

        return redirect('fakultas');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rec = DB::table('fakultas')
        ->where('id', $id)
        ->first();

        DB::table('fakultas')
        ->where('id', $id)
        ->update([
            'kode' => $request ->kode,
            'nama' => $request ->nama,
            'iddekan' => $request ->iddekan,
        ]);

        return redirect('fakultas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('fakultas')
        ->where('id', $id)
        ->delete();

        return redirect('fakultas');
    }
}
