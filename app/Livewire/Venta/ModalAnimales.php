<?php

namespace App\Livewire\Venta;

use App\Models\Animal;
use App\Models\Venta;
use LivewireUI\Modal\ModalComponent;

class ModalAnimales extends ModalComponent
{
    public $animales;
    public Venta $venta;

    public function mount(Venta $venta)
    {
        $this->animales = Animal::where("venta_id", $venta->id)->get();
    }


    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public function render()
    {
        return view('livewire.venta.modal-animales');
    }
}
