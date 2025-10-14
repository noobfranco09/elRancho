<?php

namespace App\Livewire\Enfermedad;

use LivewireUI\Modal\ModalComponent;
use App\Models\Enfermedad;

class Modal extends ModalComponent
{
    public $animal_id;
    public Enfermedad $enfermedad;
    public
        $id,
        $fecha,
        $descripcion,
        $estado;



    public function mount(Enfermedad $enfermedad, $animal_id = null)
    {
        $this->animal_id = $animal_id;
        $this->id = $enfermedad->id;
        $this->fecha = $enfermedad->fecha;
        $this->descripcion = $enfermedad->descripcion;
        $this->estado = $enfermedad->estado;
    }

    public function rules()
    {
        return [
            'fecha' => 'required|date',
            'descripcion' => 'required|string|min:5|max:500',
            'estado' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe tener un formato válido.',

            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser un texto.',
            'descripcion.min' => 'La descripción debe tener al menos :min caracteres.',
            'descripcion.max' => 'La descripción no puede superar los :max caracteres.',

            'estado.required' => 'El estado es obligatorio.',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->id) {
            $enfermedad = Enfermedad::findOrFail($this->id);
            $enfermedad->update($validated);

            $this->dispatch("enfermedadEditada");
            $this->closeModal();
        } else {
            Enfermedad::create($validated + ["animal_id" => $this->animal_id]);

            $this->dispatch("enfermedadCreada");
            $this->closeModal();
        }
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function render()
    {
        return view('livewire.enfermedad.modal');
    }
}
