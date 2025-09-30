<?php

namespace App\Livewire\Cajon;

use App\Models\Establo;
use App\Models\Estanco;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\Rule;

class Modal extends ModalComponent
{


     public $id, $codigo, $establo_id, $estado;
     public $establos = [];


    public function mount(Estanco $cajon)
    {
        $this->id = $cajon->id;
        $this->codigo = $cajon->codigo;
        $this->establo_id = $cajon->establo_id;
        $this->establos = Establo::pluck('nombre', 'id')->toArray();
        $this->estado = $cajon->estado ?? 'libre';  // Si no hay estado, usa 'activo' como valor por defecto
    }

    public function rules()
    {
        return [
            "codigo" => [
                'required',
                'regex:/^[\pL\pN\s]+$/u',
                Rule::unique('estancos', 'codigo')->ignore($this->id),
            ],
            "establo_id" => "",
            "estado" => "required|in:libre,ocupado"
        ];
    }


    public function messages()
    {
        return [
            "codigo.required" => "El código es obligatorio.",
            "codigo.regex" => "El código solo debe contener letras y números.",
            "codigo.unique" => "El código ya está en uso, por favor elige otro.",

            "establo_id.required" => "El ID del establo es obligatorio.",
            "establo_id.numeric" => "El ID del establo debe ser un número.",

            "estado.required" => "El estado es obligatorio.",
            "estado.in" => "El estado debe ser 'libre' o 'ocupado'.",
        ];
    }


    public function save()
    {

        if($this->id){
            //editamos la informacion del establo en caso de recibir un ID
            $cajon = Estanco::findOrFail($this->id);

            // validamos los campos del establo
            $validated = $this->validate();

            $cajon->update($validated);

            $this->closeModal();
            $this->dispatch("cajonEditado");

        }else{

            // validamos los campos del establo
            $validated = $this->validate();

            //creamos el establo en caso de que no recibamos algun ID
            Estanco::create($validated);

            $this->closeModal();
            $this->dispatch("cajonCreado");

        }

        
    }

    public function render()
    {
        return view('livewire.cajon.modal');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

}
