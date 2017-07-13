<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;

class SecurityquestionsresetController extends Controller
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
        $user = Auth::user();
        return view('auth/passwords/securityques', compact('user'));
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'security_question1' => 'bail|required',
            'security_answer1' => 'bail|required|max:255',
            'security_question2' => 'required',
            'security_answer2' => 'required',


        ]);
        if ($validator->fails()) {
            return redirect('/securityques')->withErrors($validator)->withInput();
        }

        $currentuser=Auth::user();
        $id=$currentuser->id;
        $user = new User();
        $user = User::find($id);
        $user->security_question1=$request['security_question1'];
        $user->security_answer1=$request['security_answer1'];
        $user->security_question2=$request['security_question2'];
        $user->security_answer2=$request['security_answer2'];
        $user->save();
        return view('auth/passwords/securityquestionset');
    }

}
