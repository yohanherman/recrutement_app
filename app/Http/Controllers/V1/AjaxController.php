<?php

namespace App\Http\Controllers\v1;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController
{
    public function modifysidebarContentByOfferId(int $id)
    {
        $offer = DB::table('offers')
            ->join('employements_types', 'offers.Employement_type_id', 'employements_types.id')
            ->select('offers.*', 'employements_types.*')
            ->where('offers.id', $id)
            ->first();
        // dd($offer);
        if ($offer) {
            return response()->json([
                'offer' => $offer,
                // 'user' => auth()->user()

            ]);
        }
        return response()->json(['Error' => 'offer not found'], 404);
    }
}
