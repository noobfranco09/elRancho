<?php

namespace App\Livewire\Animal;

use App\Models\Animal;
use LivewireUI\Modal\ModalComponent;

class AncestroModal extends ModalComponent
{
    public $animales;
    public $padre;
    public $madre;
    public $animalId;

    public function mount($animal_id)
    {
        $animalesCollection = Animal::whereNotIn("id", [$animal_id])
            ->with("especie")
            ->get();

        $this->animales = $animalesCollection->mapWithKeys(function ($animal) {
            $sexo = $this->getSexLabel($animal->sexo);
            $especieNombre = $animal->especie ? $animal->especie->nombre : "Sin especie";

            return [
                $animal->id => "{$animal->codigo} ({$sexo} - {$especieNombre})"
            ];
        })->toArray();


        $this->animalId = $animal_id;
        $animal = Animal::find($this->animalId);
        $this->padre = $animal->padre1_id;
        $this->madre = $animal->padre2_id;
    }

    public function getSexLabel($sexo)
    {
        return match ($sexo) {
            "M" => "Macho",
            "F" => "Hembre",
            default => "N/A"
        };
    }

    public function rules()
    {
        return [
            "padre" => "nullable|integer|exists:animales,id|not_in:{$this->animalId}",
            "madre" => "nullable|integer|exists:animales,id|not_in:{$this->animalId}"
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->validarPadres();
    }


    public function render()
    {
        return view('livewire.animal.ancestro-modal');
    }

    public function validarPadres()
    {
        if ($this->padre > 0 && $this->padre === $this->madre) {
            $this->addError('madre', 'El padre y la madre no pueden ser el mismo animal.');
            $this->addError('padre', 'El padre y la madre no pueden ser el mismo animal.');

            return false;
        }

        return true;
    }

    public function save()
    {
        $validated = $this->validate();

        if (!$this->validarPadres()) return;

        $animal = Animal::findOrFail($this->animalId);
        $animal->update([
            "padre1_id" => $validated["padre"],
            "padre2_id" => $validated["madre"]
        ]);

        $this->dispatch("ancestroRegistro", padre: $validated["padre"], madre: $validated["madre"]);
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
