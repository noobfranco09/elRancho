<div class="flex items-center justify-center space-x-2">
    <x-button variant="primary" wire:click="" icon="visibility">
        Ver
    </x-button>

    <x-button variant="warning" @click="$dispatch('openModal', { component: 'vacuna.modal', arguments: { vacuna:{{ $vacuna->id }} } })" icon="edit">
        Editar
    </x-button>

    <x-button variant="danger" @click="$dispatch('openModal', { component: 'vacuna.alert', arguments: { vacuna:{{ $vacuna->id }} } })" icon="delete">
        Eliminar
    </x-button>
</div>
