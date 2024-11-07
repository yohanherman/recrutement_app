<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\v1\Controller;
use App\Models\jobApplications;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplyController extends Controller
{
    public function appytoOfferForm(int $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $offer = Offer::findOrFail($id);

            return view('pages.applicationForm', compact('user', 'offer'));
        } else {
            dd('tu dois etre connecté');
        }
    }

    public function applyToOffer(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required',
            'offer_id' => 'required',
            'name' => 'required|string',
            'phone' => 'required',
            'location' => 'nullable',
            'profile_title' => 'required',
            'cv' => 'required|file',
            'cover_letter' => 'nullable|file',
            'message' => 'nullable',

        ]);
        // pour cv


        if ($request->hasFile('cv') && $request->file('cv')->isValid()) {
            $destination_path = 'public/pdfs';
            $pdf = $request->file('cv');
            $pdf_name = $pdf->getClientOriginalName();
            $path_cv = $request->file('cv')->storeAs($destination_path, $pdf_name);

        }


        // pour lettre
        if($request->hasFile('cover_letter') && $request->file('cover_letter')->isValid()){

            $destination_path = 'public/pdfs';
            $pdf = $request->file('cover_letter');
            $pdf_name = $pdf->getClientOriginalName();
            $path_cover_letter = $request->file('cover_letter')->storeAs($destination_path, $pdf_name);

        }

        $application = jobApplications::create([
            'user_id' => $request->user_id,
            'offer_id' => $request->offer_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'location' => $request->location,
            'profile_title' => $request->profile_title,
            'message' => $request->message,

            'cv' => $path_cv ? str_replace('public/', '', $path_cv) : null,  
            'cover_letter' => $path_cover_letter ? str_replace('public/', '', $path_cover_letter) : null, 
           

        ]);

        if ($application) {
            dd("j'ai bien cree la candidature", $application);
        } else {
            dd("j'ai pas pu creer la candidature");
        }
    }
}
