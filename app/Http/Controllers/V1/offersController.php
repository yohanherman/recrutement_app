<?php

namespace App\Http\Controllers\v1;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class offersController extends Controller
{
    public function getOffers()
    {

        $offers = Offer::with('responsabilities','job_requirements')->inRandomOrder()->get()->map(function ($offer) {
            $createdAt = Carbon::parse($offer->created_at);
            $offer->published_at = $createdAt->diffForHumans();
            return $offer;
        });
        // dd($offers);
        // DB::enableQueryLog();
        // $offers = Offer::with('responsabilities')->inRandomOrder()->get();
        // dd(DB::getQueryLog());

        $offerTopOfCollection = $offers->first();
        // dd($offerTopOfCollection);
        return view('pages.offers', compact('offers', 'offerTopOfCollection'));
    }

    public function postOffers(Request $request) {}
}
