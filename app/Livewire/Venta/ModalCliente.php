<?php

namespace App\Livewire\Venta;

use LivewireUI\Modal\ModalComponent;

class ModalCliente extends ModalComponent
{
    public $identificacion;

    public function render()
    {
        return view('livewire.venta.modal-cliente');
    }

    public function rules()
    {
        return [
            "identificacion" => "required|integer"
        ];
    }

    public function messages()
    {
        return [
            "identificacion.required" => "La identificación del cliente es obligatoria",
            "identificacion.integer" => "La identificación debe ser un número"
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function buscarCliente()
    {
        $this->validate();
        return redirect()->route("clientes.create", $this->identificacion);
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
