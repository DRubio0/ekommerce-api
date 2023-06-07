<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $view = $request -> path();
        return view('dashboard', ['view' => $view]);
    }
}
