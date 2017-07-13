<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;




class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    

     protected function getPasswordSecurityQuestions(Request $request)
     {
         dd("Hello");
    //     try {
    //         $email = $request->email;
    //         $user = User::where('email', $email)->first();
    //         return view ('auth.passwords.security', compact('user'));
    //     }
    //     catch (\Exception $e)
    //     {
    //         return view('errors/503');
    //     }
     }
    // protected function resetPassword(Request $request)
    // {
    //     try {
    //         $email = $request->email;
    //         $security_answer1 = $request->security_answer1;
    //         $security_answer2 = $request->security_answer2;
    //         $user = User::where('email', $email)->first();
    //         $retrieved_security_answer1 = $user->security_answer1;
    //         $retrieved_security_answer2 = $user->security_answer2;
    //         if (($security_answer1 == $retrieved_security_answer1) && ($security_answer2 == $retrieved_security_answer2))
    //             return view ('auth/passwords/passwordReset', compact('user'));
    //         else
    //             return view ('errors/IncorrectSecurityAnswer');
    //     }
    //     catch (\Exception $e)
    //     {
    //         return view ('errors/503');
    //     }
    // }
    // protected function resetPasswordSuccess(Request $request)
    // {
    //     try {
    //         $email = $request->email;
    //         $password = Hash::make($request->password);
    //         $user = User::where('email', $email)->first();
    //         $user->password = $password;
    //         $user->save();
    //         return view ('auth/passwords/passwordSet');
    //     }
    //     catch (\Exception $e)
    //     {
    //         return view ('errors/503');
    //     }
    // }
}
