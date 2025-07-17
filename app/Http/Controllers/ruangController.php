<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ruangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('ruang.table')
        ->with('judul', 'Tabel Ruang');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('ruang.tambah')
        ->with('judul', 'Tambah Ruang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $x= [
            'nama' => $request ->nama,
            'kode' => $request ->kode,
            'kapasitas' => $request ->kapasitas,
            ];
    
            DB::table('ruang')->insert($x);
    
            return redirect('ruang');
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
        $rec = DB::table('ruang')
        ->where('id', $id)
        ->first();

        return view ('ruang.edit')
        ->with('id', $id)
        ->with('rec', $rec)
        ->with('judul', 'Edit Ruang');

        return redirect('ruang');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rec = DB::table('ruang')
        ->where('id', $id)
        ->first();

        DB::table('ruang')
        ->where('id', $id)
        ->update([
           'nama' => $request ->nama,
           'kode' => $request ->kode,
           'kapasitas' => $request ->kapasitas,
        ]);

        return redirect('ruang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('ruang')
        ->where('id', $id)
        ->delete();

        return redirect('ruang');
    }
}
