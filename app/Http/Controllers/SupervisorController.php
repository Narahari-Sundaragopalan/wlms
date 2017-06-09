<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\supervisor;
use App\Http\Requests;

class SupervisorController extends Controller
{
    public function index()
    {
        
        $supervisor=Supervisor::all();
        return view('supervisor.index',compact('supervisor'));
    }  
  
  public function show($id)
    {
        $supervisor = Supervisor::findOrFail($id);
        return view('supervisor.show',compact('supervisor'));
    }

   public function create()
    {
        return view('supervisor.create');
    }

   public function store(Request $request)
    {
        $supervisor= new Supervisor($request->all());
        $supervisor->save();
        return redirect('supervisor');
    }

  public function edit($id)
    {
        $supervisor=Supervisor::find($id);
        return view('supervisor.edit',compact('supervisor'));
    }
 
  public function update($id,Request $request)
    {
        //
        $supervisor= new Supervisor($request->all());
        $supervisor=Supervisor::find($id);
        $supervisor->update($request->all());
        return redirect('supervisor');
    }

public function destroy($id)
    {
        Supervisor::find($id)->delete();
        return redirect('supervisor');
    }
}
