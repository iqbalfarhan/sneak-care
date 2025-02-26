<?php

namespace App\Livewire\Pages\Services;

use App\Livewire\Forms\ServicesForm;
use App\Models\Services;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Actions extends Component
{
    use LivewireAlert;
    public $show = false;
    public ?Services $services;
    public ServicesForm $form;

    #[On("createServices")]
    public function createServices()
    {
        $this->show = true;
    }

    #[On("editServices")]
    public function editServices(Services $services)
    {
        $this->show = true;
        $this->form->setServices($services);
    }

    #[On("deleteServices")]
    public function deleteServices(Services $services)
    {
        $services->delete();
        $this->dispatch('reload');
        $this->alert('success', 'Data services berhasil dihapus');
    }

    public function simpan(){
        if (isset($this->form->services)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->resetForm();
        $this->alert('success', 'Data services berhasil disimpan');
        $this->dispatch('reload');
    }

    public function resetForm(){
        $this->show = false;
        $this->form->reset();
        $this->dispatch('reload');
    }


    public function render()
    {
        return view('livewire.pages.services.actions');
    }
}
