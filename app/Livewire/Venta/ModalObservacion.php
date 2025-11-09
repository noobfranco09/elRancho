<?php

namespace App\Livewire\Venta;

use LivewireUI\Modal\ModalComponent;

class ModalObservacion extends ModalComponent
{
    public $observacion;

    public function rules()
    {
        return [
            "observacion" => "required|string|max:200"
        ];
    }

    public function messages()
    {
        return [
            "observacion.required" => "No ingresado ninguna información",
            "observacion.max" => "La observación no puede superar los 200 carácteres",
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->dispatch("asignarObservacion", observacion: $this->observacion);
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.venta.modal-observacion');
    }
}
