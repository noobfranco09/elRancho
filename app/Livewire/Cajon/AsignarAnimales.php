<?php

namespace App\Livewire\Cajon;

use App\Models\Estanco;
use App\Models\Animal;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\DB;

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

     public function rules()
    {
        return [
            
            "animal_id" => "required|numeric|exists:animales,id",
            "cajon_id" => "required|numeric|exists:estancos,id",
            
        ];
    }


    public function messages()
    {
        return [

            "animal_id.required" => "El ID del establo es obligatorio.",
            "animal_id.numeric" => "El ID del establo debe ser un número.",

            "cajon_id.required" => "El ID del establo es obligatorio.",
            "cajon_id.numeric" => "El ID del establo debe ser un número.",
          
        ];
    }

    public function save()
    {

        // Obtén el establo relacionado con el cajón
        $cajon = Estanco::findOrFail($this->cajon_id);

        // Calcula la capacidad total ocupada por los cajones en ese establo
        $capacidadAnimales = DB::table('animales')->where("estanco_id", $this->cajon_id)->count();

        if($capacidadAnimales == ($cajon->capacidad - 1))
        {
            $cajon = Estanco::findOrFail($this->cajon_id);

            $cajon->estado = 0;
            $cajon->save();

        }elseif ($capacidadAnimales < ($cajon->capacidad - 1)){

            $cajon = Estanco::findOrFail($this->cajon_id);

            $cajon->estado = 1;
            $cajon->save();

        }

        if($capacidadAnimales >= $cajon->capacidad)
        {
            $this->dispatch("capacidadError");
            return;
        }

        if($this->animal_id && $this->cajon_id)
        {
            $animal = Animal::findOrFail($this->animal_id);

            $validated = $this->validate();

            $animal->estanco_id = $this->cajon_id;
            $animal->save();

            $this->closeModal();
            $this->dispatch("animalAsignado");
        }
        

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
