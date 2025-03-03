<?php

namespace App\Livewire\Forms;

use App\Models\Order;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OrderForm extends Form
{
    public ?Order $order;

    public function setOrder(Order $order){
        $this->order = $order;

        //
    }

    public function store(){
        $valid = $this->validate([
            //
        ]);

        Order::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            //
        ]);

        $this->order->update($valid);

        $this->reset();
    }

}
