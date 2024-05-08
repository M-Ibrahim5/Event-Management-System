<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('/auth/login');
    }
    
    public function loginProcess(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            return redirect()->intended('/admin');
        }
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->intended('/'); /*redirect users to the page they initially attempted to access before being prompted to log in*/ 
        }
        //$dd($credentials);
        return \redirect('/login');
    }

    public function signup(){
        return view('/auth/signup');
    }

    public function signupUser(Request $request){
        User::create([
            'f_name' => $request->fname,
            'l_name' => $request->lname,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return \redirect('/login');
    }

    public function logout()
    {
        Auth::logout(); // Log out the user
        session()->flush(); // Clear all session data

        // Redirect to the login page or any other page as needed
        return redirect('/login');
    }
}
