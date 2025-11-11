
<div>
    <x-alert message="¿Está seguro de que desea anular la venta?">
        <p class="text-sm text-gray-500 font-medium">
            Si anulas esta venta, todos los animales asignados volverán a estar disponibles.
        </p>
        <x-slot name="footer">
            <x-button variant="danger" wire:click="delete">Si, eliminar</x-button>
            <x-button variant="danger" @click="Livewire.dispatch('closeModal')">Cancelar</x-button>
        </x-slot>
    </x-alert>
</div>
