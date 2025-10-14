<?php

namespace App\Livewire\Empleado;

use App\Models\Empleado;
use App\Models\Rol;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\Rule;

class Modal extends ModalComponent
{
    public $id, $nombre, $cedula, $fecha_nacimiento, $telefono, $correo, $direccion, $rol_id, $estado;
    public $roles = [];


    public function mount(Empleado $empleado)
    {
        $this->id = $empleado->id;
        $this->nombre = $empleado->nombre;
        $this->cedula = $empleado->cedula;
        $this->fecha_nacimiento = $empleado->fecha_nacimiento;
        $this->telefono = $empleado->telefono;
        $this->correo = $empleado->correo;
        $this->direccion = $empleado->direccion;
        $this->rol_id = $empleado->rol_id;
        $this->roles = Rol::pluck('nombre', 'id')->toArray();
        $this->estado = $empleado->estado ?? 1;
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
            "fecha_nacimiento" => 'required|date|before:today',
            "telefono" => 'required|regex:/^[0-9+\s-]{5,15}$/',
            "correo" => [
                'required',
                'email',
                Rule::unique('empleados', 'correo')->ignore($this->id),
            ],
            "direccion" => 'required|string|max:255',
            "rol_id" => 'required|exists:roles,id',
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

            "fecha_nacimiento.required" => "La fecha de nacimiento es obligatoria.",
            "fecha_nacimiento.date" => "Debe ingresar una fecha válida.",
            "fecha_nacimiento.before" => "La fecha de nacimiento no puede ser en el futuro.",

            "telefono.required" => "El teléfono es obligatorio.",
            "telefono.regex" => "El teléfono debe contener solo números, espacios, guiones o el símbolo '+'.",

            "correo.required" => "El correo electrónico es obligatorio.",
            "correo.email" => "Debe ingresar un correo electrónico válido.",
            "correo.unique" => "Este correo ya está registrado.",

            "direccion.required" => "La dirección es obligatoria.",
            "direccion.max" => "La dirección no puede superar los 255 caracteres.",

            "rol_id.required" => "Debe seleccionar un rol.",
            "rol_id.exists" => "El rol seleccionado no es válido.",

            "estado.required" => "El estado es obligatorio.",
            "estado.in" => "El estado debe ser activo o inactivo.",
        ];
    }


    public function save()
    {

        if($this->id){
            //editamos la informacion del establo en caso de recibir un ID
            $empleado = Empleado::findOrFail($this->id);

            // validamos los campos del establo
            $validated = $this->validate();

            $empleado->update($validated);

            $this->closeModal();
            $this->dispatch("empleadoEditado");

        }else{

            // validamos los campos del establo
            $validated = $this->validate();

            //creamos el establo en caso de que no recibamos algun ID
            Empleado::create($validated);

            $this->closeModal();
            $this->dispatch("empleadoCreado");

        }

        
    }

    public function render()
    {
        return view('livewire.empleado.modal');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
