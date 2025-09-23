<?php

namespace App\Livewire\Animal;

use App\Http\Requests\StoreAnimalRequest;
use App\Models\Animal;
use Carbon\Carbon;
use Livewire\Component;

class Form extends Component
{
    public $id,
        $nombre,
        $codigo,
        $precio,
        $imagen,
        $sexo,
        $color,
        $marcas,
        $salud,
        $fechaNacimiento,
        $estado;


    public function cargarAnimal(Animal $animal)
    {
        $this->id = $animal->id;
        $this->nombre = $animal->nombre;
        $this->codigo = $animal->codigo;
        $this->precio = $animal->precio;
        $this->imagen = $animal->imagen;
        $this->sexo = $animal->sexo;
        $this->color = $animal->color;
        $this->marcas = $animal->marcas;
        $this->salud = $animal->salud;
        $this->fechaNacimiento = $animal->fechaNacimiento;
        $this->estado = $animal->estado;
    }

    public function save()
    {
        Animal::create([
            "nombre" => $this->nombre,
            "codigo" => $this->codigo,
            "precio" => $this->precio,
            "imagen" => $this->imagen,
            "sexo" => $this->sexo,
            "color" => $this->color,
            "marcas" => $this->marcas,
            "salud" => $this->salud,
            "fecha_nacimiento" => $this->fechaNacimiento, // usar el valor del input
            "estado" => $this->estado,
        ]);

        $this->dispatch("animalCreado");
    }
    public function render()
    {
        return view('livewire.animal.form');
    }
}
