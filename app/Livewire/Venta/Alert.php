<?php

namespace App\Livewire\Venta;

use App\Models\Animal;
use App\Models\Venta;
use Exception;
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
        try {
            $animalesIds = $this->venta->animales()
                ->pluck("id")
                ->toArray();

            Animal::whereIn("id", $animalesIds)
                ->update(["venta_id" => null]);

            $this->venta->delete();

            $this->dispatch("success", message: "Venta anulada");
            $this->closeModal();
        } catch (Exception $e) {
            $this->dispatch("error", message: "Error al anular la venta.");
        }
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}
