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
            ->join('statuses', 'statuses.id', 'job_applications.status_id')
            ->join('offers', 'offers.id', 'job_applications.offer_id')
            ->join('users', 'users.id', 'job_applications.user_id')
            ->where('recrutor_id', $userId)
            ->where('status_id', 1)
            ->select('job_applications.*', 'statuses.*', 'users.*', 'offers.*')
            ->get();
        return view('pages.applications', compact('applications'));
    }

    public function displayApplicationDetails(int $id)
    {
        $application = DB::table('job_applications')
            ->join('statuses', 'statuses.id', 'job_applications.status_id')
            ->join('users', 'users.id', 'job_applications.user_id')
            ->join('offers', 'offers.id', 'job_applications.offer_id')
            ->where('offer_id', $id)
            ->select('job_applications.*', 'statuses.*', 'users.*', 'offers.*')
            ->first();
        // dd($application);

        return view('pages.detailsApplication', compact('application'));
    }


    public function changeStatus(int $id)
    {

        $application = jobApplications::where('offer_id', $id)->firstOrFail();
        $application->status_id = 2;
        $application->save();

        return redirect()->back()->with('success', 'You rejected the application');
    }
}
