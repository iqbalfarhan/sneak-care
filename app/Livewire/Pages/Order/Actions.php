<?php

namespace App\Livewire\Pages\Order;

use App\Livewire\Forms\OrderForm;
use App\Models\Order;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Order $order;
    public OrderForm $form;

    #[On("createOrder")]
    public function createOrder()
    {
        $this->show = true;
    }

    #[On("editOrder")]
    public function editOrder(Order $order)
    {
        $this->show = true;
        $this->form->setOrder($order);
    }

    #[On("deleteOrder")]
    public function deleteOrder(Order $order)
    {
        $order->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data order berhasil dihapus');
    }

    public function simpan(){
        if (isset($this->form->order)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data order berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.order.actions');
    }
}
