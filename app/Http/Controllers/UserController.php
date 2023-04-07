<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user, $userRoles;

    public function index()
    {
        return view('user.index', ['roles' => Role::all()]);
    }

    public function create(Request $request)
    {
        $this->user = User::newUser($request);
        foreach ($request->role as $selectedOption)
        {
            $this->user->roles()->attach($selectedOption);
        }
        return redirect('/user/add')->with('message', 'User info create successfully.');
    }

    public function manage()
    {
        return view('user.manage', ['users' => User::all()]);
    }

    public function edit($id)
    {
        return view('user.edit', ['roles' => Role::all(), 'user' => User::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->user = User::updateUser($request, $id);
        if ($request->role)
        {
            DB::table('user_role')->where('user_id', $id)->delete();
            foreach ($request->role as $selectedOption)
            {
                $this->user->roles()->attach($selectedOption);
            }
        }
        return redirect('/user/manage')->with('message', 'User info update successfully.');
    }

    public function delete($id)
    {
        User::deleteUser($id);
        DB::table('user_role')->where('user_id', $id)->delete();
        return redirect('/user/manage')->with('message', 'User info delete successfully.');
    }
}
