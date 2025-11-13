<?php

namespace App\Livewire\Alimentacion;

use App\Models\Alimentacion;
use LivewireUI\Modal\ModalComponent;

class Alert extends ModalComponent
{
    public $alimentacion;

    public function mount(Alimentacion $alimentacion)
    {
        $this->alimentacion = $alimentacion;
    }
    public function render()
    {
        return view('livewire.alimentacion.alert');
    }

    public function delete()
    {
        $this->alimentacion->delete();
        $this->closeModal();
        $this->dispatch("alimentacionEliminada");
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}
