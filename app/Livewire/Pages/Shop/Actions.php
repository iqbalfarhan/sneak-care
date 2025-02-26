<?php

namespace App\Livewire\Pages\Shop;

use App\Livewire\Forms\ShopForm;
use App\Models\Shop;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Shop $shop;
    public ShopForm $form;

    #[On("createShop")]
    public function createShop()
    {
        $this->show = true;
    }

    #[On("editShop")]
    public function editShop(Shop $shop)
    {
        $this->show = true;
        $this->form->setShop($shop);
    }

    #[On("deleteShop")]
    public function deleteShop(Shop $shop)
    {
        $shop->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data shop berhasil dihapus');
    }

    public function simpan(){
        if (isset($this->form->shop)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data shop berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.shop.actions');
    }
}
