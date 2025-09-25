<div class="flex items-center justify-center space-x-2">
    <x-button variant="primary" wire:click="ver({{ $establo->id }})" icon="visibility">
        Ver
    </x-button>

    <x-button variant="warning" wire:click="editar({{ $establo->id }})" icon="edit">
        Editar
    </x-button>

    <x-button variant="danger" wire:click="eliminar({{ $establo->id }})" icon="delete">
        Eliminar
    </x-button>
</div>
