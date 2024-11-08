<?php

namespace App\Http\Controllers\v1;

use App\Models\jobApplications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class recrutorApplicationController extends Controller
{
    public function displayApplication()
    {
        $userId = Auth::id();
        $applications = DB::table('job_applications')
            ->where('recrutor_id', $userId)
            ->get();
        // dd($application);
        return view('pages.applications', compact('applications'));
    }

    public function displayApplicationDetails()
    {
        return view('pages.detailsApplication');
    }
}
