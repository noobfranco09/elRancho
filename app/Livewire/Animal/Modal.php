<?php

namespace App\Livewire\Animal;

use App\Models\Animal;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    use WithFileUploads;
    public Animal $animal;
    public $id,
        $nombre,
        $codigo,
        $precio,
        $imagen,
        $sexo,
        $color,
        $marcas,
        $fecha_nacimiento,
        $estado;

    public function mount(Animal $animal)
    {
        $this->id = $animal->id;
        $this->animal = $animal;
        $this->nombre = $animal->nombre;
        $this->codigo = $animal->codigo;
        $this->precio = $animal->precio;
        $this->imagen = $animal->imagen;
        $this->sexo = $animal->sexo ?? "M";
        $this->color = $animal->color;
        $this->marcas = $animal->marcas;
        $this->fecha_nacimiento = $animal->fechaNacimiento;
        $this->estado = $animal->estado ?? 1;
    }

    public function rules()
    {
        return [
            "nombre" => "required|string|max:255",
            "codigo" => "required|integer|max:99999|unique:animales,codigo," . $this->id,
            "precio" => "required|numeric|min:0",
            "imagen" => "nullable", // ignoramos por ahora
            "sexo" => "required|in:M,F",
            "color" => "required|string|max:100",
            "marcas" => "required|string|max:255",
            "fecha_nacimiento" => "required|date",
            "estado" => "required|boolean",
        ];
    }

    public function messages()
    {
        return [
            "nombre.required" => "El nombre del animal es obligatorio.",
            "nombre.string" => "El nombre debe ser una cadena de texto.",
            "nombre.max" => "El nombre no puede superar los 255 caracteres.",

            "codigo.required" => "El código es obligatorio.",
            "codigo.integer" => "El código debe ser una cadena de texto.",
            "codigo.max" => "El código no puede superar los 50 caracteres.",
            "codigo.unique" => "Este código ya está registrado para otro animal.",

            "precio.required" => "El precio es obligatorio.",
            "precio.numeric" => "El precio debe ser un número.",
            "precio.min" => "El precio no puede ser negativo.",

            "sexo.required" => "El sexo es obligatorio.",
            "sexo.in" => "El sexo debe ser 'M' (macho) o 'F' (hembra).",

            "color.required" => "El color es obligatorio.",
            "color.string" => "El color debe ser una cadena de texto.",
            "color.max" => "El color no puede superar los 100 caracteres.",

            "marcas.required" => "Las marcas son obligatorias.",
            "marcas.string" => "Las marcas deben ser una cadena de texto.",
            "marcas.max" => "Las marcas no pueden superar los 255 caracteres.",

            "fecha_nacimiento.required" => "La fecha de nacimiento es obligatoria.",
            "fecha_nacimiento.date" => "La fecha de nacimiento debe tener un formato válido.",

            "estado.required" => "El estado es obligatorio.",
            "estado.boolean" => "El estado debe ser verdadero (1) o falso (0).",
        ];
    }

    public function save()
    {
        $validated = $this->validate();
        if($this->imagen) {
            $path = $this->imagen->store("animales", "public");
            $validated["imagen"] = $path;
        }
        if ($this->id) {
            $animal = Animal::findOrFail($this->id);
            $animal->update($validated);

            $this->closeModal();
            $this->dispatch("animalEditado");
        } else {
            Animal::create($validated);

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
