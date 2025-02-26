<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?Customer $customer;

    public function setCustomer(Customer $customer){
        $this->customer = $customer;

        //
    }

    public function store(){
        $valid = $this->validate([
            //
        ]);

        Customer::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            //
        ]);

        $this->customer->update($valid);

        $this->reset();
    }

}
