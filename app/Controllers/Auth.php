<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function register(): string
    {
        return view('register');
    }

    public function register_guru(): string
    {
        return view('register_guru');
    }

    public function login(): string
    {
        return view('login');
    }

    public function login_guru(): string
    {
        return view('login_guru');
    }
}
