<x-app-layout>
    <x-slot name="header">
        <x-header title="Ventass" description="Gestión de ventas"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button :href="route('ventas.pdf')">
            Generar PDF
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:venta.table />
    </x-panel>

</x-app-layout>
