<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'invoice_no' => $this->invoice_no,
            'barang' => $this->orderitems->map(function($item) {
                return [
                    "id" => $item->id,
                    "name" => $item->name,
                    "layanan" => [
                        "id" => $item->service->id,
                        "name" => $item->service->name,
                        "description" => $item->service->description,
                        "price" => $item->service->price,
                    ]
                ];
            }),
            'estimate_date' => $this->estimate_date,
            'shipping_cost' => $this->shipping_cost,
            'status' => $this->status,
            'teknisi' => new UserResource($this->teknisi),
            'kasir' => new UserResource($this->kasir),
            'pelanggan' => $this->customer,
            'diskon' => $this->discount,
            'payment' => $this->payment,
        ];
    }
}
