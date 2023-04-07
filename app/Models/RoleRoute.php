<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRoute extends Model
{
    use HasFactory;
    private static $roleRoute, $roleRoutes;

    public static function newRoleRoute($request, $role)
    {
        foreach ($request->route_name as $selectedOption)
        {
            self::$roleRoute = new RoleRoute();
            self::$roleRoute->role_id       = $role->id;
            self::$roleRoute->role_name     = $role->name;
            self::$roleRoute->route_name    = $selectedOption;
            self::$roleRoute->save();
        }
    }

    public static function updateRoleRoute($request, $role)
    {
        self::$roleRoutes = RoleRoute::where('role_id', $role->id)->get();
        foreach (self::$roleRoutes as $roleRoute)
        {
            $roleRoute->delete();
        }

        self::newRoleRoute($request, $role);
    }

    public static function deleteRoleRoute($id)
    {
        self::$roleRoutes = RoleRoute::where('role_id', $id)->get();
        foreach (self::$roleRoutes as $roleRoute)
        {
            $roleRoute->delete();
        }
    }
}
