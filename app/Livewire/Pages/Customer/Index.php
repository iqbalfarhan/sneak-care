<?php

namespace App\Livewire\Pages\Customer;

use App\Models\Customer;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.customer.index', [
            'datas' => Customer::get()
        ]);
    }
}
