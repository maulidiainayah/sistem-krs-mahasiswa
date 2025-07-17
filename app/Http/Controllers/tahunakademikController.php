<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tahunakademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('tahunakademik.table')
        ->with('judul', 'Tabel Tahun akademik');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('tahunakademik.tambah')
        ->with('judul', 'Tambah Tahun akademik');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $x= [
            'nama' => $request ->nama,
            'semester' => $request ->semester,
            'status' => $request ->status,
            ];
    
            DB::table('tahunakademik')->insert($x);
    
            return redirect('tahunakademik');
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
        $rec = DB::table('tahunakademik')
        ->where('id', $id)
        ->first();

        return view ('tahunakademik.edit')
        ->with('id', $id)
        ->with('rec', $rec)
        ->with('judul', 'Edit Tahun akademik');

        return redirect('tahunakademik');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rec = DB::table('tahunakademik')
        ->where('id', $id)
        ->first();

        DB::table('tahunakademik')
        ->where('id', $id)
        ->update([
           'tahun' => $request ->tahun,
           'semester' => $request ->semester,
           'status' => $request ->status,
        ]);

        return redirect('tahunakademik');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tahunakademik')
        ->where('id', $id)
        ->delete();

        return redirect('tahunakademik');
    }
}
