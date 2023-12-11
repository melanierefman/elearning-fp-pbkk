<?php

namespace App\Controllers;

class Welcome extends BaseController
{
    public function welcome(): string
    {
        return view('welcome');
    }
}
