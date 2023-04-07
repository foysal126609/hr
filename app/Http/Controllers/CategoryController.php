<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function create(Request $request)
    {
        return $request->all();
    }

    public function manage()
    {
        return view('category.manage');
    }

    public function edit($id)
    {
        return view('category.edit');
    }

    public function update(Request $request, $id)
    {
        return $request->all();
    }

    public function delete($id)
    {

    }
}
