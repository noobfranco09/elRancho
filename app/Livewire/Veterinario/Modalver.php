<?php

namespace App\Livewire\Veterinario;

use Livewire\Component;
use App\Models\Veterinario;
use App\Models\Revision;
use Livewire\Features\SupportConsoleCommands\Commands\PublishCommand;
use LivewireUI\Modal\ModalComponent;
class Modalver extends ModalComponent
{
    public $veterinarioId;
    public $revisiones;
    public function render()
    {
        return view('livewire.veterinario.modalver');
    }
    public function mount(Veterinario $veterinario)
    {
        $this->revisiones = $veterinario->revisiones;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
