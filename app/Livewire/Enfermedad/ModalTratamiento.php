<?php

namespace App\Livewire\Enfermedad;

use App\Models\Enfermedad;
use App\Models\Tratamiento;
use LivewireUI\Modal\ModalComponent;

class ModalTratamiento extends ModalComponent
{

    public $tratamientos = [];
    public
        $enfermedadId,
        $nuevoTratamiento,
        $fechaPrescripcion;

    public $isEditing = null;
    public $nuevoTratamientoEditar = [];

    public function mount(Enfermedad $enfermedad)
    {
        $this->tratamientos = Tratamiento::all();
        $this->enfermedadId = $enfermedad->id;
    }

    public function save()
    {
        Tratamiento::create([
            "enfermedad_id" => $this->enfermedadId,
            "descripcion" => $this->nuevoTratamiento,
            "fecha_prescripcion" => $this->fechaPrescripcion
        ]);

        $this->tratamientos = Tratamiento::all();
    }

    public function render()
    {
        return view('livewire.enfermedad.modal-tratamiento');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
