<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PertanianController extends Controller
{
    public function komoditas()
    {
        return view('pertanian.komoditas');
    }
}
