<?php

namespace App\Http\Controllers\v1;

use App\Models\jobApplications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationFollowUpController
{
    public function getMyApplication()
    {
        $user = Auth::id();
        $applications = DB::table('job_applications')
            ->join('statuses', 'statuses.id', 'job_applications.status_id')
            ->join('offers', 'offers.id', 'job_applications.offer_id')
            ->join('users', 'users.id', 'job_applications.user_id')
            ->where('job_applications.user_id', $user)
            ->select('job_applications.*', 'statuses.*', 'users.*', 'offers.*')
            ->get();
        // dd($applications);
        return view('pages.FollowupApplication',  compact('applications', 'user'));
    }
}
