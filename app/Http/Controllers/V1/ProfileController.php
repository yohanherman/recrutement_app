<?php

namespace App\Http\Controllers\v1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function getUserProfile()
    {
        $user = Auth::user();
        if ($user) {
            return view('pages.userProfile', compact('user'));
        }
        return view('pages.401error');
    }

    public function editProfileForm(int $id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('pages.editFormProfile', compact('user'));
    }

    public function editProfileFormPost(Request $request)
    {

        $request->validate([
            'name' => 'required|String|max:255',
            'phone_number' => 'required|'
        ]);


        $user = Auth::user();

        if ($user) {
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;

            $user->save();

            return redirect()->route('get.profile')->with('success', 'profile modified');
        }
        return redirect()->back()->with('error', 'can\'t modify user');
    }
}
