<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DsnController extends Controller
{
    public function index(){
        return view('dsn.dashboard');
    }
}
