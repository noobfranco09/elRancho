<?php

namespace App\Livewire\Empleado;

use App\Models\Empleado;
use App\Models\Rol;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class Modal extends ModalComponent
{
    public $id, $name, $fecha_nacimiento, $telefono, $email, $direccion, $rol_id, $estado, $password;
    public $roles = [];


    public function mount(Empleado $empleado)
    {
        $this->id = $empleado->id;
        $this->name = $empleado->name;
        $this->fecha_nacimiento = $empleado->fecha_nacimiento;
        $this->telefono = $empleado->telefono;
        $this->email = $empleado->email;
        $this->direccion = $empleado->direccion;
        $this->rol_id = $empleado->rol_id;
        $this->roles = Rol::pluck('nombre', 'id')->toArray();
        $this->estado = $empleado->estado ?? 1;
        // ⚠️ No encriptamos aquí, solo si es un empleado nuevo se pondría vacío.
        $this->password = $empleado->exists ? '' : $empleado->password;
    }

    public function rules()
    {
        return [
            "name" => 'required|regex:/^[\pL\s]+$/u|min:3|max:100', // solo letras y espacios
            "password" => [
                $this->id ? 'nullable' : 'required',
                'min:5',
                Rule::unique('empleados', 'password')->ignore($this->id),
            ],
            "fecha_nacimiento" => 'required|date|before:today',
            "telefono" => 'required|regex:/^[0-9+\s-]{5,15}$/',
            "email" => [
                'required',
                'email',
                Rule::unique('empleados', 'email')->ignore($this->id),
            ],
            "direccion" => 'required|string|max:255',
            "rol_id" => 'required|exists:roles,id',
            "estado" => 'required|in:1,0'

        ];
    }


    public function messages()
    {
        return [
            "name.required" => "El nombre es obligatorio.",
            "name.regex" => "El nombre solo debe contener letras y espacios.",
            "name.min" => "El nombre debe tener al menos 3 caracteres.",
            "name.max" => "El nombre no debe superar los 100 caracteres.",

            "password.required" => "La contraseña es obligatoria.",
            "password.min" => "La contraseña debe tener al menos 6 caracteres.",
            "password.unique" => "Esta contraseña ya está registrada.",

            "fecha_nacimiento.required" => "La fecha de nacimiento es obligatoria.",
            "fecha_nacimiento.date" => "Debe ingresar una fecha válida.",
            "fecha_nacimiento.before" => "La fecha de nacimiento no puede ser en el futuro.",

            "telefono.required" => "El teléfono es obligatorio.",
            "telefono.regex" => "El teléfono debe contener solo números, espacios, guiones o el símbolo '+'.",

            "email.required" => "El correo electrónico es obligatorio.",
            "email.email" => "Debe ingresar un correo electrónico válido.",
            "email.unique" => "Este correo ya está registrado.",

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

        $validated = $this->validate();

        // 🔐 Aplicar bcrypt SOLO si se escribió una contraseña nueva
        if (!empty($validated['password']) && !str_starts_with($validated['password'], '$2y$')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']); // no modificar si no se cambió
        }

        if($this->id){
            //editamos la informacion del establo en caso de recibir un ID
            $empleado = Empleado::findOrFail($this->id);

            $empleado->update($validated);

            $this->closeModal();
            $this->dispatch("empleadoEditado");

        }else{

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
