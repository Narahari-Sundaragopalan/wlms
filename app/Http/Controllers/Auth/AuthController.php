<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        {
            $input = input::only('email');

            $this->middleware('guest', ['except' => 'logout']);

            $role = DB::table('users')->where('email', $input['email'])->value('role');



            switch ($role)
            {
                case 'Administrator': $this->redirectTo = '/administrator';
                    break;
                case 'Manager': $this->redirectTo = '/manager';
                    break;
                default: $this->redirectTo = '';
                    break;
            }


        }
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)

    {
        switch ($data['role'])
        {
            case 'Administrator': $this->redirectTo = '/administrator';
                break;
            case 'Manager': $this->redirectTo = '/manager';
                break;
            default: $this->redirectTo = '';
                break;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'  => $data['role'],
            'password' => bcrypt($data['password']),



        ]);

    }

}
