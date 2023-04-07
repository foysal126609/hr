<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public $department;
    public function index(){
        return view('department.index',['departments' => Department::all()]);
    }

    public function create(Request $request){
        Department::addDepartment($request);
        return back()->with('message', 'Department created successfully.');
    }

    public function manage(){
        return view('department.manage',['departments' => Department::all()]);
    }

    public function update(Request $request, $id){
        Department::updateDepartment($request,$id);
        return back()->with('message', 'Department Updated successfully.');
    }

    public function delete($id){
        Department::deleteDepartment($id);
        return back()->with('message', 'Department Deleted successfully.');
    }
}
