<?php

namespace App\Livewire\Venta;

use App\Models\Animal;
use App\Models\Especie;
use Livewire\Component;

class TableroAnimales extends Component
{
    public $animales = [];
    public $especies = [];

    public function mount()
    {
        $this->animales = Animal::select(
            "id",
            "nombre",
            "precio",
            "imagen",
            "sexo",
            "color"

        )->get();

        $this->especies = Especie::pluck("especie")->unique()->values();
    }

    public function render()
    {
        return view('livewire.venta.tablero-animales');
    }
}
