<?php

namespace App\Livewire\Forms;

use App\Models\Services;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ServicesForm extends Form
{
    public ?Services $services;

    public function setServices(Services $services){
        $this->services = $services;

        //
    }

    public function store(){
        $valid = $this->validate([
            //
        ]);

        Services::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            //
        ]);

        $this->services->update($valid);

        $this->reset();
    }

}
