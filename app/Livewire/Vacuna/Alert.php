<?php

namespace App\Livewire\Vacuna;

use App\Models\Vacuna;
use LivewireUI\Modal\ModalComponent;

class Alert extends ModalComponent
{
    public Vacuna $vacuna;

    public function mount(Vacuna $vacuna)
    {
        $this->vacuna = $vacuna;
    }

    public function render()
    {
        return view('livewire.vacuna.alert');
    }

    public function delete()
    {
        $this->vacuna->delete();

        $this->closeModal();
        $this->dispatch("vacunaEliminada");
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}
