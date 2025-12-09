<?php

namespace App\Livewire\Enfermedad;

use App\Models\Enfermedad;
use App\Models\Tratamiento;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class ModalTratamiento extends ModalComponent
{

    public $tratamientos = [];
    public
        $enfermedadId,
        $nuevoTratamiento,
        $fechaPrescripcion;

    public $isEditing = null;
    public $datosTratamientoEditar = [];

    public function mount(Enfermedad $enfermedad)
    {

        $this->enfermedadId = $enfermedad->id;
        $this->loadTratamientos();
    }

    public function loadTratamientos()
    {
        $this->tratamientos = Tratamiento::where("enfermedad_id", $this->enfermedadId)
            ->orderBy("fecha_prescripcion", "desc")
            ->get();
    }

    public function toggleEdit($id)
    {
        if ($this->isEditing === $id) {
            $this->save($id);
            $this->isEditing = null;
        } else {
            $this->isEditing = $id;
            $tratamiento = Tratamiento::findOrFail($id);

            $this->datosTratamientoEditar[$id] = [
                "descripcion" => $tratamiento->descripcion,
                "fecha_prescripcion" => Carbon::parse($tratamiento->fecha_prescripcion)->format("Y-m-d")
            ];
        }
    }

    public function save($id = null)
    {
        if ($id) {
            $data = $this->datosTratamientoEditar[$id];
            $this->validate([
                "datosTratamientoEditar.{$id}.descripcion" => 'required|string|max:255',
                "datosTratamientoEditar.{$id}.fecha_prescripcion" => 'required|date',
            ]);

            $tratamiento = Tratamiento::findOrFail($id);

            $tratamiento->update([
                'descripcion' => $data['descripcion'],
                'fecha_prescripcion' => $data['fecha_prescripcion'],
            ]);

            $this->loadTratamientos();
            $this->reset(['isEditing', 'datosTratamientoEditar']);
        } else {
            $this->validate([
                'nuevoTratamiento' => 'required|string|max:255',
                'fechaPrescripcion' => 'required|date',
            ]);

            Tratamiento::create([
                "enfermedad_id" => $this->enfermedadId,
                "descripcion" => $this->nuevoTratamiento,
                "fecha_prescripcion" => $this->fechaPrescripcion
            ]);

            $this->loadTratamientos();
            $this->reset(['nuevoTratamiento', 'fechaPrescripcion']);
        }
    }

    public function delete($id)
    {
        Tratamiento::findOrFail($id)->delete();
        $this->loadTratamientos();
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
