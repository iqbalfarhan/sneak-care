<?php

namespace App\Livewire\Forms;

use App\Models\Payment;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PaymentForm extends Form
{
    public ?Payment $payment;

    public function setPayment(Payment $payment){
        $this->payment = $payment;

        //
    }

    public function store(){
        $valid = $this->validate([
            //
        ]);

        Payment::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            //
        ]);

        $this->payment->update($valid);

        $this->reset();
    }

}
