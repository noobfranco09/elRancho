<?php

namespace App\Livewire\Cajon;

use App\Models\Estanco;
use App\Models\Animal;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\DB;

class EliminarAnimalAsignado extends ModalComponent
{

    public $animal_id, $cajon_id;

    public function delete()
    {

        $animal = Animal::findOrFail($this->animal_id);

        $animal->estanco_id = null;
        $animal->save();

        // Obtén el establo relacionado con el cajón
        $cajon = Estanco::findOrFail($this->cajon_id);

        // Calcula la capacidad total ocupada por los cajones en ese establo
        $capacidadAnimales = DB::table('animales')->where("estanco_id", $this->cajon_id)->count();

        $cajon->estado = ($capacidadAnimales >= $cajon->capacidad) ? 0 : 1;
        $cajon->save();

        $this->closeModal();
        $this->dispatch("animalEliminado");


    }

    public function render()
    {
        return view('livewire.cajon.eliminar-animal-asignado');
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}
