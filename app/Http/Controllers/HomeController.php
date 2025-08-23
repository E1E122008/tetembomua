<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function news()
    {
        return view('news');
    }

    public function potensi()
    {
        return view('potensi');
    }

    public function program()
    {
        return view('program');
    }

    public function galeri()
    {
        return view('galeri');
    }

    public function statistik()
    {
        return view('statistik');
    }
}
