<div class="flex items-center justify-center space-x-2">
    <x-button variant="warning" @click="$dispatch('openModal', { component: 'inventario.modal', arguments: { inventario:{{ $inventario->id }} } })"  icon="edit">
        Editar
    </x-button>
</div>

