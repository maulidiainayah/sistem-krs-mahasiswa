<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    // Ambil daftar tahun akademik untuk dropdown
    $tahunAkademikList = DB::table('tahunakademik')->pluck('nama', 'id');

    // Ambil tahun akademik yang dipilih dari request (jika ada)
    $tahunAkademikId = $request->input('tahun_akademik', key($tahunAkademikList->toArray())); // Pilih default pertama

    // Query jadwal dengan filter tahun akademik
    $query = DB::table('jadwal')
        ->leftJoin('tahunakademik', 'tahunakademik.id', '=', 'jadwal.idta')
        ->leftJoin('hari', 'hari.id', '=', 'jadwal.idhari')
        ->leftJoin('matkul', 'matkul.id', '=', 'jadwal.idmatkul')
        ->leftJoin('dosen', 'dosen.id', '=', 'jadwal.iddosen')
        ->leftJoin('sesi', 'sesi.id', '=', 'jadwal.idsesi')
        ->leftJoin('ruang', 'ruang.id', '=', 'jadwal.idruang')
        ->leftJoin('prodi', 'prodi.id', '=', 'jadwal.idprodi')
        ->select(
            'jadwal.*',
            'tahunakademik.nama as ta',
            'hari.nama as hari',
            'matkul.nama as matkul',
            'dosen.nama as dosen',
            'sesi.jam_mulai as mulai',
            'sesi.jam_selesai as selesai',
            'ruang.nama as ruangan',
            'prodi.nama as prodi'
        );

    // Jika tahun akademik dipilih, filter datanya
    if (!empty($tahunAkademikId)) {
        $query->where('jadwal.idta', $tahunAkademikId);
    }

    $data = $query->get();

    return view('jadwal.table', compact('data', 'tahunAkademikList', 'tahunAkademikId'))
        ->with('judul', 'Table Jadwal Mahasiswa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunakademik = DB::table('tahunakademik')->get(); // Ambil semua data tahun akademik
        $selectedTA = DB::table('tahunakademik')->where('status', 1)->first(); // Tahun akademik aktif
        return view('jadwal.tambah', compact('tahunakademik', 'selectedTA'))
        ->with('judul', 'Tambah Jadwal');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $x= [
            'idta' =>$request ->ta,
            'idhari' =>$request ->hari,
            'idmatkul' =>$request ->matkul,
            'sks' =>$request ->sks,
            'iddosen' =>$request ->dosen,
            'idsesi' =>$request ->sesi,
            'idruang' =>$request ->ruangan,
            'idprodi' =>$request ->prodi, 
            'kelas' =>$request ->kelas, 
        ];

        DB::table('jadwal')->insert($x);

        return redirect('jadwal');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rec = DB::table('jadwal')
        ->where('id', $id)
        ->first();

        return view('jadwal');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rec = DB::table('jadwal')->where('id', $id)->first();

        return view('jadwal.edit', compact('rec'))->with('judul', 'Edit Jadwal');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $rec = DB::table('jadwal')
       ->where('id', $id)
       ->update([
            'idta' =>$request ->ta,
            'idhari' =>$request ->hari,
            'idmatkul' =>$request ->matkul,
            'sks' =>$request ->sks,
            'iddosen' =>$request ->dosen,
            'idsesi' =>$request ->sesi,
            'idruang' =>$request ->ruangan,
            'idprodi' =>$request ->prodi, 
            'kelas' =>$request ->kelas, 
       ]);

       return redirect('jadwal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('jadwal')
        ->where('id', $id)
        ->delete();

        return redirect('jadwal');
    }
}