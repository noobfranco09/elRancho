<?php

namespace App\Livewire\Venta;

use LivewireUI\Modal\ModalComponent;

class ModalRegistrar extends ModalComponent
{
    public function render()
    {
        return view('livewire.venta.modal-registrar');
    }

    public function registrar()
    {
        # simplemente se lanza un evento para que el componente del tablero lo
        # escuche y realice el registro
        $this->dispatch("registrarVenta");
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}
