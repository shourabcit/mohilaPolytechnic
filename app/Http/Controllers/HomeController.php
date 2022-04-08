<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activityLog = User::where('id', Auth::user()->id)->whereHas('equipmentProvides', function ($q) {
            $q->where('approved', 1);
        })->with('equipmentProvides.equipment')->first();
        // dd($activityLog);
        return view('home', compact('activityLog'));
    }
}
