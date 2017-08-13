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
use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $employees = Employee::where('active', '=', '1')->get();
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
        $employee->active = true;
        $employee->restricted = false;
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
                    $seedData[] = ['empid' => $value->empid, 'empfname' => $value->empfname, 'emplname' =>
                        $value->emplname, 'positiontype' => $value->positiontype, 'experience' =>
                        $value->experience, 'labeler_rating' => $value->labeler_rating, 'combo_rating' => $value->combo_rating, 'stocker_rating' => $value->stocker_rating,
                        'english' => $value->english, 'spanish' => $value->spanish, 'other' => $value->other, 'icer' => $value->icer,
                        'labeler' => $value->labeler, 'mezzanine' => $value->mezzanine, 'stocker' => $value->stocker, 'runner' => $value->runner,
                        'qc' => $value->qc, 'cleaner' => $value->cleaner, 'gift_box' => $value->gift_box, 'comment' => $value->commnent,
                        'active' => $value->active, 'restricted' => $value->restricted];
                }
                if (!empty($seedData)) {
                    $importStatus = $this->insert($seedData);
                    if ($importStatus) {
                        return view('fileImportSuccess');
                    }
                }
            }
        }
        return back();
    }

    public function insert($seedData)
    {
        try {
            $TableData = array();
            $CsvData = array();
            $TableData = DB::table('employees')->pluck('empid');
            if (sizeof($TableData) > 0) {
                $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($seedData));
                foreach ($iterator as $key => $value) {
                    if ($key == 'empid') {
                        $CsvData[] = $value;
                    }
                }

                $valueOfSeedData = 0;
                for ($i = 0; $i < count($CsvData); $i++) {
                    $check = false;
                    for ($j = 0; $j < count($TableData); $j++) {
                        if ($TableData[$j] == $CsvData[$i]) {
                            DB::table('employees')->where('empid', $TableData[$j])->update($seedData[$valueOfSeedData]);
                            $valueOfSeedData++;
                            $check = true;
                            break;
                        }
                    }
                    if (!$check) {
                        DB::table('employees')->insert($seedData[$valueOfSeedData]);
                        $valueOfSeedData++;
                    }
                }
            } else {
                DB::table('employees')->insert($seedData);
            }

        } catch (\Exception $e) {
            Log::error("File insert failed: " . $e->getMessage());
            return FALSE;
        }
        return TRUE;
    }


    public function manage () {
        $employees = Employee::all();
        $empList = [];
        foreach ($employees as $employee) {
            $empList[$employee->id] = $employee->getEmpNameAttribute();
        }
        $manageEmployees['empList'] = $empList;
        return view ('addemployee.manage', $manageEmployees);
    }

    public function modifyStatus(Request $request) {
        $modifyEmpList = $request['manageEmpList'];
        $restrictedEmployees = $request['manageRestrictedList'];
        $status = $request['status'];
        $restrictedStatus = $request['restricted_status'];
        $restricted = false;
        $active = true;

        if($status === 'Inactive') {
            $active = false;
        }

        if($restrictedStatus == 'Restricted') {
            $restricted = true;
        }

        if(sizeof($modifyEmpList)) {
            foreach ($modifyEmpList as $empId) {
                Employee::where('id', '=', $empId)->update(['active' => $active]);
            }
        }

        if(sizeof($restrictedEmployees)) {
            foreach ($restrictedEmployees as $restrictedEmployee) {
                Employee::where('id', '=', $restrictedEmployee)->update(['restricted' => $restricted]);
            }
        }


        return redirect('addemployee');

    }
}

