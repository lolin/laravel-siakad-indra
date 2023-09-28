<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email|string',
            'password'=>'required',
        ]);

        $user=User::where('email',$request->email)->first();

        if(!$user){
            throw ValidationException::withMessages([
                'email'=>'The email credentials do not match our records.',
            ]);
        }

        if(!Hash::check($request->password,$user->password)){
            throw ValidationException::withMessages([
                'password'=>'The password credentials do not match our records.',
            ]);
        }

        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'jwt_token'=>$token,
            'user'=> new UserResource($user) ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'Successfully logged out',
        ]);
    }

}
