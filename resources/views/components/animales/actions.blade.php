<div class="flex items-center justify-center space-x-2">
    <x-button variant="primary" href="{{ route('animales.show', $animal->id) }}"  icon="visibility">
        Ver
    </x-button>

    <x-button variant="warning" @click="$dispatch('openModal', { component: 'animal.modal', arguments: { animal:{{ $animal->id }} } })"  icon="edit">
        Editar
    </x-button>

    <x-button variant="danger" icon="delete" @click="$dispatch('abrirModalAnimal')" >
        Eliminar
    </x-button>
</div>

