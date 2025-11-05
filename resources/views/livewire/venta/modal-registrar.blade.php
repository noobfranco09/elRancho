<div>
    <x-alert message="¿Está seguro que desea confirmar la venta?">

        <x-slot name="footer">
            <x-button variant="primary" wire:click="registrar">Si, confirmar</x-button>
            <x-button variant="danger" @click="Livewire.dispatch('closeModal')">Cancelar</x-button>
        </x-slot>
    </x-alert>
</div>
