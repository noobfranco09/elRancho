<?php

namespace App\Livewire\Animal;

use App\Models\Animal;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    public Animal $animal;
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

    public function mount(Animal $animal)
    {
        $this->id = $animal->id;
        $this->animal = $animal;
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
        if ($this->id) {
            $animal = Animal::findOrFail($this->id);
            $animal->update([
                "nombre" => $this->nombre,
                "precio" => $this->precio,
                "imagen" => $this->imagen,
                "sexo" => $this->sexo,
                "color" => $this->color,
                "marcas" => $this->marcas,
                "salud" => $this->salud,
                "fecha_nacimiento" => $this->fechaNacimiento, // usar el valor del input
                "estado" => $this->estado,
            ]);

            $this->closeModal();
            $this->dispatch("animalEditado");

        } else {
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

            $this->closeModal();
            $this->dispatch("animalCreado");
        }
    }


    public function render()
    {
        return view('livewire.animal.modal');
    }
    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
