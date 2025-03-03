<?php

namespace App\Livewire\Pages\Order;

use App\Models\Order;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.order.index', [
            'datas' => Order::get()
        ]);
    }
}
