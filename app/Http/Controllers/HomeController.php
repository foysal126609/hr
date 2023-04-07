<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
//        $aa = $request->route()->getAction();
//        dd($aa);

        return redirect(route('dashboard'));
        //return view('website');
    }
}
