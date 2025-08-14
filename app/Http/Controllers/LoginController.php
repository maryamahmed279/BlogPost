<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public function index()
    {
        return view('login');
    }
    public function login(Request $r)
    {
         $data = $r->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt($data))
        {
            $r->session()->regenerate();
            return redirect()->route('posts')->with('success','login successfully !');
        }
        else{
            return redirect()->back()->with('fail', 'Email or Password Incorrect.');
        }
    }
    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('welcome');
    }
}
