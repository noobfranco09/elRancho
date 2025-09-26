<?php

namespace App\Livewire\Veterinario;
use App\Models\Vacuna;
use App\Models\Veterinario;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    public Veterinario $veterinario;
    public $id, $nombre, $cedula, $telefono, $especialidad, $correo;
    public function render()
    {
        return view('livewire.veterinario.modal');
    }
    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
    public function rules()
    {
        return [
            "nombre" => "required|regex:/^[\pL\s]+$/u",
            "cedula" => "required|integer|min:0",
            "correo" => "required|email",
            "telefono" => "required|integer|min:0",
            "especialidad" => "required|regex:/^[\pL\s]+$/u",
            
        ];
    }

public function messages()
{
    return [
        // Nombre
        "nombre.required" => "El nombre es obligatorio",
        "nombre.regex"    => "El nombre no puede contener números ni caracteres especiales",

        // Cédula
        "cedula.required" => "La cédula es obligatoria",
        "cedula.integer"  => "La cédula debe ser un número entero",
        "cedula.min"      => "La cédula no puede ser menor que cero",

        // Correo
        "correo.required" => "El correo es obligatorio",
        "correo.email"    => "El correo debe tener un formato válido",

        // Teléfono
        "telefono.required" => "El teléfono es obligatorio",
        "telefono.integer"  => "El teléfono debe contener solo números",
        "telefono.min"      => "El teléfono no puede ser un número negativo",

        // Especialidad
        "especialidad.required" => "La especialidad es obligatoria",
        "especialidad.regex"    => "La especialidad no puede contener números ni caracteres especiales",
    ];
}

    public function save()
    {
        $this->validate();
        if ($this->id) {
            $veterinario = Veterinario::findOrFail($this->id);
            $veterinario->update([
                'nombre' => $this->nombre,
                'cedula' => $this->cedula,
                'correo' => $this->correo,
                'telefono' => $this->telefono,
                'especialidad' => $this->especialidad,
            ]);
            $this->closeModal();
            $this->dispatch("veterinarioEditado");
        } else {
            Veterinario::create([
                'nombre' => $this->nombre,
                'cedula' => $this->cedula,
                'correo' => $this->correo,
                'telefono' => $this->telefono,
                'especialidad' => $this->especialidad,
            ]);
            $this->closeModal();
            $this->dispatch("veterinarioCreado");
        }

    }
    public function mount(Veterinario $veterinario)
    {
        $this->id = $veterinario->id;
        $this->nombre = $veterinario->nombre;
        $this->cedula = $veterinario->cedula;
        $this->telefono = $veterinario->telefono;
        $this->especialidad = $veterinario->especialidad;
        $this->correo = $veterinario->correo;
    }
}
