<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auths.login');
    }

    public function postlogin(Request $request)
    {
    	if(Auth::attempt($request->only('username','password'))){
    		return redirect('/home');
    	}

    	return redirect('/login/login');
    }

    public function logout()
    {
    	Auth::logout();
        Session::flush();
    	return redirect('/');
    }
}
