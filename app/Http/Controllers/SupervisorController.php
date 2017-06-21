<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supervisor;
use App\Http\Requests;

class SupervisorController extends Controller
{
    public function index()
    {
        
        $supervisor=Supervisor::all();
        return view('Supervisor.index',compact('supervisor'));
    }  
  
  public function show($id)
    {
        $supervisor = Supervisor::findOrFail($id);
        return view('Supervisor.show',compact('supervisor'));
    }

   public function create()
    {
        return view('Supervisor.create');
    }

   public function store(Request $request)
    {
        $supervisor= new Supervisor($request->all());
        $supervisor->save();
        return redirect('Supervisor');
    }

  public function edit($id)
    {
        $supervisor=Supervisor::find($id);
        return view('Supervisor.edit',compact('supervisor'));
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
}
