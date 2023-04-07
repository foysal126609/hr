<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class RoleController extends Controller
{
    private $routeLists;
    public $role;

    public function index()
    {
        $this->routeLists = Route::getRoutes();
        return view('role.index', ['routeLists' => $this->routeLists]);
    }

    public function create(Request $request)
    {
        $this->role = Role::newRole($request);
        RoleRoute::newRoleRoute($request, $this->role);
        return redirect('/role/add')->with('message', 'Role info create successfully.');
    }

    public function manage()
    {
        return view('role.manage', ['roles' => Role::all()]);
    }

    public function edit($id)
    {
        return view('role.edit', ['role' => Role::find($id), 'routeLists' => Route::getRoutes()]);
    }

    public function update(Request $request, $id)
    {
        $this->role = Role::updateRole($request, $id);
        RoleRoute::updateRoleRoute($request, $this->role);
        return redirect('/role/manage')->with('message', 'Role info update successfully.');
    }

    public function delete($id)
    {
        Role::deleteRole($id);
        RoleRoute::deleteRoleRoute($id);
        return redirect('/role/manage')->with('message', 'Role info delete successfully.');
    }
}
