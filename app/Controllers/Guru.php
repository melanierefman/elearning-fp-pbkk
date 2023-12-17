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
    public function add_class(): string
    {
        return view('add_class');
    }
    public function kelas_mat_guru(): string
    {
        return view('kelas_mat_guru');
    }
    public function add_section(): string
    {
        return view('add_section');
    }
    public function jadwal_guru(): string
    {
        return view('jadwal_guru');
    }
}
