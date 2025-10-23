<?php

namespace App\Livewire\Rol;

use App\Models\Rol;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
     public $id, $nombre, $estado;


    public function mount(Rol $rol)
    {
        $this->id = $rol->id;
        $this->nombre = $rol->nombre;
        $this->estado = $rol->estado ?? 1;  // Si no hay estado, usa 'activo' como valor por defecto
    }

    public function rules()
    {
        return [
        
            "nombre" => "required|string|max:255",
            "estado" => "required|in:1,0"
        ];
    }


    public function messages()
    {
        return [
            "nombre.required" => "El nombre del rol es obligatorio.",
            "nombre.string" => "El nombre de rol debe ser una cadena de texto.",
            "nombre.max" => "El nombre del rol no puede superar los 255 caracteres.",

            "estado.required" => "El estado es obligatorio.",
            "estado.in" => "El estado debe ser 'libre' o 'ocupado'.",
        ];
    }


    public function save()
    {

        if($this->id){
            //editamos la informacion del establo en caso de recibir un ID
            $rol = Rol::findOrFail($this->id);

            // validamos los campos del establo
            $validated = $this->validate();

            $rol->update($validated);

            $this->closeModal();
            $this->dispatch("rolEditado");

        }else{

            // validamos los campos del establo
            $validated = $this->validate();

            //creamos el establo en caso de que no recibamos algun ID
            Rol::create($validated);

            $this->closeModal();
            $this->dispatch("rolCreado");

        }

        
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.rol.modal');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
