<?php

namespace App\Livewire\Vacuna;

use App\Models\Vacuna;
use LivewireUI\Modal\ModalComponent;

class VerAnimales extends ModalComponent
{

    public $id, $vacuna, $animales;

    public function mount(Vacuna $vacuna)
    {
        $this->id = $vacuna->id;
        $this->vacuna = $vacuna;
        $this->animales = $vacuna->animales;
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function render()
    {
        return view('livewire.vacuna.ver-animales');
    }
}
