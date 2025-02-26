<?php

namespace App\Livewire\Pages\Discount;

use App\Livewire\Forms\DiscountForm;
use App\Models\Discount;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Discount $discount;
    public DiscountForm $form;

    #[On("createDiscount")]
    public function createDiscount()
    {
        $this->show = true;
    }

    #[On("editDiscount")]
    public function editDiscount(Discount $discount)
    {
        $this->show = true;
        $this->form->setDiscount($discount);
    }

    #[On("deleteDiscount")]
    public function deleteDiscount(Discount $discount)
    {
        $discount->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data discount berhasil dihapus');
    }

    public function simpan(){
        if (isset($this->form->discount)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data discount berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.discount.actions');
    }
}
