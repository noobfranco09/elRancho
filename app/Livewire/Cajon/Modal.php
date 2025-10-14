<?php

namespace App\Livewire\Cajon;

use App\Models\Establo;
use App\Models\Estanco;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class Modal extends ModalComponent
{


     public $id, $codigo, $establo_id, $capacidad, $estado;
     public $establos = [];


    public function mount(Estanco $cajon)
    {
        $this->id = $cajon->id;
        $this->codigo = $cajon->codigo;
        $this->capacidad =$cajon->capacidad;
        $this->establo_id = $cajon->establo_id;
        $this->establos = Establo::pluck('nombre', 'id')->toArray();
        $this->estado = $cajon->estado ?? 1;  // Si no hay estado, usa 'activo' como valor por defecto
    }

    public function rules()
    {
        return [
            "codigo" => [
                'required',
                'regex:/^[\pL\pN\s]+$/u',
                Rule::unique('estancos', 'codigo')->ignore($this->id),
            ],
            "capacidad" => "required|regex:/^[0-9+\s-]{1,15}$/",
            "establo_id" => "",
            "estado" => "required|in:1,0"
        ];
    }


    public function messages()
    {
        return [
            "codigo.required" => "El código es obligatorio.",
            "codigo.regex" => "El código solo debe contener letras y números.",
            "codigo.unique" => "El código ya está en uso, por favor elige otro.",

            "capacidad.required" => "La capacidad es obligatoria",
            "capacidad.regex" => "La capacidad solo debe ser numero y no permite letras o simbolos",

            "establo_id.required" => "El ID del establo es obligatorio.",
            "establo_id.numeric" => "El ID del establo debe ser un número.",

            "estado.required" => "El estado es obligatorio.",
            "estado.in" => "El estado debe ser 'libre' o 'ocupado'.",
        ];
    }


    public function save()
    {
        // Obtén el establo relacionado con el cajón
        $establo = Establo::findOrFail($this->establo_id);
        
        // Calcula la capacidad total ocupada por los cajones en ese establo
        $capacidadCajones = DB::table('estancos')->where("establo_id", $this->establo_id)->count();

        if($capacidadCajones >= $establo->capacidad)
        {
            $this->dispatch("capacidadError");
            return;
        }

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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
