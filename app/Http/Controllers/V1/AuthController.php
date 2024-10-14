<?php

namespace App\Http\Controllers\v1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.loginForm');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users',
            'password' => 'required|max:10'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('welcome'));
        }
        return redirect()->route('get.login')->with('errors', 'email/password incorrect');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {

        $messages = [
            'password.confirmed' => 'Les mots de passe ne correspondent pas.'
        ];

        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'birthdate' => 'required|date',
            'phone_number' => 'required|numeric',
            'password' => 'required|confirmed',
            'gender' => 'required',
            'role_id' => 'required|numeric'
        ], $messages);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'role_id' => $request->role,
        ]);
        if ($user) {
            return redirect()->route('login')->with('success', 'account successfully created');
        }
        // return redirect()->back()
    }
}
