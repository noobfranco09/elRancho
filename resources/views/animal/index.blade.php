<x-app-layout>

    <x-slot name="header">
        <x-header title="Gestión de animales" description="Sección para la gestión de animales"/>
    </x-slot>

    <x-panel class="mb-9">
        <x-button data-modal-target="modal-animal" data-modal-show="modal-animal">
            Crear animal
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:animal.table />
    </x-panel>

    <livewire:animal.form />
</x-app-layout>
