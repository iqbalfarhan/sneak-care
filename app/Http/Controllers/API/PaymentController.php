<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shop_id = Auth::user()->shop->id;
        $banks = Payment::where('shop_id', $shop_id)->get();
        
        return PaymentResource::collection($banks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'bank_id' => 'required',
            'name' => 'required',
            'account_number' => 'required',
        ]);

        $valid['shop_id'] = Auth::user()->shop->id;

        return Payment::create($valid);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return $payment->load('bank');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $valid = $request->only(['bank_id', 'name', 'account_number']);
        $payment->update($valid);
        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        return $payment->delete();
    }
}
