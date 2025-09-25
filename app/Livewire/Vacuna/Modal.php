<?php

namespace App\Livewire\Vacuna;

use App\Models\Vacuna;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{

    public Vacuna $vacuna;
    public $id,
        $nombre,
        $descripcion,
        $dosis;

    public function mount(Vacuna $vacuna)
    {
        $this->id = $vacuna->id;
        $this->vacuna = $vacuna;
        $this->nombre = $vacuna->nombre;
        $this->descripcion = $vacuna->descripcion;
        $this->dosis = $vacuna->dosis;
    }

    public function render()
    {
        return view('livewire.vacuna.modal');
    }

    public function save()
    {
        Vacuna::create([
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
            "dosis" => $this->dosis,
        ]);

        $this->closeModal();
        $this->dispatch("vacunaCreada");
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
