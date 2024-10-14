<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;

class AuthController
{
    public function getLogin()
    {
        return view('auth.loginForm');
    }
}
