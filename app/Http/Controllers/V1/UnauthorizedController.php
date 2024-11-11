<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\v1\Controller;
use Illuminate\Http\Request;

class UnauthorizedController extends Controller
{
    public function unauthorized()
    {
        return view('pages.401error');
    }
}
