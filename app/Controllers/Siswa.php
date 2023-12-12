<?php

namespace App\Controllers;

class Siswa extends BaseController
{
    public function kelas(): string
    {
        return view('kelas');
    }

    public function jadwal(): string
    {
        return view('jadwal');
    }

    public function add_jadwal(): string
    {
        return view('add_jadwal');
    }

    public function edit_jadwal(): string
    {
        return view('edit_jadwal');
    }

    public function kelas_mat(): string
    {
        return view('kelas_mat');
    }
}
