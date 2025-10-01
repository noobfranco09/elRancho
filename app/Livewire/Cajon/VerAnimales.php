<?php

namespace App\Livewire\Cajon;

use App\Models\Estanco;
use LivewireUI\Modal\ModalComponent;

class VerAnimales extends ModalComponent
{

    public $id, $cajon, $animales;

    public function mount(Estanco $cajon)
    {
        $this->id = $cajon->id;
        $this->cajon = $cajon;
        $this->animales = $cajon->animales;
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function render()
    {
        return view('livewire.cajon.ver-animales');
    }
}
