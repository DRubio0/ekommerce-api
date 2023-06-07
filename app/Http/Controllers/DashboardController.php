<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        $ProductCount = Product::count();
        $view = $request -> path();
        return view('dashboard', compact('ProductCount','products'));
 
    }
}
