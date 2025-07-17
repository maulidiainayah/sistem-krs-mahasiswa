<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MhsController extends Controller
{
    public function index() {
        return view('mhs.dashboard');
    }
}
