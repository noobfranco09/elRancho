<?php

namespace App\Livewire\Venta;

use App\Models\Animal;
use App\Models\Especie;
use Livewire\Component;

class TableroAnimales extends Component
{
    public $animales = [];
    public $especies = [];
    public $activeTab = null;
    public $searchQuery = "";
    public $selectedAnimals = [];

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

        $this->especies = Especie::pluck("nombre", "id");;
        $this->activeTab = $this->especies[0] ?? "";
    }

    public function getFilteredAnimalsProperty() {}

    public function setActiveTab($especieId)
    {
        $this->activeTab = $especieId;
    }

    public function render()
    {
        return view('livewire.venta.tablero-animales');
    }
}
