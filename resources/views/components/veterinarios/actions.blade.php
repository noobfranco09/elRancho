<div class="flex items-center justify-center space-x-2">
    <x-button variant="primary" @click="$dispatch('openModal', { component: 'veterinario.modalVer', arguments: { veterinario:{{ $veterinario->id }} } })" icon="visibility">
        Ver
    </x-button>

    <x-button variant="warning" @click="$dispatch('openModal', { component: 'veterinario.modal', arguments: { veterinario:{{ $veterinario->id }} } })"  icon="edit">
        Editar
    </x-button>

    <x-button variant="danger" icon="delete" @click="$dispatch('openModal', { component: 'veterinario.modal', arguments: { veterinario:{{ $veterinario->id }} } })" >
        Eliminar
    </x-button>
</div>

