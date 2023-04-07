<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public static $role;

    public static function newRole($request)
    {
        self::$role                 = new Role();
        self::$role->name           = $request->name;
        self::$role->description    = $request->description;
        self::$role->save();

        return self::$role;
    }

    public function roleRoutes()
    {
        return $this->hasMany(RoleRoute::class);
    }

    public static function updateRole($request, $id)
    {
        self::$role                 = Role::find($id);
        self::$role->name           = $request->name;
        self::$role->description    = $request->description;
        self::$role->save();
        return self::$role;
    }

    public static function deleteRole($id)
    {
        self::$role = Role::find($id);
        self::$role->delete();
    }
}
