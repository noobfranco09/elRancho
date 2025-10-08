<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\Rule;

class Modal extends ModalComponent
{
    public $id, $nombre, $cedula, $telefono, $correo, $direccion, $estado;

    public function mount(Cliente $cliente)
    {
        $this->id = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->cedula = $cliente->cedula;
        $this->telefono = $cliente->telefono;
        $this->correo = $cliente->correo;
        $this->direccion = $cliente->direccion;
        $this->estado = $cliente->estado ?? 1;
    }

    public function rules()
    {
        return [
            "nombre" => 'required|regex:/^[\pL\s]+$/u|min:3|max:100', // solo letras y espacios
            "cedula" => [
                'required',
                'numeric',
                'digits_between:6,12',
                Rule::unique('empleados', 'cedula')->ignore($this->id),
            ],
            "telefono" => 'required|regex:/^[0-9+\s-]{7,15}$/',
            "correo" => [
                'required',
                'email',
                Rule::unique('empleados', 'correo')->ignore($this->id),
            ],
            "direccion" => 'required|string|max:255',
            "estado" => 'required|in:1,0'

        ];
    }


    public function messages()
    {
        return [
            "nombre.required" => "El nombre es obligatorio.",
            "nombre.regex" => "El nombre solo debe contener letras y espacios.",
            "nombre.min" => "El nombre debe tener al menos 3 caracteres.",
            "nombre.max" => "El nombre no debe superar los 100 caracteres.",

            "cedula.required" => "La cédula es obligatoria.",
            "cedula.numeric" => "La cédula debe contener solo números.",
            "cedula.digits_between" => "La cédula debe tener entre 6 y 12 dígitos.",
            "cedula.unique" => "Esta cédula ya está registrada.",

            "telefono.required" => "El teléfono es obligatorio.",
            "telefono.regex" => "El teléfono debe contener solo números, espacios, guiones o el símbolo '+'.",

            "correo.required" => "El correo electrónico es obligatorio.",
            "correo.email" => "Debe ingresar un correo electrónico válido.",
            "correo.unique" => "Este correo ya está registrado.",

            "direccion.required" => "La dirección es obligatoria.",
            "direccion.max" => "La dirección no puede superar los 255 caracteres.",

            "estado.required" => "El estado es obligatorio.",
            "estado.in" => "El estado debe ser activo o inactivo.",
        ];
    }


    public function save()
    {

        if($this->id){
            //editamos la informacion del establo en caso de recibir un ID
            $cliente = Cliente::findOrFail($this->id);

            // validamos los campos del establo
            $validated = $this->validate();

            $cliente->update($validated);

            $this->closeModal();
            $this->dispatch("clienteEditado");

        }else{

            // validamos los campos del establo
            $validated = $this->validate();

            //creamos el establo en caso de que no recibamos algun ID
            Cliente::create($validated);

            $this->closeModal();
            $this->dispatch("clienteCreado");

        }

        
    }

    public function render()
    {
        return view('livewire.cliente.modal');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

}
