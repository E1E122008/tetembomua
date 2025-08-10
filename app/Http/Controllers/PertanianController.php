<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PertanianController extends Controller
{
    public function index()
    {
        return view('pertanian.index');
    }

    public function komoditas()
    {
        return view('pertanian.komoditas');
    }

    public function teknologi()
    {
        return view('pertanian.teknologi');
    }

    public function petani()
    {
        return view('pertanian.petani');
    }
}
