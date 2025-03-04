<?php

namespace App\Livewire\Forms;

use App\Models\Bank;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BankForm extends Form
{
    public $name;
    public $logo;

    public ?Bank $bank;

    public function setBank(Bank $bank){
        $this->bank = $bank;

        $this->name = $bank->name;
        $this->logo = $bank->logo;
    }

    public function store(){
        $valid = $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($this->logo) {
            $valid['logo'] = $this->logo;
        }

        Bank::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => ['required','string','max:255'],
        ]);

        if ($this->logo) {
            $valid['logo'] = $this->logo;
        }

        $this->bank->update($valid);

        $this->reset();
    }

}
