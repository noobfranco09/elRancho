<?php

namespace App\Livewire\Cajon;

use App\Models\Estanco;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{

    public Estanco $cajon;

    public function mount(Estanco $cajon)
    {
        $this->cajon = $cajon;
    }


    public function eliminar()
    {

        $this->cajon->delete();

        $this->closeModal();
        $this->dispatch("cajonEliminado");
    }

    public function render()
    {
        return view('livewire.cajon.eliminar');
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

}
