<?php

namespace App\Livewire\Establo;

use App\Models\Establo;
use Livewire\Component;

class Form extends Component
{
    public $id, $nombre, $descripcion, $estado;


    public function cargarEstablo(Establo $establo)
    {
        $this->id = $establo->id;
        $this->nombre = $establo->nombre;
        $this->descripcion = $establo->descripcion;
        $this->estado = $establo->estado;
    }

    public function save()
    {
        Establo::create([
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
            "estado" => $this->estado,
        ]);

        $this->dispatch("establoCreado");
    }

    public function render()
    {
        return view('livewire.establo.form');
    }
}
