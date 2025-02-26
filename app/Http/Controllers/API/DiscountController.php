<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Auth::user()->shop->discounts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'value' => 'required',
        ]);

        $valid['shop_id'] = Auth::user()->shop->id;

        return Discount::create($valid);
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        return $discount;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $valid = $request->only(['name', 'description', 'type', 'value']);
        $discount->update($valid);
        return $discount;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        return $discount->delete();
    }
}
