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
        $this->dispatch("registrarVenta");
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}
