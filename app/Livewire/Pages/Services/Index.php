<?php

namespace App\Livewire\Pages\Services;

use App\Models\Services;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.services.index', [
            'datas' => Services::get()
        ]);
    }
}
