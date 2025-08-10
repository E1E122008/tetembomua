<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function sejarah()
    {
        return view('profile.sejarah');
    }

    public function visiMisi()
    {
        return view('profile.visi-misi');
    }

    public function struktur()
    {
        return view('profile.struktur');
    }

    public function demografi()
    {
        return view('profile.demografi');
    }
}
