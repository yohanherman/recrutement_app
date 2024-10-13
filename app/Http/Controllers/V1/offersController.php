<?php

namespace App\Http\Controllers\v1;

use App\Models\offers;
use Illuminate\Http\Request;

class offersController extends Controller
{
    public function getOffers()
    {
        $offers = offers::all();
        // dd($offers);
    }
}
