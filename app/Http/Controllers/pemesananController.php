<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DB::table('pemesanan')
        ->leftjoin('menu', 'menu.id', 'pemesanan.menu')
        ->select(
            'pemesanan.*',
            'menu.nama as menu',
            'menu.jenis as jenis',
            'menu.harga as harga',
        );

        return view('pemesanan.index', compact('data'))
        ->with('judul', 'Caffe Naya');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $x= [
            'pembeli' =>$request ->pembeli,
            'menu' =>$request ->menu,
            'quantity' =>$request ->quantity,
            'total' =>$request ->total,
        ];

        DB::table('pemesanan')->insert($x);

        return redirect('pemesanan.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rec = DB::table('pemesanan')
       ->where('id', $id)
       ->update([
            'pembeli' =>$request ->pembeli,
            'jenis' =>$request ->jenis,
            'menu' =>$request ->menu,
            'quantity' =>$request ->quantity,
            'total' =>$request ->total,
       ]);

       return redirect('pemesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pemesanan')
        ->where('id', $id)
        ->delete();

        return redirect('pemesanan.index');
    }
}
