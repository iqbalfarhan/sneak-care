<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($valid)) {
            $token = Auth::user()->createToken('auth_token')->plainTextToken;
            return response()->json([
                'token' => $token,
            ], 200);
        }

    }

    public function register(Request $request)
    {

    }

    public function logout(Request $request)
    {

    }

    public function refresh(Request $request)
    {

    }

    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    public function shop(Request $request)
    {
        return $request->user()->shop;
    }
}
