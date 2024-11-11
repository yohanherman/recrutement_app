<?php

namespace App\Http\Controllers\v1;

use App\Models\Offer;
use App\Models\responsabilities;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class offersController extends Controller
{
    public function getOffers()
    {


        $offers = Offer::with('responsabilities', 'job_requirements')->inRandomOrder()->get()->map(function ($offer) {
            $createdAt = Carbon::parse($offer->created_at);
            $offer->published_at = $createdAt->diffForHumans();
            return $offer;
        });
        // dd($offers);
        // DB::enableQueryLog();
        // $offers = Offer::with('responsabilities')->inRandomOrder()->get();
        // dd(DB::getQueryLog());

        $offerTopOfCollection = $offers->first();
        return view('pages.offers', compact('offers', 'offerTopOfCollection'));
    }


    public function offerForm()
    {
        return view('pages.addOfferForm');
    }

    public function postOffers(Request $request)
    {

        $validate = $request->validate([
            'Title_offer' => 'required|string',
            'Company_name' => 'required|string',
            'Location' => 'required|string',
            'Employement_type_id' => 'required',
            'Salary_range' => 'required|string',
            'user_id' => 'required|',
            'description' => 'required'
        ]);

        $offer = Offer::create($request->all());
        if ($offer) {
            return redirect()->route('addMoreOfferDetailsForm', $offer->id)->with('success', 'added');
        }
        return redirect()->back()->with('error', 'probleme');
    }

    public function moreOfferInfoForm(int $id)
    {

        $offer = Offer::findOrFail($id);
        return view('pages.offerMoreInfoForm', compact('offer'));
    }


    public function postMoreOfferDetails(Request $request)
    {
        $rules = [
            'responsabilities_text' => 'required',
            'offer_id' => 'required|integer'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $responsabilities = responsabilities::create($request->all());
        // if ($responsabilities) {
        //     dd('j\'ai cree une mission pour cette offre');
        // }
    }
}
