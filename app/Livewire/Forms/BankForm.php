<?php

namespace App\Livewire\Forms;

use App\Models\Bank;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BankForm extends Form
{
    public ?Bank $bank;

    public function setBank(Bank $bank){
        $this->bank = $bank;

        //
    }

    public function store(){
        $valid = $this->validate([
            //
        ]);

        Bank::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            //
        ]);

        $this->bank->update($valid);

        $this->reset();
    }

}
