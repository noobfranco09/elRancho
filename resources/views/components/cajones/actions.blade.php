<div class="flex items-center justify-center space-x-2">

    <x-button variant="blue" @click="$dispatch('openModal', { component: 'cajon.ver-animales', arguments: { cajon:{{ $cajon->id }} } })" icon="search">
        Ver animales
    </x-button>

    <x-button variant="primary" @click="$dispatch('openModal', { component: 'cajon.ver', arguments: { cajon:{{ $cajon->id }} } })" icon="visibility">
        Ver
    </x-button>

    <x-button variant="warning" @click="$dispatch('openModal', { component: 'cajon.modal', arguments: { cajon:{{ $cajon->id }} } })"  icon="edit">
        Editar
    </x-button>

    <x-button variant="danger" @click="$dispatch('openModal', { component: 'cajon.eliminar', arguments: { cajon:{{ $cajon->id }} } })" icon="delete">
        Eliminar
    </x-button>
</div>
