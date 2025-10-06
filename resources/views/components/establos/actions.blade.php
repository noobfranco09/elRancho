<div class="flex items-center justify-center space-x-2">
    <x-button variant="primary" @click="$dispatch('openModal', { component: 'establo.ver', arguments: { establo:{{ $establo->id }} } })" icon="visibility">
        Ver
    </x-button>

    <x-button variant="warning" @click="$dispatch('openModal', { component: 'establo.modal', arguments: { establo:{{ $establo->id }} } })"  icon="edit">
        Editar
    </x-button>

</div>
