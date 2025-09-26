<div class="flex items-center justify-center space-x-2">
    <x-button variant="primary" wire:click="ver({{ $establo->id }})" icon="visibility">
        Ver
    </x-button>

    <x-button variant="warning" @click="$dispatch('openModal', { component: 'establo.modal', arguments: { establo:{{ $establo->id }} } })"  icon="edit">
        Editar
    </x-button>

    <x-button variant="danger" @click="$dispatch('openModal', { component: 'establo.eliminar', arguments: { establo:{{ $establo->id }} } })" icon="delete">
        Desactivar
    </x-button>
</div>
