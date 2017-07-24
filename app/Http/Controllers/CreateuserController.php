<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Log;
use Auth;
use Image;



class CreateuserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::all();
        $user = Auth::user();
        $this->viewData['users'] = $users;
        return view('user.index', compact('user'), $this->viewData);
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

    public function updatepicture(){
        return view('updatepicture', array('user'=>Auth::user()));
    }

    public function changepicture(Request $request){
        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image:: make($avatar)->resize(300,300)->save(public_path('/uploads/images/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('updatepicture', array('user'=>Auth::user()));

    }
}