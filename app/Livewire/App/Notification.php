<?php

namespace App\Livewire\App;

use App\Models\Alimento;
use Livewire\Component;

class Notification extends Component
{

    public $alimentosBajoStock = [];
    public $bajoStock = false;
    protected $listeners = [
        "notificarBajoStock"
    ];

    public function mount()
    {
        $this->cargarAlimentos();
    }

    public function cargarAlimentos()
    {
        $this->alimentosBajoStock = Alimento::where("cantidad", "<", 10)->get();
        $this->bajoStock = count($this->alimentosBajoStock) > 0;
    }

    public function notificarBajoStock($event)
    {
        $nuevoAlimento = Alimento::findOrFail($event["alimento"]["id"]);

        if ($nuevoAlimento) {

            $this->cargarAlimentos();
        }
    }
    public function render()
    {
        return view('livewire.app.notification');
    }
}
