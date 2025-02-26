<?php

namespace App\Livewire\Forms;

use App\Models\Discount;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DiscountForm extends Form
{
    public ?Discount $discount;

    public function setDiscount(Discount $discount){
        $this->discount = $discount;

        //
    }

    public function store(){
        $valid = $this->validate([
            //
        ]);

        Discount::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            //
        ]);

        $this->discount->update($valid);

        $this->reset();
    }

}
