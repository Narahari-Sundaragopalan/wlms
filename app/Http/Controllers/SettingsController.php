<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
class SettingsController extends Controller
{
    public function showChangePasswordForm()
    {
        if (view()->exists('auth.passwords.change')) {
            return view('auth.passwords.change');
        }
    }
    public function updatePassword()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            $rules = array(
                'old_password' => 'required',
                'password' => 'required|confirmed|min:6',
//                'password' => 'required|alphaNum|between:6,16|confirmed'
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return view('auth.passwords.passwordMismatch');
            } else {
                if (!Hash::check(Input::get('old_password'), $user->password)) {
                    return view('auth.passwords.passwordMismatch');
                } else {
                    $user->password = bcrypt(Input::get('password'));
                    $user->save();
                    return view('auth/passwords/passwordset');
                }
            }
        }
    }
}