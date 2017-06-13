<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use App\User;
use Log;
class CreateuserController extends Controller
{
	public function index()
    {
        Log::info('CreateuserController.index: ');
        $users = User::all();
        $this->viewData['users'] = $users;
        return view('user.index', $this->viewData);
    }

public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user= new User($request->all());
        $user['password'] = bcrypt($request['password']);
        $user->save();
        return redirect('/user');
    }
public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/user');
    }
}