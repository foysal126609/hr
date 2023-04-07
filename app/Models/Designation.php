<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    public static $designation;
    public static function addDesignation($request){
        self::$designation                 = new Designation();
        self::$designation->name           = $request->name;
        self::$designation->description         = $request->description;
        self::$designation->save();
    }
    public static function updateDesignation($request, $id)
    {
        self::$designation              = Designation::find($id);
        self::$designation->name        = $request->name;
        self::$designation->description = $request->description;
        self::$designation->save();
    }

    public static function deleteDesignation($id)
    {
        self::$designation = Designation::find($id);
        self::$designation->delete();
    }
}
