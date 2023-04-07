<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){

        return view('company.index');

    }
    public function create(Request $request){
        Company::addCompany($request);
        return back()->with('message', 'Company created successfully.');
    }
    public function manage(){

        return view('company.manage',['companies' => Company::all()]);
    }
    public function edit($id){
        $company = Company::find($id);

        return view('company.edit',[
            'company' => $company
        ]);
    }
    public function update(Request $request,$id){

        Company::updateCompany($request,$id);
        return redirect(route('company.manage'))->with('message', 'Company Updated successfully.');
    }
    public function delete($id){
        Company::deleteCompany($id);
        return back()->with('message', 'Company Deleted successfully.');
    }
}
