<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Auth::user()->shop->orders;
        return OrderResource::collection($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'payment_id' => '',
            'discount_id' => '',
            'customer_id' => 'required',
            'estimate_date' => 'required|date',
            'shipping_cost' => '',
            'total_pay' => '',
            'barang' => 'required|array',
        ]);

        $valid['shop_id'] = Auth::user()->shop->id;
        $valid['kasir_id'] = Auth::id();

        $order = Order::create($valid);

        foreach ($valid['barang'] as $item) {
            $order->orderitems()->create([
                'name' => $item['name'],
                'service_id' => $item['service_id'],
            ]);
        }

        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
