<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Attributes\On;
use Livewire\Component;

class SearchInput extends Component
{
    public $query = '';
    public $results = [];
    public $error = false;

    public function mount($error = false)
    {
        $this->error = (bool) $error;
    }

    public function updatedQuery()
    {
        // Si la cadena está vacía, limpia los resultados
        if (strlen($this->query) < 2) {
            $this->results = [];
            $this->error = true;
            return;
        }

        $this->error = false;

        // Ejemplo: búsqueda de usuarios por nombre
        $this->results = Cliente::where('cedula', 'like', "%{$this->query}%")
            ->limit(5)
            ->pluck('cedula')
            ->toArray();

        $this->dispatch("setCedula", cedula: $this->query);
    }

    public function selectResult($value)
    {
        $this->query = $value;
        $this->results = [];

        $this->dispatch("cliente-seleccionado", cedula: $value);
    }

    public function searchClient()
    {
        if (strlen($this->query) > 0) {
            $this->dispatch("cliente-seleccionado", cedula: $this->query);
        }
    }

    #[On("errorCedula")]
    public function onError()
    {
        $this->error = true;
    }

    public function render()
    {
        return view('livewire.cliente.search-input');
    }
}
