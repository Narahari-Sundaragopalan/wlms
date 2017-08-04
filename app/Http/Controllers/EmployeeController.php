<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Employee;
use App\Http\Requests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $employees = Employee::all();
        $user = Auth::user();
        return view('addemployee.index', compact('employees', 'user'));
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $user = Auth::user();
        return view('addemployee.show', compact('employee', 'user'));

    }

    public function create()
    {
        $user = Auth::user();
        return view('addemployee.create', compact('user'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'empid' => 'bail|required|numeric|unique:employees',
            'empfname' => 'required|max:255',
            'emplname' => 'required|max:255',
            'positiontype' => 'required',
            'experience' => 'required',
            'english' => 'required_without_all: spanish, other',
            'spanish' => 'required_without_all: english, other',
            'other' => 'required_without_all: english, spanish',
            'labeler_rating' => 'required',
            'stocker_rating' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('/addemployee/create')->withErrors($validator)->withInput();
        }

        $employee = new Employee($request->all());
        $employee->save();
        return redirect('/addemployee');

    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $user = Auth::user();
        return view('addemployee.edit', compact('employee', 'user'));
    }

    public function update($id, Request $request)
    {
        $employee = new Employee($request->all());
        $employee = Employee::find($id);
        $employee->update($request->all());
        return redirect('/addemployee');
    }

    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect('/addemployee');
    }


    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("empid", "LIKE", "%$keyword%")
                    ->orWhere("empfname", "LIKE", "%$keyword%")
                    ->orWhere("emplname", "LIKE", "%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%")
                    ->orWhere("phone", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

    public function importfile()
    {
        return view('addemployee.importfile');
    }

    public function importExcel()
    {
        if (Input::hasFile('import_file')) {
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = ['empid' => $value->empid, 'empfname' => $value->empfname, 'emplname' =>
                        $value->emplname, 'positiontype' => $value->positiontype, 'experience' =>
                        $value->experience, 'labeler_rating' => $value->labeler_rating, 'stocker_rating' => $value->stocker_rating,
                        'english' => $value->english, 'spanish' => $value->spanish, 'other' => $value->other, 'icer' => $value->icer,
                        'labeler' => $value->labeler, 'mezzanine' => $value->mezzanine, 'stocker' => $value->stocker, 'runner' => $value->runner,
                        'qc' => $value->qc, 'cleaner' => $value->cleaner, 'gift_box' => $value->gift_box, 'comment' => $value->commnent,
                        'active' => $value->active];
                }
                if (!empty($insert)) {
                    DB::table('employees')->insert($insert);
                    return view('fileImportSuccess');
                }
            }
        }
        return back();
    }


}

