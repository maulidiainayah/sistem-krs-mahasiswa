<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KrsController extends Controller
{
    /**
     * Menampilkan daftar KRS sesuai level akses.
     */
    public function index(Request $request)
    {
        // Ambil mahasiswa berdasarkan input (jika ada)
        $mahasiswa = null;
        if ($request->has('mahasiswa')) {
            $mahasiswa = DB::table('mahasiswa')->where('nama', $request->mahasiswa)->first();
        }
    
        // Ambil data KRS jika mahasiswa ditemukan
        $krs = [];
        if ($mahasiswa) {
            $krs = DB::table('krs')
                ->join('jadwal', 'jadwal.id', '=', 'krs.idjadwal')
                ->join('matkul', 'matkul.id', '=', 'jadwal.idmatkul')
                ->select('matkul.kode', 'matkul.nama as matkul', 'matkul.semester', 'jadwal.kelas')
                ->where('krs.idmhs', $mahasiswa->id)
                ->get();
        }
    
        return view('krs.index', compact('krs', 'mahasiswa'));
    }

    public function create()
{
    $jadwal = DB::table('jadwal')
        ->join('matkul', 'matkul.id', '=', 'jadwal.idmatkul')
        ->select('jadwal.id', 'matkul.kode', 'matkul.nama as matkul', 'matkul.semester', 'jadwal.kelas')
        ->get();

    $mahasiswaList = DB::table('mahasiswa')
        ->select('id', 'nama')
        ->get();

    return view('krs.tambah', compact('jadwal', 'mahasiswaList'));
}
    
    /**
     * Menyimpan data KRS.
     */
    public function store(Request $request)
    {
    $request->validate([
        'idmhs' => 'required|exists:mahasiswa,id',
        'idjadwal' => 'required|exists:jadwal,id',
    ]);

    DB::table('krs')->insert([
        'idmhs' => $request->idmhs,
        'idjadwal' => $request->idjadwal,
    ]);

    return redirect()->route('krs.index')->with('success', 'KRS berhasil ditambahkan.');
}


    /**
     * Menampilkan form edit KRS.
     */
    public function edit($id)
    {
        $krs = DB::table('krs')->where('id', $id)->first();

        if (!$krs) {
            return redirect()->route('krs.index')->with('error', 'Data KRS tidak ditemukan.');
        }

        $jadwal = DB::table('jadwal')
            ->join('matkul', 'matkul.id', '=', 'jadwal.idmatkul')
            ->select('jadwal.id', 'matkul.kode', 'matkul.nama as matkul', 'matkul.semester', 'jadwal.kelas')
            ->get();

        return view('krs.edit', compact('krs', 'jadwal'));
    }

    /**
     * Mengupdate data KRS.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idjadwal' => 'required|exists:jadwal,id',
        ]);

        DB::table('krs')->where('id', $id)->update([
            'idjadwal' => $request->idjadwal,
            'updated_at' => now(),
        ]);

        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    /**
     * Menghapus data KRS.
     */
    public function destroy($id)
    {
        DB::table('krs')->where('id', $id)->delete();

        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil dihapus dari KRS.');
    }
}