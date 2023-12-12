<?php

namespace App\Controllers;

class Guru extends BaseController
{
    public function guru_beranda(): string
    {
        return view('guru_beranda');
    }

    public function guru_kelas(): string
    {
        return view('guru_kelas');
    }

    public function guru_jadwal(): string
    {
        return view('guru_jadwal');
    }
}
