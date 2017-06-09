<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Requests;

class EmployeeController extends Controller
{
  public function index()
    {
        
        $employees=Employee::all();
        return view('addemployee.index',compact('employees'));
    }  
  
  public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('addemployee.show',compact('employee'));
    }

   public function create()
    {
        return view('addemployee.create');
    }

   public function store(Request $request)
    {
        $employee= new Employee($request->all());
        $employee->save();
        return redirect('/addemployee');
    }

  public function edit($id)
    {
        $employee=Employee::find($id);
        return view('addemployee.edit',compact('employee'));
    }
  public function update($id,Request $request)
    {
        //
        $employee= new Employee($request->all());
        $employee=Employee::find($id);
        $employee->update($request->all());
        return redirect('/addemployee');
    }

public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect('/addemployee');
    }

}
