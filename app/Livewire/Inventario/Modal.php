<?php

namespace App\Livewire\Inventario;

use App\Models\Inventario;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Livewire\Component;

class Modal extends ModalComponent
{
    public Inventario $inventario;
    public $id, $nombre, $cantidad, $estado;
    public function render()
    {
        return view('livewire.inventario.modal');
    }
    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
    public function rules()
    {
        return [
            "nombre" => "required|regex:/^[\pL\s]+$/u",
            "cantidad" => ['required','integer','min:0', ],
        ];
    }

    public function messages()
    {
        return [
            // Nombre
            "nombre.required" => "El nombre es obligatorio",
            "nombre.regex" => "El nombre no puede contener números ni caracteres especiales",

            // Cantidad
            "cantidad.required" => "La cédula es obligatoria",
            "cantidad.integer" => "La cédula debe ser un número entero",
            "cantidad.min" => "La cédula no puede ser menor que cero",

        ];
    }

    public function save()
    {
        $validar = $this->validate();

        if ($this->id) {
            $inventario = Inventario::findOrFail($this->id);
            $inventario->update($validar);
            $this->closeModal();
            $this->dispatch("inventarioEditado");
        } else {
            Inventario::create([
                'nombre' => $this->nombre,
                'cantidad' => $this->cedula,
            ]);
            $this->closeModal();
            $this->dispatch("inventarioCreado");

        }

    }
    public function mount(Inventario $inventario)
    {
        $this->id = $inventario->id;
        $this->nombre = $inventario->nombre;
        $this->cantidad = $inventario->cedula;
    }
}
