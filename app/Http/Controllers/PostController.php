<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleRoute;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('post.index');
    }

    public function create(Request $request)
    {
        return $request->all();
    }

    public function manage()
    {
        return view('post.manage');
    }

    public function edit($id)
    {
        return view('post.edit');
    }

    public function update(Request $request, $id)
    {
        return $request->all();
    }

    public function delete($id)
    {

    }
}
