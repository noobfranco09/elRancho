<?php

namespace App\Livewire\Alimentacion;

use LivewireUI\Modal\ModalComponent;
use App\Models\Alimentacion;
use App\Models\Alimento;
use phpDocumentor\Reflection\Types\This;

class Modal extends ModalComponent
{
    public $alimentacion;
    public $animal_id;
    public $alimentos = [];
    public $fecha, $cantidad;


    public $alimentoId;
    public Alimento $alimento;


    public function mount(Alimentacion $alimentacion, $animal_id = null)
    {
        $this->animal_id = $animal_id;
        $this->alimentacion = $alimentacion;

        $this->alimentos = Alimento::pluck("nombre", "id")->toArray();
        $this->cantidad = $alimentacion->cantidad;
        $this->fecha = $alimentacion->fecha;
        $this->alimentoId = $alimentacion->alimento_id;
    }

    public function rules()
    {
        return [

            "cantidad" => "required|integer|between:0,10000",
            "fecha" => "required|date|before:tomorrow",
            "alimentoId" => "required|integer|exists:alimentos,id"
        ];
    }

    public function messages()
    {
        return [

            "cantidad.required" => "La cantidad es obligatoria",
            "cantidad.integer" => "La cantidad debe ser numerica",
            "cantidad.between" => "La cantidad debe estar entre 0 y 10000",

            "fecha.required" => "La fecha es obligatoria",
            "fecha.date" => "La fecha no tiene el formato correcto",
            "fecha.before" => "La fecha no puede estar en el futuro",

            "alimentoId.required" => "El alimento a suministrar es obligatorio",
            "alimentoId.integer" => "El ID del alimento es inválido",
            "alimentoId.exists" => "El alimento tiene que ser alguno de los ya existentes"
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($this->alimentoId && $this->cantidad) {
            $this->validarStock();
        }
    }

    public function validarStock()
    {
        $alimento = Alimento::find($this->alimentoId);

        if ($alimento->cantidad < $this->cantidad) {
            $this->addError('cantidad', "Quedan solo {$alimento->cantidad} existencias de este alimento");
            return false;
        }
        return true;
    }

    public function save()
    {
        $validated = $this->validate();

        if (!$this->validarStock()) return;

        if ($this->alimentacion->id) {
            $this->alimentacion->update([
                "cantidad" => $validated["cantidad"],
                "fecha" => $validated["fecha"],
                "alimento_id" => $validated["alimentoId"]
            ]);
            $this->dispatch("alimentacionEditada");
        } else {

            Alimentacion::create([
                "cantidad" => $validated["cantidad"],
                "animal_id" => $this->animal_id,
                "alimento_id" => $validated["alimentoId"],
                "fecha" => $validated["fecha"],
            ]);

            $this->dispatch("alimentacionCreada");
        }





        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public function render()
    {
        return view('livewire.alimentacion.modal');
    }
}
