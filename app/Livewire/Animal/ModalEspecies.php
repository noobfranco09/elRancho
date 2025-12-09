<?php

namespace App\Livewire\Animal;

use App\Models\Especie;
use LivewireUI\Modal\ModalComponent;

class ModalEspecies extends ModalComponent
{
    public $especies;
    public $nuevaEspecie;
    public $isEditing = null;
    public $nuevaEspecieEditar = [];

    public function mount()
    {
        $this->especies = Especie::withCount("animales")->get();
    }

    public function rules()
    {
        return [
            "nuevaEspecie" => "required|string|max:255",
        ];
    }

    public function toggleEdit($id)
    {
        if ($this->isEditing === $id) {
            $this->save($id, $this->nuevaEspecieEditar[$id] ?? '');
            $this->isEditing = null;
        } else {
            $this->isEditing = $id;
            $especie = Especie::findOrFail($id);
            $this->nuevaEspecieEditar[$id] = $especie->nombre;
        }
    }

    public function save($id = null, $nombre = null)
    {
        if ($id) {
            $this->validate([
                "nuevaEspecieEditar.$id" => "required|string|max:255"
            ]);
            $especie = Especie::findOrFail($id);
            $especie->update(['nombre' => $nombre]);
        } else {
            $this->validate([
                "nuevaEspecie" => "required|string|max:255"
            ]);
            Especie::create(['nombre' => $this->nuevaEspecie]);
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

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
