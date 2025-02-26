<?php

namespace App\Livewire\Pages\Customer;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Customer $customer;
    public CustomerForm $form;

    #[On("createCustomer")]
    public function createCustomer()
    {
        $this->show = true;
    }

    #[On("editCustomer")]
    public function editCustomer(Customer $customer)
    {
        $this->show = true;
        $this->form->setCustomer($customer);
    }

    #[On("deleteCustomer")]
    public function deleteCustomer(Customer $customer)
    {
        $customer->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data customer berhasil dihapus');
    }

    public function simpan(){
        if (isset($this->form->customer)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data customer berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.customer.actions');
    }
}
