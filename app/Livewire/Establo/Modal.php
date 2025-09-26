<?php

namespace App\Livewire\Establo;

use App\Models\Establo;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{

    public $id, $nombre, $descripcion, $estado;


    public function mount(Establo $establo)
    {
        $this->id = $establo->id;
        $this->nombre = $establo->nombre;
        $this->descripcion = $establo->descripcion;
        $this->estado = $establo->estado ?? 'activo';  // Si no hay estado, usa 'activo' como valor por defecto
    }

    public function rules()
    {
        return [
            "nombre" => "required|regex:/^[\pL\s]+$/u",
            "descripcion" => "required|regex:/^[\pL\s]+$/u",
            "estado" => "required|in:activo,inactivo"
        ];
    }

    public function messages()
    {
        return [

            "nombre.required" => "El nombre es obligatorio",
            "nombre.regex" => "El nombre solo debe contener letras",

            "descripcion.required" => "La descripción es obligatoria",
            "descripcion.regex" => "La descripción solo debe contener letras",

            "estado.required" => "El estado es obligatorio.",
            "estado.in" => "El estado debe ser 'activo' o 'inactivo'.",

        ];
    }

    public function save()
    {

        if($this->id){
            //editamos la informacion del establo en caso de recibir un ID
            $establo = Establo::findOrFail($this->id);

            // validamos los campos del establo
            $validated = $this->validate();

            $establo->update($validated);

            $this->closeModal();
            $this->dispatch("establoEditado");

        }else{

            // validamos los campos del establo
            $validated = $this->validate();

            //creamos el establo en caso de que no recibamos algun ID
            Establo::create($validated);

            $this->closeModal();
            $this->dispatch("establoCreado");

        }

        
    }


    public function render()
    {
        return view('livewire.establo.modal');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

   
}
