<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supervisor;
use App\Http\Requests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
use Auth;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $supervisor=Supervisor::all();
        $user = Auth::user();
        return view('Supervisor.index',compact('supervisor','user'));
    }  
  
  public function show($id)
    {
        $supervisor = Supervisor::findOrFail($id);
        $user = Auth::user();
        return view('Supervisor.show',compact('supervisor','user'));
    }

   public function create()
    {
        $user = Auth::user();
        return view('Supervisor.create',compact('user'));
    }

   public function store(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'supid' => 'bail|required|numeric|unique:supervisors',
            'supfname' => 'required|max:255',
            'suplname' => 'required|max:255',
            'position' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect('/Supervisor/create')->withErrors($validator)->withInput();
        }


        $supervisor= new Supervisor($request->all());
        $supervisor->save();
        return redirect('Supervisor');
    }

  public function edit($id)
    {
        $supervisor=Supervisor::find($id);
        $user = Auth::user();
        return view('Supervisor.edit',compact('supervisor','user'));
    }

  public function update($id,Request $request)
    {
        //
        $supervisor= new Supervisor($request->all());
        $supervisor=Supervisor::find($id);
        $supervisor->update($request->all());
        return redirect('Supervisor');
    }

public function destroy($id)
    {
        Supervisor::find($id)->delete();
        return redirect('Supervisor');
    }
public function scopeSearchByKeyword($query, $keyword)
{
    if ($keyword!='') {
        $query->where(function ($query) use ($keyword) {
            $query->where("supid", "LIKE","%$keyword%")
                ->orWhere("supfname", "LIKE", "%$keyword%")
                ->orWhere("suplname", "LIKE", "%$keyword%")
                ->orWhere("position", "LIKE", "%$keyword%");
        });
    }
    return $query;
}
}
