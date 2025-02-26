<?php

namespace App\Livewire\Pages\Shop;

use App\Models\Shop;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.shop.index', [
            'datas' => Shop::withCount('users', 'customers')->get()
        ]);
    }
}
