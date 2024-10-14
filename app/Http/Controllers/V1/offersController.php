<?php

namespace App\Http\Controllers\v1;

use App\Models\Offer;
use Illuminate\Http\Request;

class offersController extends Controller
{
    public function getOffers()
    {
        $offers = Offer::all();
        // dd($offers);
    }
}
