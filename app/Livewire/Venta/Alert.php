<?php

namespace App\Livewire\Venta;

use App\Models\Venta;
use LivewireUI\Modal\ModalComponent;

class Alert extends ModalComponent
{
    public $venta;

    public function mount(Venta $venta)
    {
        $this->venta = $venta;
    }
    public function render()
    {
        return view('livewire.venta.alert');
    }

    public function delete()
    {
        $this->venta->delete();
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}
