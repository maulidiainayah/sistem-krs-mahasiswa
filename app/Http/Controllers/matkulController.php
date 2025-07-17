<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class matkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('matkul')
        ->leftjoin('ruang', 'ruang.id', 'matkul.idruang')
        ->leftjoin('dosen', 'dosen.id', 'matkul.iddosen')
        ->select('matkul.*', 'ruang.nama as ruangan', 'dosen.nama as dosenpj')
        ->get();
        return view ('matkul.table')
        ->with('judul', 'Tabel Matkul')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('matkul.tambah')
        ->with('judul', 'Tambah Matkul');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $x= [
            'kode' => $request ->kode,
            'nama' => $request ->nama,
            'jam' => $request ->jam,
            'idruang' => $request ->idruang,
            'iddosen' => $request ->iddosen,
            'semester' => $request ->semester,
            ];
    
            DB::table('matkul')->insert($x);
    
            return redirect('matkul');
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
        $rec = DB::table('matkul')
        ->where('id', $id)
        ->first();

        return view ('matkul.edit')
        ->with('id', $id)
        ->with('rec', $rec)
        ->with('judul', 'Edit Matkul');

        return redirect('matkul');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rec = DB::table('matkul')
        ->where('id', $id)
        ->first();

        DB::table('matkul')
        ->where('id', $id)
        ->update([
            'kode' => $request ->kode,
            'nama' => $request ->nama,
            'jam' => $request ->jam,
            'idruang' => $request ->idruang,
            'iddosen' => $request ->iddosen,
            'semester' => $request ->semester,
        ]);

        return redirect('matkul');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('matkul')
        ->where('id', $id)
        ->delete();

        return redirect('matkul');
    }
}
