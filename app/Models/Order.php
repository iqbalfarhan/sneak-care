<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->invoice_no = self::generateUniqueInvoice();
        });
    }

    private static function generateUniqueInvoice()
    {
        do {
            $invoice = 'INV-' . fake()->numerify("########");
        } while (self::where('invoice_no', $invoice)->exists());

        return $invoice;
    }

    protected $fillable = [
        'shop_id',
        'invoice_no',
        'kasir_id',
        'teknisi_id',
        'payment_id',
        'discount_id',
        'customer_id',
        'estimate_date',
        'shipping_cost',
        'total_pay',
        'paid',
        'status',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function kasir()
    {
        return $this->belongsTo(User::class, 'kasir_id');
    }

    public function teknisi()
    {
        return $this->belongsTo(User::class, 'teknisi_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderitems()
    {
        return $this->hasMany(Orderitem::class);
    }
}
