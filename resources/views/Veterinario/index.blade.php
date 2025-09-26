<x-app-layout>
    <x-slot name="header">
        <x-header title="Gestion de veterinarios" description="Seccion para gestionar veterinarios"/>
    </x-slot>
    <x-panel>
        <!-- <x-button @click="$dispatch('openModal',{component:'Veterinario.'})">
                
        </x-button> -->
    </x-panel>
    <x-panel>
        <livewire:veterinario.table/>
    </x-panel>
</x-app-layout>