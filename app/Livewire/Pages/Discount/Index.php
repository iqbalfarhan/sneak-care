<?php

namespace App\Livewire\Pages\Discount;

use App\Models\Discount;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.discount.index', [
            'datas' => Discount::get()
        ]);
    }
}
