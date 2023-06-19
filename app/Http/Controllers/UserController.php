<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $name = $user->name;
        $role = $user->role->name;
        $view = $request->path();

        $users = User::paginate(3);

        return view('users.index', [
            'users' => $users,
            'view' => $view,
            'name' => $name,
            'role' => $role,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $view = $request->path();
        $roles = Roles::all();
        return view('users.create', [
            'roles' => $roles,
            'view' => $view,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|regex:/^\(\d{3}\) \d{4}-\d{4}$/',
                'password' => 'required|min:6|confirmed',
                'role_id' => 'required',
                'image' => 'required|image'
            ]
        );

        $imageName = $request->file('image')->store('img_users', 'public');

        User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'image' => $imageName,
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {

        $view = $request->path();
        $user = User::findOrFail($id);
        return view(
            'users.show',
            [
                'user' => $user,
                'view' => $view,

            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $view = $request->path();
        $roles = Roles::all();
        $user = User::where('id', $id)->get();
        return view('users.update', [
            'user' => $user[0],
            'roles' => $roles,
            'view' => $view,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|regex:/^\(\d{3}\) \d{4}-\d{4}$/',
                'role_id' => 'required',
                'image' => 'nullable|image',
            ]
        );


        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password)
        {
            $user->password = $request->password;
        }
        $user->role_id = $request->role_id;
        
        $imageName=null;

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }
            $imageName = $request->file('image')->store('img_users', 'public');
            $user->image = $imageName ?? '';
        }

        $user->save();

        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}