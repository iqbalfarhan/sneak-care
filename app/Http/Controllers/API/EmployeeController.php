<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(Auth::user()->shop->users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->only(['name', 'email', 'password', 'role']);

        $valid = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required|in:teknisi,kasir'
        ]);

        $valid['shop_id'] = Auth::user()->shop->id;

        $user = User::create($valid);
        $user->assignRole($valid['role']);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $employee)
    {
        return new UserResource($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $employee)
    {
        $request->only(['name', 'email', 'password', 'role']);

        $valid = $request->validate([
            'name' => 'required',
            'email' => "required|email|unique:users,{$employee->id}",
            'role' => 'required|in:teknisi,kasir'
        ]);

        if ($request->password) {
            $valid['password'] = Hash::make($request->password);
        }

        $employee->update($valid);
        $employee->syncRoles($valid['role']);

        return new UserResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee)
    {
        $employee->delete();
        return response()->json(null, 204);
    }
}
