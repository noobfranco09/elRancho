<x-app-layout>

    <x-slot name="header">
        <x-header title="Gestión de animales" description="Sección para la gestión de animales"/>
    </x-slot>

    <x-panel class="mb-9" @click="$dispatch('openModal', { component: 'animal.modal' })">
        <x-button>
            Crear animal
        </x-button>
    </x-panel>

    <x-panel>
        <livewire:animal.table />
    </x-panel>

    <script>
        document.addEventListener("animalEditado", () =>{
            Toast.fire({
                icon: "success",
                title: "Animal actualizado con éxito"
            })
        })

        document.addEventListener("animalCreado", () =>{
            Toast.fire({
                icon: "success",
                title: "Animal creado con éxito"
            })
        })
    </script>
</x-app-layout>

