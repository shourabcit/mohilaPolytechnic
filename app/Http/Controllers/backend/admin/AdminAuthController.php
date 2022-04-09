<?php

namespace App\Http\Controllers\backend\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Login Page

    public function login_index()
    {
        return view('backend.admin.login');
    }


    //Login Check

    public function login(Request $request)
    {
        $credential = $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        if (Auth::guard('admin')->attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors([
            'failed' => 'Your Credential did not match!!!'
        ]);
    }

    //Dashboard

    public function dashboard()
    {
        return view('home');
    }

    //Admin Logout

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.index');
    }
}
