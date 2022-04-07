<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'The provided email do not match our records.',
            'password' => 'The provided password do not match our records.'
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
