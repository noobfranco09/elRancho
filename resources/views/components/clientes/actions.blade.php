<div class="flex items-center justify-center space-x-2">

    <x-button variant="warning" @click="$dispatch('openModal', { component: 'cliente.modal', arguments: { cliente:{{ $cliente->id }} } })"  icon="edit">
        Editar
    </x-button>

</div>
