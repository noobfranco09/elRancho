<x-app-layout>

    <x-slot name="header">
        <x-header title="Gestión de establos" description="Sección para la gestión de establos"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button data-modal-target="modal-establo" data-modal-show="modal-establo">
            Crear establo
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:establo.table/>
    </x-panel>

    <livewire:establo.form/>
</x-app-layout>
