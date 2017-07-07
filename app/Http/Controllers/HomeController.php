<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $user = Auth::user();
            if($user->hasRole('admin'))
                return view('administrator', compact('user'));
            else if($user->hasRole('manager'))
                return view('manager', compact('user'));
            else
                return view('home',compact('user'));
        }

    }
}
