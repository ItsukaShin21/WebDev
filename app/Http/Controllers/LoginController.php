<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect('/')->with(['success' => 'Login Successfully']); // Redirect to the dashboard page
        } else {
            return view('loginPage', ['error' => 'Invalid login credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
