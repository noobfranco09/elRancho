<div class="flex items-center justify-center space-x-2">
    <x-button variant="primary" @click="$dispatch('openModal', { component: 'veterinario.modalver', arguments: { veterinario:{{ $veterinario->id }} } })" icon="visibility">
        Ver
    </x-button>

    <x-button variant="warning" @click="$dispatch('openModal', { component: 'veterinario.modal', arguments: { veterinario:{{ $veterinario->id }} } })"  icon="edit">
        Editar
    </x-button>
</div>

