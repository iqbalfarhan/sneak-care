<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
        $valid = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $shop = Shop::create($valid);

        $valid['shop_id'] = $shop->id;

        $user = User::create($valid);
        $user->assignRole('owner');

        if (Auth::attempt($valid)) {
            $token = Auth::user()->createToken('auth_token')->plainTextToken;
            return response()->json([
                'token' => $token,
            ], 200);
        }
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

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            "name" => "nullable|string|max:255",
            "email" => "nullable|email|unique:users,email,$user->id",
            "photo" => "nullable|image|max:2048",
        ]);
        $user->update($validatedData);

        return new UserResource($user);
    }

    public function changePassword(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Password lama salah.'],
            ]);
        }

        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return response()->json(['message' => 'Password berhasil diubah.']);
    }


    public function shop(Request $request)
    {
        return $request->user()->shop;
    }
}
