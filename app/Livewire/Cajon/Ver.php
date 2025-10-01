<?php

namespace App\Livewire\Cajon;

use App\Models\Establo;
use App\Models\Estanco;
use LivewireUI\Modal\ModalComponent;

class Ver extends ModalComponent
{

    public $id, $cajon, $establo;

    public function mount(Estanco $cajon)
    {
        $this->id = $cajon->id;
        $this->cajon = $cajon;
        $this->establo = $cajon->establo;
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function render()
    {
        return view('livewire.cajon.ver');
    }
}
