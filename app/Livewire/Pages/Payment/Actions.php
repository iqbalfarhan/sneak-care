<?php

namespace App\Livewire\Pages\Payment;

use App\Livewire\Forms\PaymentForm;
use App\Models\Payment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Payment $payment;
    public PaymentForm $form;

    #[On("createPayment")]
    public function createPayment()
    {
        $this->show = true;
    }

    #[On("editPayment")]
    public function editPayment(Payment $payment)
    {
        $this->show = true;
        $this->form->setPayment($payment);
    }

    #[On("deletePayment")]
    public function deletePayment(Payment $payment)
    {
        $payment->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data payment berhasil dihapus');
    }

    public function simpan(){
        if (isset($this->form->payment)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data payment berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.payment.actions');
    }
}
