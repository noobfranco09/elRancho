<?php

namespace App\Livewire\Establo;

use App\Models\Establo;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{

    public $id, $nombre, $descripcion, $estado;


    public function mount(Establo $establo)
    {
        $this->id = $establo->id;
        $this->nombre = $establo->nombre;
        $this->descripcion = $establo->descripcion;
        $this->estado = $establo->estado;
    }

    public function save()
    {

        if($this->id){
            //editamos la informacion del establo en caso de recibir un ID
            $establo = Establo::findOrFail($this->id);

            $establo->update([

                "nombre" => $this->nombre,
                "descripcion" => $this->descripcion,
                "estado" => $this->estado,

            ]);

            $this->closeModal();
            $this->dispatch("establoEditado");

        }else{

            //creamos el establo en caso de que no recibamos algun ID
            Establo::create([
                "nombre" => $this->nombre,
                "descripcion" => $this->descripcion,
                "estado" => $this->estado,
            ]);

            $this->closeModal();
            $this->dispatch("establoCreado");

        }

        
    }

    public function render()
    {
        return view('livewire.establo.modal');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

   
}
