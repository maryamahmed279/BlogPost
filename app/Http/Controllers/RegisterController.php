<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
          return view('register');
    }
    public function check(Request $r)
    {
        // Let Laravel handle validation errors automatically
        $r->validate([
            'first_name' => 'required|string|max:20',
            'last_name'  => 'required|string|max:20',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|confirmed'
        ]);

        try {
            // Create user
            $user = User::create([
                'name' => $r->first_name . ' ' . $r->last_name,
                'email' => $r->email,
                'password' => Hash::make($r->password)
            ]);

            // Optional: log the user in after registration
            Auth::login($user);

            $r->session()->regenerate();

            return redirect()->route('posts')
                ->with('success', 'You registered successfully!');
        } catch (\Throwable $e) {
            // Handle unexpected errors (DB errors, etc.)
            return back()->with('fail', 'Something went wrong, try again!')
                         ->withInput();
        }
    }
}
