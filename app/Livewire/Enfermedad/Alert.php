<?php

namespace App\Livewire\Enfermedad;

use App\Models\Enfermedad;
use LivewireUI\Modal\ModalComponent;

class Alert extends ModalComponent
{

    public Enfermedad $enfermedad;

    public function mount(Enfermedad $enfermedad)
    {
        $this->enfermedad = $enfermedad;
    }

    public function delete()
    {
        $this->enfermedad->delete();

        $this->closeModal();
        $this->dispatch("enfermedadEliminada");
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
        return view('livewire.enfermedad.alert');
    }
}
