<?php

namespace App\Livewire\Vacuna;

use App\Models\Vacuna;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    public Vacuna $vacuna;
    public $id,
        $nombre,
        $descripcion,
        $dosis;

    public function rules()
    {
        return [
            "nombre" => "required|regex:/^[\pL\s]+$/u",
            "descripcion" => "required|regex:/^[\pL\s]+$/u",
            "dosis" => "required|integer|min:0"
        ];
    }

    public function messages()
    {
        return [
            "nombre.required" => "El nombre es obligatorio",
            "nombre.regex" => "El nombre solo debe contener letras",
            "descripcion.required" => "La descripción es obligatoria",
            "descripcion.regex" => "La descripción solo debe contener letras",
            "dosis.required" => "La dosis es obligatoria",
            "dosis.integer" => "La dosis debe ser un número",
            "dosis.min" => "La dosis debe ser al menos 0",
        ];
    }

    public function mount(Vacuna $vacuna)
    {
        $this->id = $vacuna->id;
        $this->vacuna = $vacuna;
        $this->nombre = $vacuna->nombre;
        $this->descripcion = $vacuna->descripcion;
        $this->dosis = $vacuna->dosis;
    }

    public function render()
    {
        return view('livewire.vacuna.modal');
    }

    public function save()
    {
        $validated = $this->validate();
        if ($this->id) {
            $vacuna = Vacuna::findOrFail($this->id);
            $vacuna->update($validated);

            $this->closeModal();
            $this->dispatch("vacunaEditada");
        } else {
            Vacuna::create($validated);

            $this->closeModal();
            $this->dispatch("vacunaCreada");
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
