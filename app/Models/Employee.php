<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Designation;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;
    public static $employee;
    public static function addEmployee($request){

        self::$employee                = new Employee();
        self::$employee->name          = $request->name;
        self::$employee->department_id = $request->department_id;
        self::$employee->designation_id= $request->designation_id;
        self::$employee->code          = $request->code;
        self::$employee->image         = self::saveImage($request);
        self::$employee->nid           = $request->nid;
        self::$employee->address       = $request->address;
        self::$employee->blood_group   = $request->blood_group;
        self::$employee->email         = $request->email;
        self::$employee->date_of_birth = $request->date_of_birth;
        self::$employee->mobile        = $request->mobile;
        self::$employee->employee_type  = $request->employee_type;
        self::$employee->joining_date  = $request->joining_date;
        self::$employee->basic_salary  = $request->basic_salary;
        self::$employee->status        = $request->status;
        self::$employee->save();
    }

    public static function updateEmployee($request, $id)
    {
        self::$employee                 = Employee::find($id);
        self::$employee->name           = $request->name;
        self::$employee->department_id  = $request->department_id;
        self::$employee->designation_id = $request->designation_id;
        self::$employee->code           = $request->code;
        self::$employee->image          = self::saveImage($request);
        self::$employee->nid            = $request->nid;
        self::$employee->address        = $request->address;
        self::$employee->blood_group    = $request->blood_group;
        self::$employee->email          = $request->email;
        self::$employee->date_of_birth  = $request->date_of_birth;
        self::$employee->mobile         = $request->mobile;
        self::$employee->employee_type  = $request->employee_type;
        self::$employee->joining_date   = $request->joining_date;
        self::$employee->basic_salary   = $request->basic_salary;
        self::$employee->status         = $request->status;
        self::$employee->save();
    }
    public static function saveImage($request){
        $image     = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'upload/employee/';
        $imageUrl  = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }

    public static function deleteEmployee($id)
    {
        self::$employee = Employee::find($id);
        self::$employee->delete();
    }
    public function hasDepartment(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
    public function hasDesignation(){
        return $this->belongsTo(Designation::class,'designation_id','id');
    }
}
