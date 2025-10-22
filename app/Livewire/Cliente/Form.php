<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Attributes\On;
use Livewire\Component;


class Form extends Component
{
    public $nombre = '';
    public $telefono  = '';
    public $correo = '';
    public $direccion = '';

    #[On("cliente-seleccionado")]
    public function cargarCliente($cedula)
    {
        $cliente = Cliente::where('cedula', $cedula)->first();

        if ($cliente) {
            $this->nombre = $cliente->nombre;
            $this->telefono = $cliente->telefono;
            $this->correo = $cliente->correo;
            $this->direccion = $cliente->direccion;

            session()->flash("success", "Datos del cliente cargados");
        }
    }
    public function render()
    {
        return view('livewire.cliente.form');
    }
}
