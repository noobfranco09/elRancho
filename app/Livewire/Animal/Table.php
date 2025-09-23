<?php

namespace App\Livewire\Animal;

use App\Models\Animal;
use Livewire\Component;

class Table extends Component
{
    public $animales;

    public function mount()
    {
        $this->animales = Animal::all();
    }
    public function render()
    {
        return view('livewire.animal.table');
    }
}
