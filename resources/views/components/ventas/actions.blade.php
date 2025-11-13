<div class="flex items-center justify-center space-x-2">

    <x-button variant="blue" @click="$dispatch('openModal', { component: 'venta.modal-animales', arguments: { venta:{{ $venta->id }} } })" icon="search">
        Animales
    </x-button>


    <x-button variant="danger" @click="$dispatch('openModal', { component: 'venta.alert', arguments: { venta:{{ $venta->id }} } })" icon="delete">
        Anular
    </x-button>
</div>
