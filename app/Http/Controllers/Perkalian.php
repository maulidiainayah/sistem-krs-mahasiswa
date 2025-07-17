<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Perkalian extends Controller
{
  public function index()
  {
    return view ('kali');
  }

public function hitung(Request $request)
{
    $num1 = $request->input ('num1');
    $num2 = $request->input ('num2');
    $hasil = $num1 * $num2;

    return view('kali', 
    [
      'num1' => $num1,
      'num2' => $num2,
      'hasil' => $hasil
    ]
  );
}
}