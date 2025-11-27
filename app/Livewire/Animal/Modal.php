<?php

namespace App\Livewire\Animal;

use App\Models\Animal;
use App\Models\Especie;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    use WithFileUploads;
    public Animal $animal;
    public $especies = [];
    public $id,
        $codigo,
        $precio,
        $imagen,
        $sexo,
        $especie_id,
        $color,
        $fecha_nacimiento,
        $estado;
    public $nombre = "sin nombre";
    public $marcas = "sin marcas";

    public function mount(Animal $animal)
    {
        $this->id = $animal->id;
        $this->animal = $animal;
        $this->nombre = $animal->nombre;
        $this->codigo = $animal->codigo;
        $this->precio = $animal->precio;
        $this->imagen = $animal->imagen;
        $this->sexo = $animal->sexo ?? "M";
        $this->especie_id = $animal->especie;
        $this->especies = Especie::pluck("nombre", "id")->toArray();
        $this->color = $animal->color;
        $this->marcas = $animal->marcas;
        $this->fecha_nacimiento = $animal->fechaNacimiento;
        $this->estado = $animal->estado ?? 1;
    }


    public function rules()
    {
        return [
            "nombre" => "string|max:255",
            "codigo" => "required|integer|max:99999|unique:animales,codigo," . $this->id,
            "precio" => "required|numeric|min:0",
            "imagen" => "nullable|image|mimes:jpg,jpeg,png,gif|max:2048",
            "sexo" => "required|in:M,F",
            "especie_id" => "required",
            "color" => "required|string|max:100",
            "marcas" => "string|max:255",
            "fecha_nacimiento" => "required|date",
            "estado" => "required|boolean",
        ];
    }

    public function messages()
    {
        return [
            "nombre.string" => "El nombre debe ser una cadena de texto.",
            "nombre.max" => "El nombre no puede superar los 255 caracteres.",

            "codigo.required" => "El código es obligatorio.",
            "codigo.integer" => "El código debe ser una cadena de texto.",
            "codigo.max" => "El código no puede superar los 50 caracteres.",
            "codigo.unique" => "Este código ya está registrado para otro animal.",

            "imagen.image" => "El archivo debe ser una imagen.",
            "imagen.mimes" => "Solo se permiten imágenes en formato JPG, JPEG, PNG o GIF.",
            "imagen.max" => "La imagen no puede superar los 2 MB.",

            "precio.required" => "El precio es obligatorio.",
            "precio.numeric" => "El precio debe ser un número.",
            "precio.min" => "El precio no puede ser negativo.",

            "sexo.required" => "El sexo es obligatorio.",
            "sexo.in" => "El sexo debe ser 'M' (macho) o 'F' (hembra).",

            "color.required" => "El color es obligatorio.",
            "color.string" => "El color debe ser una cadena de texto.",
            "color.max" => "El color no puede superar los 100 caracteres.",

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

        if ($this->id) {
            $animal = Animal::findOrFail($this->id);

            $validated["imagen"] = $this->handleImage($animal->imagen);
            $animal->update($validated);

            $this->closeModal();
            $this->dispatch("animalEditado");
        } else {
            $validated['imagen'] = $this->handleImage();
            Animal::create($validated);

            $this->closeModal();
            $this->dispatch("animalCreado");
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function handleImage($imagenAnterior = null)
    {
        if (!$this->imagen) {
            return $imagenAnterior;
        }

        if ($imagenAnterior && Storage::disk("public")->exists($imagenAnterior)) {
            Storage::disk("public")->delete($imagenAnterior);
        }

        return $this->imagen->store("animales", "public");
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
