<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(
            [
                'showRegisterForm',
                'register',
                'showLoginForm',
                'login'
            ]
        );
    }

    public function showRegisterForm()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->last_name = $request->lastname;
        $user->role_id = 1;
        $user->image=$request->image;
        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function showLoginForm()
    {
        
        if(Auth::check()){
            return redirect()->route('dashboard');
        }


        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->withErrors([
                'email' => 'The credentials are wrong'
            ]);
        }
    }

    public function dashboard(Request $request)
    {
        $user = Auth::user();

        $name = $user->name;
        $role = $user->role->name;
        $products = Product::all();
        $products = Product::paginate(5);

        $userCount= User::count();
        $productCount = Product::count();
        $view = $request->path();
        return view('dashboard', compact('name','role', 'productCount', 'products','userCount'));
    }

    public function logout()
    {
        $user = Auth::user();
        $name = $user->name;
        Auth::logout();
        return redirect()->route('login')->with('name',$name);
        // return view('auth.login', compact('name'));
    }
}