<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class SearchInput extends Component
{
    public $query = '';
    public $results = [];

    public function updatedQuery()
    {
        // Si la cadena está vacía, limpia los resultados
        if (strlen($this->query) < 2) {
            $this->results = [];
            return;
        }

        // Ejemplo: búsqueda de usuarios por nombre
        $this->results = Cliente::where('cedula', 'like', "%{$this->query}%")
            ->limit(5)
            ->pluck('cedula')
            ->toArray();
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
    public function render()
    {
        return view('livewire.cliente.search-input');
    }
}
