<?php

namespace App\Livewire\Establo;

use App\Models\Establo;
use LivewireUI\Modal\ModalComponent;

class Eliminar extends ModalComponent
{

    public $id;


    public function mount(Establo $establo)
    {
        $this->id = $establo->id;
    }


    public function eliminar()
    {
        $establo = Establo::findOrFail($this->id);
        $establo->update([
            "estado" => "inactivo"
        ]);

        $this->closeModal();
        $this->dispatch("establoEliminado");
    }

    public function render()
    {
        return view('livewire.establo.eliminar');
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

}
