<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function password(): string
    {
        return view('password');
    }

    public function register(): string
    {
        return view('register');
    }

    public function login(): string
    {
        return view('login');
    }

    public function login2(): string
    {
        return view('login2');
    }
}
