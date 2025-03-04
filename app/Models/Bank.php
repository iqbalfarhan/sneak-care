<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
    ];

    public function getImageUrlAttribute()
    {
        return $this->logo ? Storage::url($this->logo) : "https://api.dicebear.com/9.x/dylan/png?seed=$this->name";
    }
}
