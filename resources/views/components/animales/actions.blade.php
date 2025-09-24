<div class="flex items-center justify-center space-x-2">
    <x-button variant="primary" wire:click="ver({{ $animal->id }})" icon="visibility">
        Ver
    </x-button>

    <x-button variant="warning" @click="$dispatch('cargarAnimal')" icon="edit">
        Editar
    </x-button>

    <x-button variant="danger" icon="delete" @click="$dispatch('abrirModalAnimal')" >
        Eliminar
    </x-button>
</div>
