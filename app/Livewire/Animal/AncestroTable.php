<?php

namespace App\Livewire\Animal;

use App\Models\Animal;
use Livewire\Attributes\On;
use Livewire\Component;

class AncestroTable extends Component
{
    public $padre;
    public $madre;
    public $animalId;

    public function mount($animalId)
    {
        $animal = Animal::find($animalId);
        $this->animalId = $animalId;

        $this->padre = Animal::find($animal->padre1_id);
        $this->madre = Animal::find($animal->padre2_id);
    }

    #[On("ancestroRegistro")]
    public function actualizarAncestros($padre, $madre)
    {
        $this->padre = Animal::find($padre);
        $this->madre = Animal::find($madre);
    }

    public function render()
    {
        return view('livewire.animal.ancestro-table');
    }
}
