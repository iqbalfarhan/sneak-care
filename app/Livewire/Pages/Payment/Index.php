<?php

namespace App\Livewire\Pages\Payment;

use App\Models\Payment;
use Livewire\Component;

class Index extends Component
{
    public $no = 1;
    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.payment.index', [
            'datas' => Payment::get()
        ]);
    }
}
