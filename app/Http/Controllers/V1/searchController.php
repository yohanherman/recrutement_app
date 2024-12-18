<?php

namespace App\Http\Controllers\v1;

use App\Models\Offer;
use Illuminate\Http\Request;

class searchController
{
    public function searchJob(Request $request)
    {
        // dd('vous avez cliqué sur la recherche');
        $position = $request->input('Title_offer');
        $location = $request->input('location');

        // Requête de recherche combinée
        $results = Offer::query()
            ->when($position, function ($query, $position) {
                $query->where('Title_offer', 'LIKE', '%' . $position . '%');
            })
            ->when($location, function ($query, $location) {
                $query->where('location', 'LIKE', '%' . $location . '%');
            })
            ->get();
        // dd($results);

        $offerTopOfCollection = $results->first();
        $resultsCount = $results->count();

        return view('pages.search', compact('results','offerTopOfCollection','resultsCount','position','location'));
    }
}
