<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Designation;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.index',[
            'employees' => Employee::all(),
            'departments' => Department::all(),
            'designations' => Designation::all(),
        ]);
    }
    public function create(Request $request){
        Employee::addEmployee($request);
        return back()->with('message', 'Employee created successfully.');
    }
    public function edit($id){
        $employee      = Employee::find($id);
        $dept_result   = $employee->department_id;
        $des_result    = $employee->designation_id;
        $std_dpt_name  = Department::where('id','!=',$dept_result)->get();
        $std_des_name  = Designation::where('id','!=',$des_result)->get();

        return view('employee.edit',[
            'employee' => $employee,
            'departments' => $std_dpt_name,
            'designations' => $std_des_name
        ]);
    }
    public function update(Request $request,$id){

        Employee::updateEmployee($request,$id);
        return redirect(route('employee.manage'))->with('message', 'Employee Updated successfully.');
    }
    public function delete($id){
        Employee::deleteEmployee($id);
        return back()->with('message', 'Employee Deleted successfully.');
    }
    public function manage(){

        return view('employee.manage',['employees' => Employee::all()]);
    }
}
