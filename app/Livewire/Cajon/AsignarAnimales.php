<?php

namespace App\Livewire\Cajon;

use App\Models\Estanco;
use App\Models\Animal;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Collection;

class AsignarAnimales extends ModalComponent
{

    public $buscarAnimal, $buscarCajon, $animal_id, $cajon_id;
    public $animales = [];
    public $cajones = [];

    public function buscar()
    {
        // Busca animales por nombre o cualquier campo que tengas
        $this->animales = Animal::where('nombre', 'like', '%' . $this->buscarAnimal . '%')
            ->pluck('nombre', 'id')
            ->toArray();

        $this->cajones = Estanco::where('codigo', 'like', '%' . $this->buscarCajon . '%')
            ->pluck('codigo', 'id')
            ->toArray();
    }

    public function save()
    {

        

    }

    public function render()
    {
        return view('livewire.cajon.asignar-animales');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
