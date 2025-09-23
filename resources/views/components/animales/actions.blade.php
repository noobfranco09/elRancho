<div class="flex items-center justify-center space-x-2">
    <x-button variant="primary" wire:click="ver({{ $animal->id }})" icon="visibility">
        Ver
    </x-button>

    <x-button variant="warning" wire:click="editar({{ $animal->id }})" icon="edit">
        Editar
    </x-button>

    <x-button variant="danger" wire:click="eliminar({{ $animal->id }})" icon="delete">
        Eliminar
    </x-button>
</div>
