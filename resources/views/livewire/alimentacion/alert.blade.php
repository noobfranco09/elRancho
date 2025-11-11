<div>
    <x-alert message="¿Está seguro de que quiere eliminar la alimentación?">

        <x-slot name="footer">
            <x-button variant="danger" wire:click="delete">Si, eliminar</x-button>
            <x-button variant="danger" @click="Livewire.dispatch('closeModal')">Cancelar</x-button>
        </x-slot>
    </x-alert>
</div>
