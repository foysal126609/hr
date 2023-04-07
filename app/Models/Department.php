<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public static $department;
    public static function addDepartment($request){

        self::$department              = new Department();
        self::$department->name        = $request->name;
        self::$department->code        = $request->code;
        self::$department->description = $request->description;
        self::$department->save();
    }
    public static function updateDepartment($request, $id)
    {
        self::$department              = Department::find($id);
        self::$department->name        = $request->name;
        self::$department->code        = $request->code;
        self::$department->description = $request->description;
        self::$department->save();
    }
    public static function deleteDepartment($id)
    {
        self::$department = Department::find($id);
        self::$department->delete();
    }
}
