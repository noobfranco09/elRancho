<?php

namespace App\Livewire\Cajon;

use App\Models\Estanco;
use LivewireUI\Modal\ModalComponent;

class Ver extends ModalComponent
{

    public $id, $cajon;

    public function mount(Estanco $cajon)
    {
        $this->id = $cajon->id;
        $this->cajon = $cajon;
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
