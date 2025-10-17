<div>
    <x-alert message="¿Está seguro de que quieres eliminar este animal del cajon asignado?">

        <x-slot name="footer">
            <x-button variant="danger" wire:click="delete">Si, Eliminar</x-button>
            <x-button variant="danger" @click="Livewire.dispatch('closeModal')">Cancelar</x-button>
        </x-slot>
    </x-alert>
</div>

