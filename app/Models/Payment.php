<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'bank_id',
        'name',
        'account_number',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
