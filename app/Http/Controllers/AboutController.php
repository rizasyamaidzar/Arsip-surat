<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {
        return view('about.index', [
            'title' => 'About',
            'name' => 'Riza Afif Syamaidzar',   // ganti dengan nama kamu
            'nim' => '2141762035',               // ganti dengan nim kamu
            'date' => '18 September 2025',      // tanggal dibuat aplikasi
            'photo' => 'images/2141762035.png'     // simpan di public/images/profile.jpg
        ]);
    }
}
