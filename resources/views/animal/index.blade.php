<x-app-layout>
    <x-slot name="header">
        <x-header title="Gestión de animales" description="Sección para la gestión de animales"/>
    </x-slot>

    <x-panel>
        <livewire:animal.table />
    </x-panel>
</x-app-layout>
