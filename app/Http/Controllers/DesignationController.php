<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public $designation;
    public function index(){
        return view('designation.index',['designations' => Designation::all()]);
    }
    public function create(Request $request){
        Designation::addDesignation($request);
        return back()->with('message', 'Designation created successfully.');
    }
    public function manage(){
        return view('designation.manage',['designations' => Designation::all()]);
    }

    public function update(Request $request, $id){
        Designation::updateDesignation($request,$id);
        return back()->with('message', 'Designation Updated successfully.');
    }

    public function delete($id){
        Designation::deleteDesignation($id);
        return back()->with('message', 'Designation Deleted successfully.');
    }
}
