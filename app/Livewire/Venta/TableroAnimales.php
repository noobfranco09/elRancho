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

    public function getFilteredAnimalsProperty()
    {
        $collection = collect($this->animales);

        if ($this->activeTab) {
            $collection = $collection->where("especie_id", $this->activeTab);
        }

        if ($this->searchQuery) {
            $query = mb_strtolower($this->searchQuery);

            $collection = $collection->filter(
                fn($animal) =>
                mb_strpos($animal["nombre"], $query) !== false
            );
        }

        return $collection->values()->all();
    }

    public function addToCart($id)
    {

        foreach ($this->selectedAnimals as $animal) {
            if (isset($animal["id"]) && $animal["id"] == $id) {
                return;
            }
        }

        $found = collect($this->animales)->firstWhere("id", (int) $id);

        if ($found) {
            $this->selectedAnimals[] = $found;
        }
    }

    public function removeFromCart($id)
    {
        if (isset($this->selectedAnimals[$id])) {
            array_splice($this->selectedAnimals, $id, 1);
        }
    }

    public function setActiveTab($especieId)
    {
        $this->activeTab = $especieId;
    }

    public function registerSale()
    {
        # Esta es la funcion que se encargara de registrar la venta
    }

    public function render()
    {
        return view('livewire.venta.tablero-animales');
    }
}
