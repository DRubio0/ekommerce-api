<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Storage;

class ApiAuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create(
            [
                'name' => $data['name'],
                'last_name' => $data['lastname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => bcrypt($data['password']),
                'role_id' => 2,
                'image' => '',
            ]
        );

        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if(!Auth::attempt($data))
        {
            return response(
                [
                    'errors' => ['Email or password are incorrect']
                ], 
                422
            );
        }

        $user = Auth::user();
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return [
            'user' => null
        ];
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->user()->id);

        $user->name = $request->name ? $request->name : $user->name;
        $user->last_name = $request->last_name ? $request->last_name : $user->last_name;
        $user->phone = $request->phone ? $request->phone : $user->phone;
        $user->email = $request->email ? $request->email : $user->email;
        
        $user->save();
        
        return ['message' => 'User edited successfully'];
    }

    public function updateImage(Request $request)
    {
        if($request->hasFile('image'))
        {
            $user = User::findOrFail($request->user()->id);

            Storage::disk('public')->delete($user->image);
            $imageName = $request->file('image')->store('img_users', 'public');
            $user->image = $imageName;

            $user->save();
        }

        return ['message' => 'Photo edited successfully'];
    }
}