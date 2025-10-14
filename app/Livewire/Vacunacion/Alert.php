<?php

namespace App\Livewire\Vacunacion;

use App\Models\Vacunacion;
use LivewireUI\Modal\ModalComponent;

class Alert extends ModalComponent
{
    public Vacunacion $vacunacion;

    public function mount(Vacunacion $vacunacion)
    {
        $this->vacunacion = $vacunacion;
    }

    public function delete()
    {
        $this->vacunacion->delete();

        $this->closeModal();
        $this->dispatch("vacunacionEliminada");
    }
    public function render()
    {
        return view('livewire.vacunacion.alert');
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}
