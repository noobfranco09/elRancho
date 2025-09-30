<div>
    <x-alert message="¿Está seguro de que quiere eliminar el cajon?">

        <x-slot name="footer">
            <x-button variant="danger" wire:click="eliminar">Si, eliminar</x-button>
            <x-button variant="secondary" @click="Livewire.dispatch('closeModal')">Cancelar</x-button>
        </x-slot>
    </x-alert>
</div>