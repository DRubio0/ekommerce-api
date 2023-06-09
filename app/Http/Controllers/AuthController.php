<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        // $this->validate($request,[
        //     'name'=>'required|max:250',
        //     'email'=>'required|email|max:60|unique:user',
        //     // 'phone'=> 'required|integer|max20',
        //     'password'=>'required'
        // ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->last_name = $request->lastname;
        $user->role_id = 1;
        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->withErrors([
                'email' => 'The credentials are wrong'
            ]);
        }
    }
    public function dashboard(Request $request)
    {
        $products = Product::all();
        $products = Product::paginate(5);

        $productCount = Product::count();
        $view = $request->path();
        return view('dashboard', compact('productCount', 'products'));
    }
}