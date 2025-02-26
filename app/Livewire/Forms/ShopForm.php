<?php

namespace App\Livewire\Forms;

use App\Models\Shop;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ShopForm extends Form
{
    public ?Shop $shop;

    public function setShop(Shop $shop){
        $this->shop = $shop;

        //
    }

    public function store(){
        $valid = $this->validate([
            //
        ]);

        Shop::create($valid);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            //
        ]);

        $this->shop->update($valid);

        $this->reset();
    }

}
