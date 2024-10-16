<?php

namespace App\Http\Controllers\v1;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class offersController extends Controller
{
    public function getOffers()
    {
        $offers = Offer::inRandomOrder()->get()->map(function ($offer) {
            $createdAt = Carbon::parse($offer->created_at);
            $offer->published_at = $createdAt->diffForHumans();
            return $offer;
        });

        $offerTopOfCollection = $offers->first();
        // dd($offerTopOfCollection);
        return view('pages.offers', compact('offers', 'offerTopOfCollection'));
    }

    public function postOffers(Request $request) {}
}
