<?php

namespace App\Livewire\Vacunacion;

use App\Models\Vacuna;
use App\Models\Vacunacion;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    public $animalId;
    public $vacunaId;
    public $vacunas = [];
    public $estado;
    public Vacunacion $vacunacion;
    public $fecha;

    public function rules()
    {
        return [
            "fecha" => "required|date|before:tomorrow",
            "vacunaId" => "required"
        ];
    }

    public function messages()
    {
        return [
            "fecha.required" => "La fecha es obligatoria",
            "fecha.date" => "La fecha no tiene el formato correcto",
            "fecha.before" => "La fecha no puede estar en el futuro",

            "vacunaId.required" => "La vacuna es obligatoria"
        ];
    }

    public function updated($propertyName)
    {
        return $this->validateOnly($propertyName);
    }

    public function mount(Vacunacion $vacunacion)
    {
        $this->vacunas = Vacuna::pluck("nombre", "id")->toArray();
        $this->fecha = $vacunacion->fechaVacunacion;
        $this->vacunaId = $vacunacion->vacunaId;

    }
    public function save()
    {
        $validated = $this->validate();

        Vacunacion::create([
            "fecha_vacunacion" => $validated["fecha"],
            "animal_id" => $this->animalId,
            "vacuna_id" => $validated["vacunaId"]
        ]);

        $this->closeModal();
        $this->dispatch("vacunacionCreada");

    }

    public function render()
    {
        return view('livewire.vacunacion.modal');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
