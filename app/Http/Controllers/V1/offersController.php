<?php

namespace App\Http\Controllers\v1;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class offersController extends Controller
{
    public function getOffers()
    {
        $offers = Offer::all()->map(function ($offer) {
            $createdAt = Carbon::parse($offer->created_at);
            $offer->published_at = $createdAt->diffForHumans();
            return $offer;
        });

        $context = [
            'offers' => $offers
        ];
        return view('pages.offers', $context);
    }

    public function postOffers(Request $request) {}
}
