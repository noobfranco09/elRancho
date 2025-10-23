<?php

namespace App\Livewire\Profile;

use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    public function render()
    {
        return view('livewire.profile.modal');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
