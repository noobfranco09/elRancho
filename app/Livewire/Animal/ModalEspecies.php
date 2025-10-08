<?php

namespace App\Livewire\Animal;

use App\Models\Especie;
use LivewireUI\Modal\ModalComponent;

class ModalEspecies extends ModalComponent
{
    public $especies;
    public $nuevaEspecie;
    public $isEditing = null;
    public $nuevaEspecieEditar;

    public function mount()
    {
        $this->especies = Especie::all();
    }

    public function toggleEdit($id)
    {
        if ($this->isEditing === $id) {
            $this->save($id, $this->nuevaEspecieEditar);
            $this->isEditing = null;
        } else {
            $this->isEditing = $id;
            $especie = Especie::findOrFail($id);
            $this->nuevaEspecieEditar = $especie->nombre;
        }
    }

    public function save($id = null, $nombre = null)
    {
        if ($id) {
            $especie = Especie::findOrFail($id);
            $especie->update(['nombre' => $nombre]);
        } else {
            Especie::create(["nombre" => $this->nuevaEspecie]);
            $this->especies = Especie::all();
        }
    }

    public function delete($id)
    {
        Especie::destroy($id);
        $this->especies = Especie::all();
    }


    public function render()
    {
        return view('livewire.animal.modal-especies');
    }
}
