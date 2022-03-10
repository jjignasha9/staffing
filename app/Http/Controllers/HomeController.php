<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        if(Auth::User()->role == '2')
        {
            return redirect()->route('timesheets.create');
        } elseif(Auth::User()->role == '4') {
            return redirect()->route('timesheets');
        } else {
            return view('home');
        }
       
    }
}
