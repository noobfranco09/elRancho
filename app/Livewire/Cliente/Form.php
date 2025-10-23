<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Attributes\On;
use Livewire\Component;


class Form extends Component
{
    public $cedula = '';
    public $nombre = '';
    public $telefono  = '';
    public $correo = '';
    public $direccion = '';

    #[On("cliente-seleccionado")]
    public function cargarCliente($cedula)
    {
        $cliente = Cliente::where('cedula', $cedula)->first();
        $this->cedula = $cedula;

        if ($cliente) {
            $this->nombre = $cliente->nombre;
            $this->telefono = $cliente->telefono;
            $this->correo = $cliente->correo;
            $this->direccion = $cliente->direccion;

            session()->flash("success", "Datos del cliente cargados");
        } else {
            $this->clearInputs();
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function rules()
    {
        return [

            "cedula" => "required",
            "nombre" => "required|string|min:3|max:40",
            "telefono" => "required|integer|digits_between:7,10",
            "correo" => "nullable|email|max:150|unique:clientes,correo,{$this->cedula},cedula",
            "direccion" => "nullable|string|max:255",
        ];
    }

    public function messages()
    {
        return [
            "nombre.required" => "El nombre es obligatorio.",
            "nombre.string" => "El nombre debe ser una cadena de texto.",
            "nombre.min" => "El nombre debe tener al menos :min caracteres.",
            "nombre.max" => "El nombre no puede tener más de :max caracteres.",

            "telefono.required" => "El teléfono es obligatorio.",
            "telefono.integer" => "El teléfono debe ser un número.",
            "telefono.digits_between" => "El teléfono debe tener entre :min y :max dígitos.",

            "correo.email" => "El correo electrónico debe tener un formato válido.",
            "correo.max" => "El correo electrónico no puede tener más de :max caracteres.",
            "correo.unique" => "El correo debe ser único.",

            "direccion.string" => "La dirección debe ser una cadena de texto.",
            "direccion.max" => "La dirección no puede tener más de :max caracteres.",
        ];
    }


    public function clearInputs()
    {
        $this->nombre = "";
        $this->telefono = "";
        $this->correo = "";
        $this->direccion = "";
    }
    public function save()
    {
        if (strlen($this->cedula) < 2) {
            $this->dispatch("errorCedula");
            return;
        }
        $this->validate();

        $cliente = Cliente::updateOrCreate(
            ["cedula" => $this->cedula],
            collect($this)->only(["nombre", "telefono", "correo", "direccion"])->toArray()
        );

        return redirect()->route("venta.registro", $cliente);
    }

    #[On("setCedula")]
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
    public function render()
    {
        return view('livewire.cliente.form');
    }
}
