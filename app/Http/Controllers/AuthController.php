<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        // TODO: Implement Form Validation and Authentication.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:6'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('errors',__('messages.er'));
    }

    /**
     * Handle a logout request.
     */
    public function logout(Request $request)
    {
        // TODO: Implement Logout here.
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
