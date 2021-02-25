<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Logout current authenticated user.
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    /**
     * Show login form.
     */
    public function loginForm(Request $request)
    {
        return view('login');
    }

    /**
     * Authenticate user.
     */
    public function login(Request $request)
    {
        $arr = $request->input();
        $email = $arr['email'];
        $password = $arr['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('computers.index');
        } else {
            return redirect('/login')->with('failed', true);
        }
    }
}
