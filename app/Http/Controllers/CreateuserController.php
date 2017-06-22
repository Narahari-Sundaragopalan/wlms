<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Log;


class CreateuserController extends Controller
{
	public function index()
    {
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

        $this->validate($request, [
            'name' => 'bail|required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',

            

        ]);

        $input = $request->all();
        $this->populateCreateFields($input);
        $input['password'] = bcrypt($request['password']);
      //  dd($request->input('role'));

        $object = User::create($input);
        $this->syncRoles($object, $request->input('role'));

        return redirect('/user');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/user');
    }

    private function syncRoles(User $user, array $roles)
    {
        $user->roles()->sync($roles);
    }
}