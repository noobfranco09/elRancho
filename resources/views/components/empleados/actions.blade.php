<div class="flex items-center justify-center space-x-2">

    <x-button variant="warning" @click="$dispatch('openModal', { component: 'empleado.modal', arguments: { empleado:{{ $empleado->id }} } })"  icon="edit">
        Editar
    </x-button>

</div>
