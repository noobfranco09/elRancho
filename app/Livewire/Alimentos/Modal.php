<?php

namespace App\Livewire\Alimentos;

use App\Models\Alimento;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Livewire\Component;

class Modal extends ModalComponent
{
    public Alimento $alimento;
    public $id, $nombre, $observaciones, $precio, $unidad, $cantidad;
    public function render()
    {
        return view('livewire.alimentos.modal');
    }
    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
    public function rules()
    {
        return [
            "nombre" => ['required', 'regex:/^[\pL\s]+$/u'],
            // permite letras, números, espacios, y puntuación básica (. , - ( ) :)
            "observaciones" => ['nullable', 'regex:/^[\pL0-9\s.,()\-:;]+$/u'],
            "precio" => ['required', 'integer', 'min:0', 'max:999999999'],
            "unidad" => ['required', 'regex:/^[\pL\s]+$/u'],
            "cantidad" => ['required', 'integer', 'min:0', 'max:999999999'],
        ];
    }

    public function messages()
    {
        return [
            // Nombre
            "nombre.required" => "El nombre es obligatorio",
            "nombre.regex" => "El nombre no puede contener números ni caracteres especiales",

            // Observaciones
            "observaciones.regex" => "La descripción solo puede contener letras, números y signos de puntuación comunes (.,()-:;)",

            // Cantidad
            "cantidad.required" => "La cantidad es obligatoria",
            "cantidad.integer" => "La cantidad debe ser un número entero",
            "cantidad.min" => "La cantidad no puede ser menor que cero",
            "cantidad.max" => "El precio es demasiado grande",


            // Precio
            "precio.required" => "El precio es obligatorio",
            "precio.integer" => "El precio debe ser un número entero",
            "precio.min" => "El precio no puede ser menor que cero",
            "precio.max" => "El precio es demasiado grande",

            // Unidad
            "unidad.required" => "La unidad es obligatoria",
            "unidad.regex" => "La unidad no puede contener números ni caracteres especiales",
        ];
    }


    public function save()
    {
        $validar = $this->validate();

        if ($this->id) {
            $alimento = Alimento::findOrFail($this->id);
            $alimento->update($validar);
            $this->closeModal();
            $this->dispatch("alimentoEditado");
        } else {
            Alimento::create([
                'nombre' => $this->nombre,
                'observaciones' => $this->observaciones,
                'precio' => $this->precio,
                'unidad' => $this->unidad,
                'cantidad' => $this->cantidad,

            ]);
            $this->closeModal();
            $this->dispatch("alimentoCreado");

        }

    }
    public function mount(Alimento $alimentos)
    {
        $this->id = $alimentos->id;
        $this->nombre = $alimentos->nombre;
        $this->observaciones = $alimentos->observaciones;
        $this->precio = $alimentos->precio;
        $this->unidad = $alimentos->unidad;
        $this->cantidad = $alimentos->cantidad;

    }
}
