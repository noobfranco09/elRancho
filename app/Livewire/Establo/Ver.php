<?php

namespace App\Livewire\Establo;

use App\Models\Establo;
use LivewireUI\Modal\ModalComponent;

class Ver extends ModalComponent
{

     public $id, $establo;

    public function mount(Establo $establo)
    {
        $this->id = $establo->id;
        $this->establo = $establo;
    }

    public function render()
    {
        return view('livewire.establo.ver');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

}
