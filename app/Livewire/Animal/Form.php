<?php

namespace App\Livewire\Animal;

use App\Http\Requests\StoreAnimalRequest;
use App\Models\Animal;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $nombre;
    public $codigo;
    public $precio;
    public $imagen;
    public $sexo;
    public $color;
    public $marcas;
    public $salud;
    public $fechaNacimiento;
    public $estado;

    public $mostrarModal = false;

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

        $this->mostrarModal = true;
    }

    public function save() {
        Animal::create([
            "nombre" => $this->nombre,
            "codigo" => $this->codigo,
            "precio" => $this->precio,
            "imagen" => $this->imagen,
            "sexo" => $this->sexo,
            "color" => $this->color,
            "marcas" => $this->marcas,
            "salud" => $this->salud,
            "fechaNacimiento" => $this->fechaNacimiento,
            "estado" => $this->estado,
        ]);
    }
    public function render()
    {
        return view('livewire.animal.form');
    }
}
