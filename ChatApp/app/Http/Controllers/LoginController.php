<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function show()
    {
        //dd(Hash::make('123'));
        return view('Login.Login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'email' =>'required|email',
            'password' => 'required|max:255',
        ],
        [
            'email.required' => " You need to Enter your email address",
            'password.required' => "You need to enter your password",
        ])->validate();
        if (Auth::attempt($validator))
        {
            // Authentication passed...
            return redirect()->route('Home');
            
        } // Authentication failed...
        else    return back()->withErrors(['error'=>"Wrong Input"]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('Login');
    }
}
